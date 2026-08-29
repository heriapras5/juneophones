<?php $__env->startSection('title', 'Profil'); ?>
<?php $__env->startSection('subtitle', 'Kelola profil admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-user-cog"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Profil Admin</h3>
                <p class="text-xs text-stone-400">Perbarui informasi akun Anda</p>
            </div>
        </div>

        <form method="POST" action="<?php echo e(route('admin.profile.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" value="<?php echo e(old('name', Auth::user()->name)); ?>" required max="255"
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email', Auth::user()->email)); ?>" required
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <hr class="border-stone-200">

                <div>
                    <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider mb-3">Ganti Password <span class="text-stone-300 font-normal normal-case">(opsional)</span></p>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-stone-400 mb-1">Password Baru</label>
                            <input type="password" name="password" min="6"
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-stone-400 mb-1">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" min="6"
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <button type="submit"
                            class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-stone-500 hover:text-stone-700 transition-colors px-4 py-2.5">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\admin\profile.blade.php ENDPATH**/ ?>