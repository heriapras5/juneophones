<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — Juneo Phone Service</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e($settings['favicon'] ? asset('storage/' . $settings['favicon']) : asset('favicon.ico')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 min-h-screen flex items-center justify-center p-4 antialiased">
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>
    <div class="absolute inset-0 hero-glow-2 pointer-events-none"></div>

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-64 h-64 bg-amber-500/5 rounded-full blur-3xl animate-floatSlow" style="top: 10%; left: 5%;"></div>
        <div class="absolute w-80 h-80 bg-orange-500/5 rounded-full blur-3xl animate-float" style="bottom: 10%; right: 5%; animation-delay: 2s;"></div>
    </div>

    <div x-data="{ show: false }" class="w-full max-w-md relative z-10">
        <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl p-8 border border-white/10">
            <!-- Logo & Title inside card -->
            <div class="text-center mb-6">
                <?php if($settings['logo'] ?? null): ?>
                <img src="<?php echo e(asset('storage/' . $settings['logo'])); ?>" alt="Juneo Phone" class="w-16 h-16 rounded-full object-contain mx-auto mb-3 ring-2 ring-amber-400/50 shadow-lg">
                <?php else: ?>
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white text-xl font-bold mx-auto mb-3 shadow-lg ring-2 ring-amber-300/40">
                    J
                </div>
                <?php endif; ?>
                <h1 class="text-white text-xl font-bold font-display">Juneo Phone</h1>
                <p class="text-stone-400 text-sm mt-1">Buat akun admin baru</p>
            </div>

            <?php if(session('success')): ?>
            <div class="mb-4 flex items-center gap-2 px-4 py-3 bg-emerald-50 border border-emerald-200/60 text-emerald-700 rounded-xl text-sm shadow-sm">
                <div class="w-6 h-6 rounded-lg bg-emerald-100 flex items-center justify-center">
                    <i class="fas fa-check-circle text-emerald-600 text-xs"></i>
                </div>
                <span><?php echo e(session('success')); ?></span>
            </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required max="255" autofocus
                               class="w-full px-4 py-3 bg-white border <?php echo e($errors->has('name') ? 'border-rose-400' : 'border-stone-200'); ?> rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"
                               placeholder="Nama Anda">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Email</label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                               class="w-full px-4 py-3 bg-white border <?php echo e($errors->has('email') ? 'border-rose-400' : 'border-stone-200'); ?> rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"
                               placeholder="admin@juneophone.com">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Password</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="password" required min="6"
                                   class="w-full px-4 py-3 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all pr-12"
                                   placeholder="Minimal 6 karakter">
                            <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-stone-400 hover:text-stone-600 p-1">
                                <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-sm"></i>
                            </button>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required min="6"
                               class="w-full px-4 py-3 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"
                               placeholder="Ulangi password">
                    </div>

                    <button type="submit"
                            class="w-full btn-primary justify-center text-sm py-3 shadow-2xl shadow-amber-500/25">
                        <i class="fas fa-user-plus mr-2"></i> Daftar
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-xs text-stone-400">
                    Sudah punya akun?
                    <a href="<?php echo e(route('admin.login')); ?>" class="text-amber-500 hover:text-amber-600 font-medium transition-colors">Masuk</a>
                </p>
            </div>
        </div>

        <p class="text-center text-stone-500 text-xs mt-6">
            &copy; <?php echo e(date('Y')); ?> Juneo Phone Service
        </p>
    </div>

    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</body>
</html><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\admin\register.blade.php ENDPATH**/ ?>