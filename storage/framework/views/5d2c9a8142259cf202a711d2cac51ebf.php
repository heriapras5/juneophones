<?php $__env->startSection('meta_title', 'Kontak Juneo Phone Service'); ?>
<?php $__env->startSection('meta_desc', 'Hubungi Juneo Phone Service via WhatsApp, telepon, email, atau kunjungi langsung toko kami.'); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-header','data' => ['page' => 'kontak','icon' => 'address-card','label' => 'Kontak','title' => 'Hubungi Kami','subtitle' => 'Kami siap membantu Anda. Silakan hubungi melalui form atau kontak di bawah.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => 'kontak','icon' => 'address-card','label' => 'Kontak','title' => 'Hubungi Kami','subtitle' => 'Kami siap membantu Anda. Silakan hubungi melalui form atau kontak di bawah.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e)): ?>
<?php $attributes = $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e; ?>
<?php unset($__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e)): ?>
<?php $component = $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e; ?>
<?php unset($__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e); ?>
<?php endif; ?>

<!-- Form + Info Kontak -->
<section class="relative -mt-10 z-20 max-w-7xl mx-auto px-4">
    <div class="grid lg:grid-cols-5 gap-6">
        <!-- Form Kontak -->
        <div class="lg:col-span-3 bg-white rounded-2xl shadow-xl border border-stone-200/60 p-6 lg:p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-stone-900 font-display">Kirim Pesan</h3>
                    <p class="text-xs text-stone-400">Isi form di bawah untuk menghubungi kami</p>
                </div>
            </div>

            <?php if($settings['whatsapp'] ?? null): ?>
            <form action="https://wa.me/<?php echo e($settings['whatsapp']); ?>" method="GET" target="_blank" onsubmit="return sendToWhatsApp(event)">
                <div class="space-y-4">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Nama <span class="text-rose-500">*</span></label>
                            <input type="text" id="contact-name" required
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"
                                   placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Email</label>
                            <input type="email" id="contact-email"
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"
                                   placeholder="email@anda.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Telepon <span class="text-rose-500">*</span></label>
                        <input type="tel" id="contact-phone" required
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"
                               placeholder="081234567890">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Pesan <span class="text-rose-500">*</span></label>
                        <textarea id="contact-message" rows="4" required
                                  class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all resize-none"
                                  placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>
                    <button type="submit"
                            class="btn-primary text-sm py-3 px-6 w-full justify-center shadow-lg shadow-amber-500/25">
                        <i class="fab fa-whatsapp mr-2"></i> Kirim via WhatsApp
                    </button>
                    <p class="text-xs text-stone-400 text-center">Pesan akan dikirim langsung via WhatsApp</p>
                </div>
            </form>
            <?php else: ?>
            <div class="flex flex-col items-center justify-center py-12 text-stone-400">
                <div class="w-16 h-16 rounded-2xl bg-stone-100 flex items-center justify-center mb-4">
                    <i class="fab fa-whatsapp text-2xl text-stone-300"></i>
                </div>
                <p class="text-sm font-medium text-stone-500">WhatsApp belum dikonfigurasi</p>
                <p class="text-xs text-stone-400 mt-1">Silakan hubungi admin untuk mengatur nomor WhatsApp.</p>
            </div>
            <?php endif; ?>

            <script>
            function sendToWhatsApp(e) {
                e.preventDefault();
                const name = document.getElementById('contact-name').value.trim();
                const email = document.getElementById('contact-email').value.trim();
                const phone = document.getElementById('contact-phone').value.trim();
                const message = document.getElementById('contact-message').value.trim();
                const waNumber = '<?php echo e($settings["whatsapp"] ?? ""); ?>';
                let text = `Halo Juneo Phone, saya ${encodeURIComponent(name)} ingin berkonsultasi.%0A%0A`;
                text += `📱 *No. Telepon:* ${encodeURIComponent(phone)}%0A`;
                if (email) text += `📧 *Email:* ${encodeURIComponent(email)}%0A`;
                text += `💬 *Pesan:* ${encodeURIComponent(message)}%0A%0A`;
                text += `Terima kasih.`;
                window.open(`https://wa.me/${waNumber}?text=${text}`, '_blank');
                return false;
            }
            </script>
        </div>

        <!-- Info Kontak -->
        <div class="lg:col-span-2 space-y-4">
            <?php if($settings['alamat'] ?? null): ?>
            <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-stone-200 shadow-sm card-hover">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-1">Alamat</p>
                    <p class="text-sm text-stone-900"><?php echo e($settings['alamat']); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <?php if($settings['telepon'] ?? null): ?>
            <a href="tel:<?php echo e($settings['telepon']); ?>" class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-stone-200 shadow-sm card-hover group">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0 group-hover:scale-110 transition-transform">
                    <i class="fas fa-phone"></i>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-1">Telepon</p>
                    <p class="text-sm text-stone-900"><?php echo e($settings['telepon']); ?></p>
                </div>
            </a>
            <?php endif; ?>

            <?php if($settings['whatsapp'] ?? null): ?>
            <a href="https://wa.me/<?php echo e($settings['whatsapp']); ?>?text=Halo%20Juneo%20Phone%2C%20saya%20ingin%20konsultasi%20tentang%20service%20HP." target="_blank" class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-stone-200 shadow-sm card-hover group">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-50 to-green-50 flex items-center justify-center text-emerald-600 shrink-0 group-hover:scale-110 transition-transform">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-1">WhatsApp</p>
                    <p class="text-sm text-stone-900"><?php echo e($settings['whatsapp']); ?></p>
                </div>
            </a>
            <?php endif; ?>

            <?php if($settings['email'] ?? null): ?>
            <a href="mailto:<?php echo e($settings['email']); ?>" class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-stone-200 shadow-sm card-hover group">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0 group-hover:scale-110 transition-transform">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-1">Email</p>
                    <p class="text-sm text-stone-900"><?php echo e($settings['email']); ?></p>
                </div>
            </a>
            <?php endif; ?>

            <?php if($settings['jam_operasional'] ?? null): ?>
            <?php
                $jamRows = [];
                $parts = explode(',', $settings['jam_operasional']);
                foreach ($parts as $p) {
                    $p = trim($p);
                    if (str_contains($p, ':')) {
                        $split = explode(':', $p, 2);
                        $hari = trim($split[0]);
                        $jam = trim($split[1]);
                        if ($hari && $jam) $jamRows[] = ['hari' => $hari, 'jam' => $jam];
                    } else {
                        $jamRows[] = ['hari' => $p, 'jam' => ''];
                    }
                }
            ?>
            <div class="bg-white rounded-2xl p-5 border border-stone-200 shadow-sm">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-2">Jam Operasional</p>
                        <div class="space-y-1">
                            <?php $__currentLoopData = $jamRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between gap-2 text-sm">
                                <span class="text-stone-500 font-medium whitespace-nowrap"><?php echo e($r['hari']); ?></span>
                                <span class="text-stone-900 text-right"><?php echo e($r['jam'] ?: '-'); ?></span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Full Width Maps -->
<section class="mt-10">
    <div class="max-w-7xl mx-auto px-4">
        <div class="rounded-2xl shadow-xl border border-stone-200/60 bg-white overflow-hidden">
            <?php if($settings['maps_embed'] ?? null): ?>
            <div class="w-full aspect-[21/9] max-sm:aspect-[4/3]">
                <iframe src="<?php echo e($settings['maps_embed']); ?>" width="100%" height="100%" title="Peta lokasi Juneo Phone" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="block w-full h-full"></iframe>
            </div>
            <?php else: ?>
            <div class="w-full aspect-[21/9] max-sm:aspect-[4/3] bg-gradient-to-br from-stone-100 to-stone-200 flex items-center justify-center">
                <div class="text-center text-stone-400">
                    <i class="fas fa-map-marked-alt text-4xl md:text-5xl mb-3"></i>
                    <p class="text-sm">Google Maps belum dikonfigurasi.</p>
                    <p class="text-xs text-stone-300 mt-1">Atur di Admin → Kontak</p>
                </div>
            </div>
            <?php endif; ?>
            <div class="flex items-center justify-between px-4 sm:px-6 py-3 sm:py-4 bg-stone-50 border-t border-stone-100">
                <p class="text-xs sm:text-sm text-stone-500 truncate mr-3"><i class="fas fa-map-pin text-amber-500 mr-1.5"></i><?php echo e($settings['alamat'] ?? 'Juneo Phone'); ?></p>
                <a href="<?php echo e($settings['maps_link'] ?? 'https://www.google.com/maps?q=' . urlencode($settings['alamat'] ?? 'Juneo Phone')); ?>" target="_blank"
                   class="shrink-0 inline-flex items-center gap-1.5 text-xs font-medium text-amber-600 hover:text-amber-700 bg-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg border border-stone-200 shadow-sm hover:shadow transition-all">
                    <i class="fas fa-external-link-alt"></i>
                    Buka Maps
                </a>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('components.footer-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views/frontend/kontak.blade.php ENDPATH**/ ?>