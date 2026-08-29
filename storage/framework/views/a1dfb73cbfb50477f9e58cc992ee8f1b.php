<section class="relative py-20 lg:py-28 bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 overflow-hidden">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="absolute inset-0 hero-glow-2"></div>
    <div class="absolute top-20 left-20 w-96 h-96 bg-amber-500/5 rounded-full blur-3xl animate-floatSlow"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-orange-500/5 rounded-full blur-3xl animate-floatSlow" style="animation-delay: 2s;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-intersect="$el.classList.add('section-visible')" class="section-hidden text-center max-w-2xl mx-auto mb-14">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-orange-500 rounded-full"></div>
                <span class="text-xs font-semibold text-amber-400/70 uppercase tracking-[0.2em]">Statistik</span>
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-orange-500 rounded-full"></div>
            </div>
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-white mb-4">Angka Berbicara</h2>
            <p class="text-stone-400 text-base lg:text-lg">Kepercayaan pelanggan adalah prioritas utama kami.</p>
        </div>

        <div class="grid sm:grid-cols-3 gap-6 lg:gap-8">
            <div x-data="{ count: 0, target: <?php echo e(preg_replace('/[^0-9]/', '', $settings['stats_service'] ?? '1500')); ?>, suffix: '<?php echo e(preg_replace('/[0-9]/', '', $settings['stats_service'] ?? '+')); ?>' }"
                 x-init="$nextTick(() => { let i = 0; const interval = setInterval(() => { if(i < target) { i += Math.ceil(target / 40); count = Math.min(i, target); } else { clearInterval(interval); } }, 30); })"
                 x-intersect="$el.classList.add('section-visible')"
                 class="section-hidden text-center glass-dark rounded-2xl p-8 lg:p-10 card-hover group"
                 style="transition-delay: 0ms;">
                <div class="relative inline-flex mb-4">
                    <svg class="w-20 h-20 -rotate-90" viewBox="0 0 72 72">
                        <circle cx="36" cy="36" r="30" fill="none" stroke="rgba(251,191,36,0.1)" stroke-width="3"/>
                        <circle cx="36" cy="36" r="30" fill="none" stroke="url(#grad1)" stroke-width="3" stroke-dasharray="188.5" stroke-dashoffset="37.7" stroke-linecap="round"/>
                    </svg>
                    <svg class="absolute inset-0 w-full h-full"><defs><linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#fbbf24"/><stop offset="100%" stop-color="#f97316"/></linearGradient></defs></svg>
                    <i class="fas fa-wrench absolute inset-0 flex items-center justify-center text-amber-400 text-xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="text-4xl sm:text-5xl font-bold text-gradient mb-1">
                    <span x-text="count"></span><span x-text="suffix"></span>
                </div>
                <p class="text-stone-400 text-sm font-medium">Total Service</p>
            </div>

            <div x-data="{ count: 0, target: <?php echo e(preg_replace('/[^0-9]/', '', $settings['stats_pelanggan'] ?? '1000')); ?>, suffix: '<?php echo e(preg_replace('/[0-9]/', '', $settings['stats_pelanggan'] ?? '+')); ?>' }"
                 x-init="$nextTick(() => { let i = 0; const interval = setInterval(() => { if(i < target) { i += Math.ceil(target / 40); count = Math.min(i, target); } else { clearInterval(interval); } }, 30); })"
                 x-intersect="$el.classList.add('section-visible')"
                 class="section-hidden text-center glass-dark rounded-2xl p-8 lg:p-10 card-hover group"
                 style="transition-delay: 150ms;">
                <div class="relative inline-flex mb-4">
                    <svg class="w-20 h-20 -rotate-90" viewBox="0 0 72 72">
                        <circle cx="36" cy="36" r="30" fill="none" stroke="rgba(251,191,36,0.1)" stroke-width="3"/>
                        <circle cx="36" cy="36" r="30" fill="none" stroke="url(#grad2)" stroke-width="3" stroke-dasharray="188.5" stroke-dashoffset="56.5" stroke-linecap="round"/>
                    </svg>
                    <svg class="absolute inset-0 w-full h-full"><defs><linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#fbbf24"/><stop offset="100%" stop-color="#f97316"/></linearGradient></defs></svg>
                    <i class="fas fa-users absolute inset-0 flex items-center justify-center text-amber-400 text-xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="text-4xl sm:text-5xl font-bold text-gradient mb-1">
                    <span x-text="count"></span><span x-text="suffix"></span>
                </div>
                <p class="text-stone-400 text-sm font-medium">Pelanggan Puas</p>
            </div>

            <div x-data="{ count: 0, target: <?php echo e(preg_replace('/[^0-9]/', '', $settings['stats_tahun'] ?? '5')); ?>, suffix: '<?php echo e(preg_replace('/[0-9]/', '', $settings['stats_tahun'] ?? '+')); ?>' }"
                 x-init="$nextTick(() => { let i = 0; const interval = setInterval(() => { if(i < target) { i += Math.ceil(target / 40); count = Math.min(i, target); } else { clearInterval(interval); } }, 50); })"
                 x-intersect="$el.classList.add('section-visible')"
                 class="section-hidden text-center glass-dark rounded-2xl p-8 lg:p-10 card-hover group"
                 style="transition-delay: 300ms;">
                <div class="relative inline-flex mb-4">
                    <svg class="w-20 h-20 -rotate-90" viewBox="0 0 72 72">
                        <circle cx="36" cy="36" r="30" fill="none" stroke="rgba(251,191,36,0.1)" stroke-width="3"/>
                        <circle cx="36" cy="36" r="30" fill="none" stroke="url(#grad3)" stroke-width="3" stroke-dasharray="188.5" stroke-dashoffset="94.25" stroke-linecap="round"/>
                    </svg>
                    <svg class="absolute inset-0 w-full h-full"><defs><linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#fbbf24"/><stop offset="100%" stop-color="#f97316"/></linearGradient></defs></svg>
                    <i class="fas fa-calendar-check absolute inset-0 flex items-center justify-center text-amber-400 text-xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="text-4xl sm:text-5xl font-bold text-gradient mb-1">
                    <span x-text="count"></span><span x-text="suffix"></span>
                </div>
                <p class="text-stone-400 text-sm font-medium">Tahun Pengalaman</p>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\components\stats-section.blade.php ENDPATH**/ ?>