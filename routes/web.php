<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;

// === SEO ROUTES ===
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/robots.txt', function () {
    return response("User-agent: *\nAllow: /\nDisallow: /admin/\nDisallow: /storage/\n\nSitemap: " . url('/sitemap.xml') . "\n", 200, ['Content-Type' => 'text/plain']);
});

// === PUBLIC ROUTES (Multiple Page) ===
Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/tentang', [LandingController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [LandingController::class, 'kontak'])->name('kontak');
Route::get('/faq', [LandingController::class, 'faq'])->name('faq');
Route::get('/blog', [LandingController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [LandingController::class, 'blogDetail'])->name('blog.detail');
Route::get('/galeri', [LandingController::class, 'galeri'])->name('galeri');

// === AUTH ROUTES ===
Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AuthController::class, 'login']);
Route::get('/admin/register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'register']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// === ADMIN ROUTES ===
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    Route::get('/hero', [HeroController::class, 'index'])->name('admin.hero.index');
    Route::post('/hero', [HeroController::class, 'store'])->name('admin.hero.store');
    Route::put('/hero/{id}', [HeroController::class, 'update'])->name('admin.hero.update');
    Route::delete('/hero/{id}', [HeroController::class, 'destroy'])->name('admin.hero.destroy');
    Route::post('/hero/reorder', [HeroController::class, 'reorder'])->name('admin.hero.reorder');

    Route::get('/about', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about', [AboutController::class, 'update'])->name('admin.about.update');

    Route::get('/layanan', [LayananController::class, 'index'])->name('admin.layanan.index');
    Route::post('/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
    Route::post('/layanan/reorder', [LayananController::class, 'reorder'])->name('admin.layanan.reorder');

    Route::get('/faq', [FaqController::class, 'index'])->name('admin.faq.index');
    Route::post('/faq', [FaqController::class, 'store'])->name('admin.faq.store');
    Route::put('/faq/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('/faq/{id}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');
    Route::post('/faq/reorder', [FaqController::class, 'reorder'])->name('admin.faq.reorder');


    Route::get('/settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('admin.settings.update');

    Route::get('/artikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('admin.artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('admin.artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');

    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
});
