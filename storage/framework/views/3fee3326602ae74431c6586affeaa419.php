<section class="relative py-20 lg:py-28 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-intersect="$el.classList.add('section-visible')" class="section-hidden text-center max-w-2xl mx-auto mb-14">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-orange-500 rounded-full"></div>
                <span class="text-xs font-semibold text-stone-400 uppercase tracking-[0.2em]">FAQ</span>
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-orange-500 rounded-full"></div>
            </div>
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-stone-900 mb-4">Pertanyaan Umum</h2>
            <p class="text-stone-500 text-base lg:text-lg">Temukan jawaban untuk pertanyaan yang sering diajukan.</p>
        </div>

        <div x-intersect="$el.classList.add('section-visible')" class="section-hidden space-y-3">
            <?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div x-data="{ open: false }" class="bg-stone-50 border border-stone-200 rounded-2xl overflow-hidden transition-all duration-300"
                 x-bind:class="open ? 'ring-2 ring-amber-400/30 shadow-lg bg-white' : ''">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-6 py-5 text-left transition-colors">
                    <span class="font-medium text-stone-900 text-sm lg:text-base pr-4"><?php echo e($faq->pertanyaan); ?></span>
                    <div class="w-8 h-8 rounded-xl bg-white border border-stone-200 flex items-center justify-center shrink-0 transition-all duration-300"
                         x-bind:class="open ? 'border-amber-500/30 bg-amber-50 rotate-45' : ''">
                        <i class="fas fa-plus text-stone-400 transition-transform duration-300 text-xs"
                           x-bind:class="open ? 'rotate-45 text-amber-500' : ''"></i>
                    </div>
                </button>
                <div x-show="open" x-collapse.duration.150ms>
                    <div class="px-6 pb-5">
                        <div class="w-12 h-0.5 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full mb-4"></div>
                        <p class="text-sm text-stone-600 leading-relaxed"><?php echo e($faq->jawaban); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-12 text-stone-400">
                <i class="fas fa-question-circle text-4xl mb-3"></i>
                <p>Belum ada FAQ.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\components\faq-section.blade.php ENDPATH**/ ?>