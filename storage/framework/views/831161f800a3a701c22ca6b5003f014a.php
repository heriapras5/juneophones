<?php $__env->startSection('meta_title', 'Service HP Android & iPhone Terpercaya'); ?>
<?php $__env->startSection('meta_desc', 'Juneo Phone - jasa service HP Android & iPhone terpercaya. Teknisi profesional, harga terjangkau, bergaransi. Hubungi kami sekarang!'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('components.hero-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if($about): ?>
    <?php $keunggulan = $settings['keunggulan'] ?? []; ?>
    <section class="relative py-16 lg:py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gradient-to-r from-amber-400/10 to-orange-500/10 border border-amber-500/20 text-amber-600 text-xs font-semibold uppercase tracking-wider mb-4">
                    <i class="fas fa-store"></i>
                    <span>Tentang Kami</span>
                </div>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-stone-900 flex items-center justify-center gap-3">
                    <?php echo e($about->judul ?? 'Tentang Juneo Phone'); ?>

                    <span class="w-8 h-1 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full hidden sm:inline-block"></span>
                </h2>
            </div>
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-start lg:items-center">
                <div x-intersect="$el.classList.add('section-visible')" class="section-hidden">
                    <p class="text-stone-600 leading-relaxed text-base lg:text-lg mb-6"><?php echo e($about->deskripsi); ?></p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                        <?php $__currentLoopData = array_slice($keunggulan, 0, 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-start gap-3 p-3 rounded-xl bg-amber-50/50 border border-amber-100/50">
                            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shrink-0 shadow-md shadow-amber-500/15">
                                <i class="<?php echo e($k['icon'] ?? 'fas fa-star'); ?> text-xs"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-stone-900 text-sm"><?php echo e($k['label'] ?? $k['judul'] ?? ''); ?></h4>
                                <p class="text-xs text-stone-500 mt-0.5"><?php echo e($k['deskripsi'] ?? ''); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(route('tentang')); ?>" class="inline-flex items-center gap-2 text-amber-600 hover:text-amber-700 font-medium transition-colors group">
                        Selengkapnya <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                    </a>
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
                             class="relative rounded-3xl shadow-2xl w-full max-h-[400px] object-contain bg-stone-100"
                             :style="`transform: translateZ(${window.innerWidth >= 640 ? '20px' : '0px'})`">
                        <?php else: ?>
                        <div class="relative rounded-3xl bg-gradient-to-br from-stone-100 to-stone-200 w-full h-[300px] sm:h-[400px] flex items-center justify-center"
                             :style="`transform: translateZ(${window.innerWidth >= 640 ? '20px' : '0px'})`">
                            <div class="text-center">
                                <i class="fas fa-store text-5xl sm:text-6xl text-stone-300 mb-3"></i>
                                <p class="text-stone-400 text-sm">Foto Toko</p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php echo $__env->make('components.services-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- CTA Section -->
    <section class="relative py-16 lg:py-24 bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 overflow-hidden">
        <div class="absolute inset-0 hero-glow"></div>
        <div class="absolute inset-0 hero-glow-2"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            <div x-intersect="$el.classList.add('animate-fadeIn')" class="opacity-0">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gradient-to-r from-amber-400/10 to-orange-500/10 border border-amber-500/20 text-amber-400 text-xs font-semibold uppercase tracking-wider mb-4 backdrop-blur-sm">
                    <i class="fas fa-bolt text-[10px]"></i> Konsultasi Gratis
                </div>
            </div>
            <h2 x-intersect="$el.classList.add('animate-slideUp')" class="opacity-0 font-display text-3xl sm:text-4xl font-bold text-white flex items-center justify-center gap-3 mb-4">
                Siap Service HP Anda?
                <span class="w-8 h-1 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full hidden sm:inline-block"></span>
            </h2>
            <p x-intersect="$el.classList.add('animate-slideUp')" class="opacity-0 text-stone-400 text-lg mb-8 max-w-2xl mx-auto" style="transition-delay: 150ms;">Hubungi kami sekarang juga. Teknisi kami siap membantu perbaikan HP Android & iPhone Anda.</p>
            <?php if($settings['whatsapp'] ?? null): ?>
            <div x-intersect="$el.classList.add('animate-slideUp')" class="opacity-0" style="transition-delay: 300ms;">
                <a href="https://wa.me/<?php echo e($settings['whatsapp']); ?>?text=Halo%20Juneo%20Phone%2C%20saya%20ingin%20konsultasi%20tentang%20service%20HP." target="_blank"
                   class="btn-primary text-lg py-4 px-10 shadow-2xl shadow-amber-500/30">
                    <i class="fab fa-whatsapp text-xl"></i>
                    Konsultasi Gratis via WhatsApp
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <?php echo $__env->make('components.footer-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\frontend\home.blade.php ENDPATH**/ ?>