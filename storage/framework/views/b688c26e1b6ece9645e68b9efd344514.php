<?php $keunggulan = $settings['keunggulan'] ?? []; ?>

<section class="relative py-20 lg:py-28 bg-gradient-to-br from-amber-50/40 via-white to-stone-50/60">
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-amber-400/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-start lg:items-center">
            <div x-intersect="$el.classList.add('section-visible')" class="section-hidden">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gradient-to-r from-amber-400/10 to-orange-500/10 border border-amber-500/20 text-amber-600 text-xs font-semibold uppercase tracking-wider mb-4">
                    <i class="fas fa-store"></i>
                    <span>Tentang Kami</span>
                </div>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-stone-900 flex items-center gap-3 mb-6">
                    <?php echo e($about->judul ?? 'Tentang Kami'); ?>

                    <span class="w-8 h-1 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full hidden sm:inline-block"></span>
                </h2>
                <p class="text-stone-600 leading-relaxed text-base lg:text-lg mb-8">
                    <?php echo e($about->deskripsi ?? 'Juneo Phone Service adalah toko service HP Android & iPhone yang telah berpengalaman bertahun-tahun. Kami berkomitmen memberikan layanan terbaik dengan harga terjangkau dan kualitas terjamin.'); ?>

                </p>

                <?php if($about->visi || $about->misi): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <?php if($about->visi): ?>
                    <div class="p-3 sm:p-4 rounded-xl bg-white border border-stone-200/60 shadow-sm">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white text-[10px]">
                                <i class="fas fa-eye"></i>
                            </div>
                            <span class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Visi</span>
                        </div>
                        <p class="text-sm text-stone-600 leading-relaxed"><?php echo e($about->visi); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($about->misi): ?>
                    <div class="p-3 sm:p-4 rounded-xl bg-white border border-stone-200/60 shadow-sm">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white text-[10px]">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <span class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Misi</span>
                        </div>
                        <p class="text-sm text-stone-600 leading-relaxed"><?php echo e($about->misi); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <?php if(!empty($keunggulan)): ?>
                        <?php $__currentLoopData = $keunggulan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-start gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl bg-amber-50/50 border border-amber-100/50">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shrink-0 shadow-md shadow-amber-500/15">
                                <i class="<?php echo e($k['icon'] ?? 'fas fa-star'); ?> text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-900 text-sm"><?php echo e($k['label'] ?? ''); ?></h4>
                                <p class="text-xs text-stone-500 mt-0.5"><?php echo e($k['deskripsi'] ?? ''); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="flex items-start gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl bg-amber-50/50 border border-amber-100/50">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shrink-0 shadow-lg shadow-amber-500/20">
                                <i class="fas fa-shield-alt text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-900 text-sm">Terpercaya</h4>
                                <p class="text-xs text-stone-500 mt-0.5">Ribuan pelanggan membuktikan</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl bg-amber-50/50 border border-amber-100/50">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shrink-0 shadow-lg shadow-amber-500/20">
                                <i class="fas fa-award text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-900 text-sm">Berpengalaman</h4>
                                <p class="text-xs text-stone-500 mt-0.5">Teknisi profesional & tersertifikasi</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl bg-amber-50/50 border border-amber-100/50">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shrink-0 shadow-lg shadow-amber-500/20">
                                <i class="fas fa-file-signature text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-900 text-sm">Bergaransi</h4>
                                <p class="text-xs text-stone-500 mt-0.5">Setiap perbaikan ada garansinya</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl bg-amber-50/50 border border-amber-100/50">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shrink-0 shadow-lg shadow-amber-500/20">
                                <i class="fas fa-tag text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-900 text-sm">Harga Terjangkau</h4>
                                <p class="text-xs text-stone-500 mt-0.5">Kualitas terbaik, harga bersahabat</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div x-intersect="$el.classList.add('section-visible')" class="section-hidden" style="transition-delay: 200ms;">
                <div x-data="{ tiltX: 0, tiltY: 0, handleMove(e) { const r = $el.getBoundingClientRect(); if (window.innerWidth < 640) return; const x = (e.clientX - r.left) / r.width - 0.5; const y = (e.clientY - r.top) / r.height - 0.5; this.tiltY = x * 12; this.tiltX = y * -12; }, handleLeave() { this.tiltX = 0; this.tiltY = 0; } }"
                     @mousemove="handleMove" @mouseleave="handleLeave"
                     :style="`perspective: 1200px; ${window.innerWidth >= 640 ? 'transform: rotateX(' + tiltX + 'deg) rotateY(' + tiltY + 'deg)' : ''}`"
                     class="relative transition-transform duration-200 ease-out">
                    <div class="absolute -top-4 -left-4 w-32 h-32 bg-amber-400/10 rounded-3xl animate-floatSlow"></div>
                    <div class="absolute -bottom-4 -right-4 w-full h-full border-2 border-amber-400/20 rounded-3xl -z-10"
                         :style="`transform: translateZ(${window.innerWidth >= 640 ? '-30px' : '0px'}) ${window.innerWidth >= 640 ? 'rotateX(' + tiltX * -0.3 + 'deg) rotateY(' + tiltY * -0.3 + 'deg)' : ''}`"></div>
                    <?php if($about && $about->foto): ?>
                    <img src="<?php echo e(asset('storage/' . $about->foto)); ?>" alt="Toko Juneo Phone"
                         class="relative rounded-3xl shadow-2xl ring-1 ring-amber-400/20 w-full max-h-[200px] sm:max-h-[500px] object-contain bg-stone-100"
                         :style="`transform: translateZ(${window.innerWidth >= 640 ? '20px' : '0px'})`">
                    <?php else: ?>
                    <div class="relative rounded-3xl bg-gradient-to-br from-stone-100 to-stone-200 w-full h-[180px] sm:h-[450px] flex items-center justify-center"
                         :style="`transform: translateZ(${window.innerWidth >= 640 ? '20px' : '0px'})`">
                        <div class="text-center">
                            <i class="fas fa-store text-3xl sm:text-6xl text-stone-300 mb-3"></i>
                            <p class="text-stone-400 text-xs sm:text-sm">Foto Toko</p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\components\about-section.blade.php ENDPATH**/ ?>