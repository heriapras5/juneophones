<footer class="relative bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 border-t border-amber-500/10">
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10">
            <div>
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 mb-4">
                    <?php if($settings['logo']): ?>
                    <img src="<?php echo e(asset('storage/' . $settings['logo'])); ?>" alt="Juneo Phone" class="logo-img-3d">
                    <?php else: ?>
                    <div class="logo-gold-3d">
                        <span class="text-sm">J</span>
                    </div>
                    <?php endif; ?>
                    <span class="font-display font-bold text-white text-lg">Juneo Phone</span>
                </a>
                <p class="text-stone-400 text-sm leading-relaxed">Ahlinya Service HP Android &amp; iPhone. Solusi terpercaya untuk perbaikan handphone Anda.</p>
            </div>

            <div>
                <h4 class="font-display font-bold text-white text-sm uppercase tracking-wider mb-4">Navigasi</h4>
                <ul class="flex flex-wrap gap-x-5 gap-y-2 sm:flex-col sm:gap-y-2.5">
                    <li><a href="<?php echo e(route('home')); ?>" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>Beranda</a></li>
                    <li><a href="<?php echo e(route('tentang')); ?>" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>Tentang Kami</a></li>
                    <li><a href="<?php echo e(route('kontak')); ?>" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>Kontak</a></li>
                    <li><a href="<?php echo e(route('faq')); ?>" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>FAQ</a></li>
                </ul>
            </div>

            <div class="sm:col-span-2 lg:col-span-1">
                <h4 class="font-display font-bold text-white text-sm uppercase tracking-wider mb-4">Ikuti Kami</h4>
                <?php $sosialMedia = $settings['sosial_media'] ?? []; ?>
                <div class="flex items-center gap-2.5 mb-4">
                    <?php if(!empty($sosialMedia)): ?>
                        <?php $__currentLoopData = $sosialMedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($sm['url'] ?? '#'); ?>" target="_blank"
                           class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-stone-400 hover:text-amber-400 hover:border-amber-500/30 hover:bg-amber-500/10 transition-all duration-200">
                            <i class="<?php echo e($sm['icon'] ?? 'fas fa-globe'); ?>"></i>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <span class="text-stone-500 text-sm">Belum ada sosial media</span>
                    <?php endif; ?>
                </div>
                <div class="bg-white/5 rounded-xl p-3 sm:p-4 border border-white/5">
                    <p class="text-[10px] text-stone-500 uppercase tracking-wider mb-2">Jam Operasional</p>
                    <?php
                        $jam = $settings['jam_operasional'] ?? 'Sen–Kam: 09:00–18:00, Jum: Libur, Sab: 09:00–16:00';
                        $parts = explode(',', $jam);
                    ?>
                    <div class="space-y-1 text-xs sm:text-sm text-stone-300">
                        <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $trimmed = trim($p); $isLibur = str_contains($trimmed, 'Libur'); ?>
                        <div class="flex justify-between items-center <?php echo e($isLibur ? 'text-rose-400' : ''); ?>">
                            <span><?php echo e(Str::before($trimmed, ':')); ?></span>
                            <span class="font-medium <?php echo e($isLibur ? '' : 'text-stone-100'); ?>"><?php echo e(trim(Str::after($trimmed, ':'))); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 sm:mt-10 pt-6 sm:pt-8 border-t border-white/5 flex flex-col items-center text-center gap-3">
            <p class="text-stone-500 text-xs sm:text-sm">&copy; 2026 Juneo Phone Service. All rights reserved.</p>
            <a href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" class="text-stone-500 hover:text-amber-400 text-xs sm:text-sm transition-colors flex items-center gap-2">
                <i class="fas fa-arrow-up text-xs"></i> Kembali ke atas
            </a>
        </div>
    </div>
</footer>
<?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\components\footer-section.blade.php ENDPATH**/ ?>