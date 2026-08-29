<?php $__env->startSection('meta_title', 'FAQ — Pertanyaan Umum Juneo Phone'); ?>
<?php $__env->startSection('meta_desc', 'Temukan jawaban untuk pertanyaan yang sering diajukan tentang layanan service HP di Juneo Phone.'); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-header','data' => ['page' => 'faq','icon' => 'question-circle','label' => 'FAQ','title' => 'Pertanyaan Umum','subtitle' => 'Temukan jawaban untuk pertanyaan yang sering diajukan.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => 'faq','icon' => 'question-circle','label' => 'FAQ','title' => 'Pertanyaan Umum','subtitle' => 'Temukan jawaban untuk pertanyaan yang sering diajukan.']); ?>
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

<!-- Proses Service -->
<section class="relative -mt-10 z-20 max-w-5xl mx-auto px-4 mb-10">
    <div class="grid sm:grid-cols-2 gap-4">
        <div class="bg-white rounded-2xl p-6 shadow-xl border border-stone-200/60 card-hover">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-50 to-green-50 flex items-center justify-center text-emerald-600 shrink-0">
                    <i class="fas fa-clock text-lg"></i>
                </div>
                <div>
                    <h3 class="font-display font-semibold text-stone-900 mb-1">Kerusakan Ringan</h3>
                    <p class="text-sm text-stone-500 mb-3">Charging port, tombol, software ringan, pembersihan internal — bisa ditunggu</p>
                    <div class="flex items-center gap-2 text-xs text-emerald-600 font-medium">
                        <i class="fas fa-hourglass-half"></i>
                        Estimasi 15–30 Menit
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-xl border border-stone-200/60 card-hover">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0">
                    <i class="fas fa-tools text-lg"></i>
                </div>
                <div>
                    <h3 class="font-display font-semibold text-stone-900 mb-1">Kerusakan Berat</h3>
                    <p class="text-sm text-stone-500 mb-3">Ganti LCD, ganti baterai, mainboard, terkena cairan — butuh sparepart</p>
                    <div class="flex items-center gap-2 text-xs text-amber-600 font-medium">
                        <i class="fas fa-hourglass-half"></i>
                        Estimasi 1–2 Hari (Tinggalkan HP / Opname)
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <?php echo $__env->make('components.faq-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('components.footer-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views/frontend/faq.blade.php ENDPATH**/ ?>