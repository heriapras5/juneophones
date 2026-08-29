<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Halaman Tidak Ditemukan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 min-h-screen flex items-center justify-center p-4 antialiased">
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>
    <div class="absolute inset-0 hero-glow-2 pointer-events-none"></div>

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-96 h-96 bg-amber-500/5 rounded-full blur-3xl animate-floatSlow" style="top: 20%; left: 10%;"></div>
        <div class="absolute w-64 h-64 bg-orange-500/5 rounded-full blur-3xl animate-floatSlow" style="bottom: 20%; right: 10%; animation-delay: 2s;"></div>
    </div>

    <div class="text-center max-w-md relative z-10">
        <div class="text-9xl font-display font-extrabold text-gradient mb-4 leading-none">404</div>
        <div class="w-16 h-1 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full mx-auto mb-6"></div>
        <h1 class="text-2xl font-bold text-white font-display mb-3">Halaman Tidak Ditemukan</h1>
        <p class="text-stone-400 mb-8 leading-relaxed">Halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ url('/') }}"
               class="btn-primary shadow-2xl shadow-amber-500/25">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <a href="{{ route('kontak') }}"
               class="btn-outline text-sm py-3 px-6">
                <i class="fas fa-phone"></i> Hubungi Kami
            </a>
        </div>
    </div>
</body>
</html>
