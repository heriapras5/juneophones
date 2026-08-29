<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Faq;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\PageView;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'hero' => Hero::count(),
            'about' => About::count(),
            'layanan' => Service::count(),
            'faq' => Faq::count(),
            'artikel' => Artikel::count(),
            'galeri' => Galeri::count(),
        ];

        $today = now()->startOfDay();
        $visitor = [
            'hari_ini' => PageView::where('visited_at', '>=', $today)->distinct('ip_address')->count('ip_address'),
            'minggu_ini' => PageView::where('visited_at', '>=', now()->subDays(7))->distinct('ip_address')->count('ip_address'),
            'bulan_ini' => PageView::where('visited_at', '>=', now()->subDays(30))->distinct('ip_address')->count('ip_address'),
            'tahun_ini' => PageView::where('visited_at', '>=', now()->subDays(365))->distinct('ip_address')->count('ip_address'),
            'total' => PageView::count(),
        ];

        $chart = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $count = PageView::whereDate('visited_at', $date)->distinct('ip_address')->count('ip_address');
            $chart[] = ['date' => $date->format('d M'), 'count' => $count];
        }

        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.dashboard', compact('stats', 'visitor', 'chart', 'settings'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = strip_tags($data['name']);
        $user->email = $data['email'];

        if ($request->filled('password')) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
