<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_desc', 'Juneo Phone Service — Service HP Android & iPhone terpercaya. Ahlinya service handphone di kota Anda.'); ?>">
    <meta name="keywords" content="service hp, service hp android, service iphone, ganti lcd hp, ganti baterai hp, jasa service hp, <?php echo e($settings['alamat'] ?? ''); ?>, toko service hp">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?php echo $__env->yieldContent('meta_title', 'Juneo Phone Service — Service HP Andal & Terpercaya'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_desc', 'Juneo Phone Service — Service HP Android & iPhone terpercaya.'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:site_name" content="Juneo Phone Service">
    <meta name="twitter:card" content="summary_large_image">
    <title><?php echo $__env->yieldContent('meta_title', 'Juneo Phone Service — Service HP Andal & Terpercaya'); ?></title>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e($settings['favicon'] ? asset('storage/' . $settings['favicon']) : asset('favicon.ico')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        .nav-link { position: relative; }
        .nav-link::after {
            content: ''; position: absolute; bottom: 0; left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 100%; height: 2px;
            background: linear-gradient(135deg, #fbbf24, #f97316);
            border-radius: 2px;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .nav-link:hover::after, .nav-link.active::after { transform: translateX(-50%) scaleX(1); }
        .hero-shape { position: absolute; border-radius: 50%; pointer-events: none; }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }
    </style>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Juneo Phone Service",
        "image": "<?php echo e($settings['logo'] ? asset('storage/' . $settings['logo']) : ''); ?>",
        "description": "Service HP Android & iPhone terpercaya. Ahlinya service handphone.",
        "url": "<?php echo e(url('/')); ?>",
        "telephone": "<?php echo e($settings['telepon'] ?? ''); ?>",
        "email": "<?php echo e($settings['email'] ?? ''); ?>",
        "openingHours": "<?php echo e($settings['jam_operasional'] ?? ''); ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?php echo e($settings['alamat'] ?? ''); ?>"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "<?php echo e($settings['whatsapp'] ?? ''); ?>",
            "contactType": "customer service",
            "availableLanguage": "Indonesian"
        }
    }
    </script>
</head>
<body class="font-sans bg-stone-50 text-stone-900 antialiased">

    <div x-data="{ mobileOpen: false, scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 40); if(<?php echo e(request()->routeIs('home') ? 'false' : 'true'); ?>) scrolled = true" class="relative min-h-screen" id="top">

        <!-- Navbar -->
        <?php $isHome = request()->routeIs('home'); ?>
        <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 <?php echo e($isHome ? '' : 'bg-white/95 backdrop-blur-xl border-b border-stone-200 shadow-sm'); ?>"
             x-bind:class="scrolled ? 'bg-white/95 backdrop-blur-xl shadow-lg shadow-black/5 border-b border-amber-500/10' : '<?php echo e($isHome ? 'bg-transparent' : 'bg-white/95 backdrop-blur-xl border-b border-stone-200 shadow-sm'); ?>'">
            <div class="max-w-7xl mx-auto flex items-center justify-between h-16 lg:h-20 px-4 lg:px-8">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
                    <?php if($settings['logo']): ?>
                    <img src="<?php echo e(asset('storage/' . $settings['logo'])); ?>" alt="Juneo Phone" class="logo-img-3d">
                    <?php else: ?>
                    <div class="logo-gold-3d shadow-lg shadow-amber-500/30 group-hover:shadow-amber-500/50 transition-all duration-300 group-hover:scale-105">
                        <span class="text-sm lg:text-base">J</span>
                    </div>
                    <?php endif; ?>
                    <span class="font-display font-bold text-base lg:text-lg tracking-tight <?php echo e($isHome ? '' : 'text-stone-900'); ?>"
                          x-bind:class="scrolled ? 'text-stone-900' : '<?php echo e($isHome ? 'text-white' : 'text-stone-900'); ?>'">Juneo Phone</span>
                </a>

                <div class="hidden lg:flex items-center gap-1">
                    <a href="<?php echo e(route('home')); ?>"
                       class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>"
                       x-bind:class="scrolled || !<?php echo e($isHome ? 'true' : 'false'); ?> ? 'text-stone-600 hover:text-amber-600 hover:bg-amber-50' : 'text-white/80 hover:text-white hover:bg-white/10'"
                       style="<?php echo e(request()->routeIs('home') ? 'color: #d97706;' : ''); ?>">Beranda</a>
                    <a href="<?php echo e(route('blog')); ?>"
                       class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->routeIs('blog*') ? 'active' : ''); ?>"
                       x-bind:class="scrolled || !<?php echo e($isHome ? 'true' : 'false'); ?> ? 'text-stone-600 hover:text-amber-600 hover:bg-amber-50' : 'text-white/80 hover:text-white hover:bg-white/10'"
                       style="<?php echo e(request()->routeIs('blog*') ? 'color: #d97706;' : ''); ?>">Blog</a>
                    <a href="<?php echo e(route('galeri')); ?>"
                       class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->routeIs('galeri') ? 'active' : ''); ?>"
                       x-bind:class="scrolled || !<?php echo e($isHome ? 'true' : 'false'); ?> ? 'text-stone-600 hover:text-amber-600 hover:bg-amber-50' : 'text-white/80 hover:text-white hover:bg-white/10'"
                       style="<?php echo e(request()->routeIs('galeri') ? 'color: #d97706;' : ''); ?>">Galeri</a>
                    <a href="<?php echo e(route('tentang')); ?>"
                       class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->routeIs('tentang') ? 'active' : ''); ?>"
                       x-bind:class="scrolled || !<?php echo e($isHome ? 'true' : 'false'); ?> ? 'text-stone-600 hover:text-amber-600 hover:bg-amber-50' : 'text-white/80 hover:text-white hover:bg-white/10'"
                       style="<?php echo e(request()->routeIs('tentang') ? 'color: #d97706;' : ''); ?>">Tentang</a>
                    <a href="<?php echo e(route('kontak')); ?>"
                       class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->routeIs('kontak') ? 'active' : ''); ?>"
                       x-bind:class="scrolled || !<?php echo e($isHome ? 'true' : 'false'); ?> ? 'text-stone-600 hover:text-amber-600 hover:bg-amber-50' : 'text-white/80 hover:text-white hover:bg-white/10'"
                       style="<?php echo e(request()->routeIs('kontak') ? 'color: #d97706;' : ''); ?>">Kontak</a>
                    <a href="<?php echo e(route('faq')); ?>"
                       class="nav-link px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 <?php echo e(request()->routeIs('faq') ? 'active' : ''); ?>"
                       x-bind:class="scrolled || !<?php echo e($isHome ? 'true' : 'false'); ?> ? 'text-stone-600 hover:text-amber-600 hover:bg-amber-50' : 'text-white/80 hover:text-white hover:bg-white/10'"
                       style="<?php echo e(request()->routeIs('faq') ? 'color: #d97706;' : ''); ?>">FAQ</a>
                    <?php if($settings['whatsapp'] ?? null): ?>
                    <a href="https://wa.me/<?php echo e($settings['whatsapp']); ?>?text=Halo%20Juneo%20Phone%2C%20saya%20ingin%20konsultasi%20tentang%20service%20HP." target="_blank"
                       class="ml-3 btn-primary text-sm py-2.5 px-5 shadow-lg shadow-amber-500/30">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami
                    </a>
                    <?php endif; ?>
                </div>

                <button @click="mobileOpen = !mobileOpen"
                        class="lg:hidden p-2.5 rounded-xl transition-all duration-200"
                        x-bind:class="scrolled || !<?php echo e($isHome ? 'true' : 'false'); ?> ? 'text-stone-600 hover:bg-stone-100' : 'text-white hover:bg-white/10'">
                    <svg x-show="!mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div x-show="mobileOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 @click.outside="mobileOpen = false"
                 class="lg:hidden border-t border-stone-100 bg-white/95 backdrop-blur-xl">
                <div class="max-w-7xl mx-auto px-4 pb-4 pt-2 space-y-1">
                    <a href="<?php echo e(route('home')); ?>" @click="mobileOpen = false"
                       class="block px-4 py-3 text-sm font-medium rounded-xl transition-all <?php echo e(request()->routeIs('home') ? 'text-amber-600 bg-amber-50' : 'text-stone-600 hover:text-amber-600 hover:bg-amber-50'); ?>">Beranda</a>
                    <a href="<?php echo e(route('blog')); ?>" @click="mobileOpen = false"
                       class="block px-4 py-3 text-sm font-medium rounded-xl transition-all <?php echo e(request()->routeIs('blog*') ? 'text-amber-600 bg-amber-50' : 'text-stone-600 hover:text-amber-600 hover:bg-amber-50'); ?>">Blog</a>
                    <a href="<?php echo e(route('galeri')); ?>" @click="mobileOpen = false"
                       class="block px-4 py-3 text-sm font-medium rounded-xl transition-all <?php echo e(request()->routeIs('galeri') ? 'text-amber-600 bg-amber-50' : 'text-stone-600 hover:text-amber-600 hover:bg-amber-50'); ?>">Galeri</a>
                    <a href="<?php echo e(route('tentang')); ?>" @click="mobileOpen = false"
                       class="block px-4 py-3 text-sm font-medium rounded-xl transition-all <?php echo e(request()->routeIs('tentang') ? 'text-amber-600 bg-amber-50' : 'text-stone-600 hover:text-amber-600 hover:bg-amber-50'); ?>">Tentang</a>
                    <a href="<?php echo e(route('kontak')); ?>" @click="mobileOpen = false"
                       class="block px-4 py-3 text-sm font-medium rounded-xl transition-all <?php echo e(request()->routeIs('kontak') ? 'text-amber-600 bg-amber-50' : 'text-stone-600 hover:text-amber-600 hover:bg-amber-50'); ?>">Kontak</a>
                    <a href="<?php echo e(route('faq')); ?>" @click="mobileOpen = false"
                       class="block px-4 py-3 text-sm font-medium rounded-xl transition-all <?php echo e(request()->routeIs('faq') ? 'text-amber-600 bg-amber-50' : 'text-stone-600 hover:text-amber-600 hover:bg-amber-50'); ?>">FAQ</a>
                    <?php if($settings['whatsapp'] ?? null): ?>
                    <a href="https://wa.me/<?php echo e($settings['whatsapp']); ?>?text=Halo%20Juneo%20Phone%2C%20saya%20ingin%20konsultasi%20tentang%20service%20HP." target="_blank"
                       class="mt-2 flex items-center justify-center gap-2 btn-primary text-sm py-3">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <!-- Floating WhatsApp Icon -->
        <?php if($settings['whatsapp'] ?? null): ?>
        <a href="https://wa.me/<?php echo e($settings['whatsapp']); ?>?text=Halo%20Juneo%20Phone%2C%20saya%20ingin%20konsultasi%20tentang%20service%20HP." target="_blank"
           class="fixed bottom-6 right-6 z-40 w-14 h-14 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 text-white flex items-center justify-center shadow-2xl shadow-emerald-500/40 hover:shadow-emerald-500/60 hover:scale-110 active:scale-95 transition-all duration-300 group pulse-ring"
           title="Chat via WhatsApp">
            <i class="fab fa-whatsapp text-2xl"></i>
            <span class="absolute right-full mr-3 top-1/2 -translate-y-1/2 bg-stone-900 text-white text-xs font-medium px-3 py-1.5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-lg pointer-events-none">
                Chat via WhatsApp
                <span class="absolute right-[-4px] top-1/2 -translate-y-1/2 w-2 h-2 bg-stone-900 rotate-45"></span>
            </span>
            <span class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-300 rounded-full animate-ping opacity-75"></span>
        </a>
        <?php endif; ?>

        <!-- Page Content -->
        <div class="animate-fadeIn">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>

    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</body>
</html>
<?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\layouts\frontend.blade.php ENDPATH**/ ?>