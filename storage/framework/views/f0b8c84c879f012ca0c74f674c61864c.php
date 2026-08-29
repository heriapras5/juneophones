<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> — Admin Juneo Phone</title>
    <?php $settingsFavicon = \App\Models\Setting::getValue('favicon'); ?>
    <link rel="icon" type="image/x-icon" href="<?php echo e($settingsFavicon ? asset('storage/' . $settingsFavicon) : asset('favicon.ico')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="font-sans bg-stone-100 antialiased overflow-x-hidden">

    <div x-data="{ sidebarOpen: true, mobileOpen: false, confirm: { show: false, message: '', action: null } }" class="min-h-screen flex">

        <!-- Overlay mobile -->
        <div x-show="mobileOpen" @click="mobileOpen = false"
             x-transition:enter="transition-opacity duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/60 z-30 lg:hidden backdrop-blur-sm"></div>

        <!-- Sidebar -->
        <aside x-show="sidebarOpen || mobileOpen" x-cloak
               x-transition:enter="transition-all duration-300"
               x-transition:enter-start="-translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition-all duration-300"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full"
               class="fixed lg:fixed z-40 w-64 bg-gradient-to-b from-stone-950 via-stone-900 to-stone-950 min-h-screen flex flex-col shrink-0 shadow-2xl shadow-black/20">

            <!-- Logo -->
            <?php $settingsLogo = \App\Models\Setting::getValue('logo'); ?>
            <div class="p-5 border-b border-white/5">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-3">
                    <?php if($settingsLogo): ?>
                    <img src="<?php echo e(asset('storage/' . $settingsLogo)); ?>" alt="Juneo Phone" class="w-9 h-9 rounded-full object-contain ring-2 ring-amber-400/50 ring-offset-2 ring-offset-stone-900 shadow-lg">
                    <?php else: ?>
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white text-sm font-bold shadow-lg ring-2 ring-amber-300/40 ring-offset-2 ring-offset-stone-900">
                        J
                    </div>
                    <?php endif; ?>
                    <div>
                        <p class="text-white font-semibold text-sm font-display">Juneo Phone</p>
                        <p class="text-[10px] text-stone-500 uppercase tracking-wider">Admin Panel</p>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 py-4 px-3 space-y-1 overflow-y-auto scrollbar-thin">
                <p class="px-4 py-1 text-[10px] text-stone-500 uppercase tracking-wider font-semibold">Menu Utama</p>

                <a href="<?php echo e(route('admin.dashboard')); ?>"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-xl transition-all duration-200 <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-amber-500/10 text-amber-400 shadow-sm' : 'text-stone-400 hover:text-white hover:bg-white/5'); ?>">
                    <i class="fas fa-grid-2 w-4 text-center"></i>
                    <span>Dashboard</span>
                    <?php if(request()->routeIs('admin.dashboard')): ?>
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    <?php endif; ?>
                </a>

                <p class="px-4 py-1 pt-4 text-[10px] text-stone-500 uppercase tracking-wider font-semibold">Konten</p>

                <a href="<?php echo e(route('admin.hero.index')); ?>"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-xl transition-all duration-200 <?php echo e(request()->routeIs('admin.hero.*') ? 'bg-amber-500/10 text-amber-400 shadow-sm' : 'text-stone-400 hover:text-white hover:bg-white/5'); ?>">
                    <i class="fas fa-image w-4 text-center"></i>
                    <span>Hero</span>
                    <?php if(request()->routeIs('admin.hero.*')): ?>
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    <?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.artikel.index')); ?>"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-xl transition-all duration-200 <?php echo e(request()->routeIs('admin.artikel.*') ? 'bg-amber-500/10 text-amber-400 shadow-sm' : 'text-stone-400 hover:text-white hover:bg-white/5'); ?>">
                    <i class="fas fa-newspaper w-4 text-center"></i>
                    <span>Blog</span>
                    <?php if(request()->routeIs('admin.artikel.*')): ?>
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    <?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.galeri.index')); ?>"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-xl transition-all duration-200 <?php echo e(request()->routeIs('admin.galeri.*') ? 'bg-amber-500/10 text-amber-400 shadow-sm' : 'text-stone-400 hover:text-white hover:bg-white/5'); ?>">
                    <i class="fas fa-images w-4 text-center"></i>
                    <span>Galeri</span>
                    <?php if(request()->routeIs('admin.galeri.*')): ?>
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    <?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.layanan.index')); ?>"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-xl transition-all duration-200 <?php echo e(request()->routeIs('admin.layanan.*') ? 'bg-amber-500/10 text-amber-400 shadow-sm' : 'text-stone-400 hover:text-white hover:bg-white/5'); ?>">
                    <i class="fas fa-tools w-4 text-center"></i>
                    <span>Layanan</span>
                    <?php if(request()->routeIs('admin.layanan.*')): ?>
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    <?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.faq.index')); ?>"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-xl transition-all duration-200 <?php echo e(request()->routeIs('admin.faq.*') ? 'bg-amber-500/10 text-amber-400 shadow-sm' : 'text-stone-400 hover:text-white hover:bg-white/5'); ?>">
                    <i class="fas fa-question-circle w-4 text-center"></i>
                    <span>FAQ</span>
                    <?php if(request()->routeIs('admin.faq.*')): ?>
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    <?php endif; ?>
                </a>

                <p class="px-4 py-1 pt-4 text-[10px] text-stone-500 uppercase tracking-wider font-semibold">Pengaturan</p>

                <a href="<?php echo e(route('admin.settings.edit')); ?>"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm rounded-xl transition-all duration-200 <?php echo e(request()->routeIs('admin.settings.*') ? 'bg-amber-500/10 text-amber-400 shadow-sm' : 'text-stone-400 hover:text-white hover:bg-white/5'); ?>">
                    <i class="fas fa-cog w-4 text-center"></i>
                    <span>Pengaturan</span>
                    <?php if(request()->routeIs('admin.settings.*')): ?>
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    <?php endif; ?>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-0'" class="flex-1 flex flex-col min-h-screen max-w-full transition-all duration-300 ease-in-out">
            <!-- Header -->
            <header class="bg-white/80 backdrop-blur-xl border-b border-stone-200/60 h-16 px-4 lg:px-6 flex items-center justify-between sticky top-0 z-20 shadow-sm">
                <div class="flex items-center gap-4">
                    <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-stone-500 hover:text-stone-900 p-2 hover:bg-stone-100 rounded-lg transition-colors">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:flex text-stone-400 hover:text-stone-600 p-1.5 rounded-lg hover:bg-stone-100 transition-colors">
                        <i :class="sidebarOpen ? 'fas fa-times' : 'fas fa-bars'" class="text-sm"></i>
                    </button>
                    <div>
                        <h1 class="text-sm font-semibold text-stone-900 font-display"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></h1>
                        <p class="text-xs text-stone-400"><?php echo $__env->yieldContent('subtitle', 'Kelola konten website'); ?></p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div x-data="{ userOpen: false }" class="relative">
                        <button @click="userOpen = !userOpen" @click.outside="userOpen = false" class="flex items-center gap-2 pl-3 border-l border-stone-200 hover:bg-stone-50 rounded-xl px-3 py-1.5 transition-colors">
                            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-amber-50 to-orange-100 flex items-center justify-center text-amber-600 text-xs font-bold shadow-sm">
                                <?php echo e(substr(Auth::user()->name ?? 'A', 0, 1)); ?>

                            </div>
                            <span class="text-sm text-stone-700 font-medium hidden sm:inline"><?php echo e(Auth::user()->name ?? 'Admin'); ?></span>
                            <i class="fas fa-chevron-down text-[10px] text-stone-400" :class="userOpen ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="userOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95 translate-y-2" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-2" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-stone-200 py-1 z-50" @click="userOpen = false">
                            <a href="<?php echo e(route('admin.profile')); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-stone-700 hover:bg-amber-50 hover:text-amber-700 transition-colors">
                                <i class="fas fa-user-cog w-4 text-center text-stone-400"></i>
                                <span>Profil</span>
                            </a>
                            <hr class="border-stone-100 mx-3">
                            <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="flex items-center gap-3 px-4 py-2.5 text-sm text-stone-700 hover:bg-rose-50 hover:text-rose-600 w-full text-left transition-colors">
                                    <i class="fas fa-sign-out-alt w-4 text-center text-stone-400"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 p-4 lg:p-8">
                <?php if(session('success')): ?>
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-[-10px] scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-[-10px] scale-95"
                     class="mb-6 flex items-center gap-3 px-5 py-3.5 bg-emerald-50 border border-emerald-200/60 text-emerald-700 rounded-xl text-sm shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center shrink-0">
                        <i class="fas fa-check-circle text-emerald-600"></i>
                    </div>
                    <span class="flex-1"><?php echo e(session('success')); ?></span>
                    <button @click="show = false" class="text-emerald-400 hover:text-emerald-600 p-1">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-[-10px] scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-[-10px] scale-95"
                     class="mb-6 flex items-center gap-3 px-5 py-3.5 bg-rose-50 border border-rose-200/60 text-rose-700 rounded-xl text-sm shadow-sm">
                    <div class="w-8 h-8 rounded-lg bg-rose-100 flex items-center justify-center shrink-0">
                        <i class="fas fa-exclamation-circle text-rose-600"></i>
                    </div>
                    <span class="flex-1"><?php echo e($errors->first()); ?></span>
                    <button @click="show = false" class="text-rose-400 hover:text-rose-600 p-1">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>

        <!-- Confirm Modal -->
        <div x-show="confirm.show" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
            <div x-show="confirm.show"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                 @click.away="confirm.show = false"
                 class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 border border-stone-200/60">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-rose-50 flex items-center justify-center text-rose-500 shrink-0">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-stone-900 font-display">Konfirmasi</h3>
                        <p class="text-sm text-stone-500 mt-1" x-text="confirm.message"></p>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 mt-6 pt-4 border-t border-stone-100">
                    <button @click="confirm.show = false" class="text-sm font-medium text-stone-500 hover:text-stone-700 px-4 py-2.5 rounded-xl hover:bg-stone-50 transition-all">Batal</button>
                    <button @click="confirm.show = false; if(confirm.action) confirm.action()" class="inline-flex items-center gap-2 text-sm font-medium px-5 py-2.5 bg-rose-500 hover:bg-rose-600 text-white rounded-xl shadow-lg shadow-rose-500/25 transition-all">
                        <i class="fas fa-trash"></i>
                        <span>Ya, Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</body>
</html><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\layouts\admin.blade.php ENDPATH**/ ?>