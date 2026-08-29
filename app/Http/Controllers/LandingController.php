<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Faq;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Setting;

class LandingController extends Controller
{
    private function getSettings()
    {
        return [
            'logo' => Setting::getValue('logo'),
            'favicon' => Setting::getValue('favicon'),
            'alamat' => Setting::getValue('alamat'),
            'telepon' => Setting::getValue('telepon'),
            'whatsapp' => Setting::getValue('whatsapp'),
            'email' => Setting::getValue('email'),
            'jam_operasional' => Setting::getValue('jam_operasional'),
            'maps_embed' => Setting::getValue('maps_embed'),
            'sosial_media' => json_decode(Setting::getValue('sosial_media', '[]'), true),
            'keunggulan' => json_decode(Setting::getValue('keunggulan', '[]'), true),
        ];
    }

    public function home()
    {
        $heroes = Hero::where('aktif', true)->orderBy('urutan')->get();
        $hero = $heroes->first();
        $about = About::where('aktif', true)->first();
        $services = Service::where('aktif', true)->orderBy('urutan')->get();
        $faqs = Faq::where('aktif', true)->orderBy('urutan')->take(3)->get();
        $galeris = Galeri::where('aktif', true)->orderBy('urutan')->orderBy('created_at', 'desc')->take(6)->get();
        $artikels = Artikel::where('aktif', true)->where('status', 'publish')->orderBy('created_at', 'desc')->take(3)->get();
        $settings = $this->getSettings();

        return view('frontend.home', compact('hero', 'heroes', 'about', 'services', 'faqs', 'galeris', 'artikels', 'settings'));
    }

    public function tentang()
    {
        $about = About::where('aktif', true)->first();
        $settings = $this->getSettings();

        return view('frontend.tentang', compact('about', 'settings'));
    }

    public function kontak()
    {
        $settings = $this->getSettings();
        return view('frontend.kontak', compact('settings'));
    }

    public function faq()
    {
        $faqs = Faq::where('aktif', true)->orderBy('urutan')->get();
        $settings = $this->getSettings();
        return view('frontend.faq', compact('faqs', 'settings'));
    }

    public function blog()
    {
        $allArtikels = Artikel::where('aktif', true)->where('status', 'publish')->orderBy('created_at', 'desc')->get();
        $featured = $allArtikels->shift();
        $artikels = Artikel::where('aktif', true)->where('status', 'publish')->orderBy('created_at', 'desc')->paginate(9);
        $kategoriList = Artikel::where('aktif', true)->where('status', 'publish')->select('kategori')->distinct()->pluck('kategori')->filter();
        $recentPosts = Artikel::where('aktif', true)->where('status', 'publish')->orderBy('created_at', 'desc')->take(5)->get();
        $settings = $this->getSettings();

        return view('frontend.blog', compact('featured', 'artikels', 'kategoriList', 'recentPosts', 'settings'));
    }

    public function blogDetail($slug)
    {
        $artikel = Artikel::where('slug', $slug)->where('aktif', true)->where('status', 'publish')->firstOrFail();
        $recentPosts = Artikel::where('id', '!=', $artikel->id)->where('aktif', true)->where('status', 'publish')->orderBy('created_at', 'desc')->take(4)->get();
        $settings = $this->getSettings();

        return view('frontend.blog-detail', compact('artikel', 'recentPosts', 'settings'));
    }

    public function galeri()
    {
        $galeris = Galeri::where('aktif', true)->orderBy('urutan')->orderBy('created_at', 'desc')->get();
        $kategoriList = Galeri::where('aktif', true)->select('kategori')->distinct()->pluck('kategori')->filter();
        $settings = $this->getSettings();

        return view('frontend.galeri', compact('galeris', 'kategoriList', 'settings'));
    }
}
