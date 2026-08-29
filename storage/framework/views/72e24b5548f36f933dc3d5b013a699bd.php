<?php $__env->startSection('meta_title', 'Galeri Foto Juneo Phone Service'); ?>
<?php $__env->startSection('meta_desc', 'Lihat galeri foto Juneo Phone Service — tampilan toko, proses service, dan hasil perbaikan HP.'); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-header','data' => ['page' => 'galeri','icon' => 'images','label' => 'Galeri','title' => 'Galeri Foto','subtitle' => 'Lihat suasana toko dan proses service HP kami.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => 'galeri','icon' => 'images','label' => 'Galeri','title' => 'Galeri Foto','subtitle' => 'Lihat suasana toko dan proses service HP kami.']); ?>
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

<?php if($galeris->count() > 0): ?>
<section class="py-16 lg:py-24 bg-white"
         x-data="galleryLightbox()"
         x-init="init(<?php echo \Illuminate\Support\Js::from($galeris->map(fn($g) => ['id' => $g->id, 'judul' => $g->judul, 'deskripsi' => $g->deskripsi, 'kategori' => $g->kategori, 'foto' => asset('storage/' . $g->foto)]))->toHtml() ?>)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter -->
        <?php if($kategoriList->count() > 0): ?>
        <div class="mb-10">
            <div class="flex flex-wrap items-center justify-center gap-2">
                <button @click="filter = 'all'"
                        x-bind:class="filter === 'all' ? 'bg-gradient-to-r from-amber-400 to-orange-500 text-white shadow-lg shadow-amber-500/20' : 'bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-600'"
                        class="px-5 py-2 rounded-xl text-xs font-medium transition-all duration-200">
                    Semua
                </button>
                <?php $__currentLoopData = $kategoriList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button @click="filter = '<?php echo e($k); ?>'"
                        x-bind:class="filter === '<?php echo e($k); ?>' ? 'bg-gradient-to-r from-amber-400 to-orange-500 text-white shadow-lg shadow-amber-500/20' : 'bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-600'"
                        class="px-5 py-2 rounded-xl text-xs font-medium transition-all duration-200">
                    <?php echo e($k); ?>

                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-5">
            <?php $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div x-show="filter === 'all' || filter === '<?php echo e($item->kategori); ?>'"
                 x-transition:enter="transition-all duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition-all duration-300"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="group relative rounded-xl sm:rounded-2xl overflow-hidden bg-stone-100 shadow-sm card-hover cursor-pointer"
                 @click="openLightbox(<?php echo e($loop->index); ?>)">
                <div class="aspect-[4/3] overflow-hidden">
                    <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="<?php echo e($item->judul); ?>"
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-700">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-5">
                        <h3 class="text-white font-display font-semibold text-[11px] sm:text-sm"><?php echo e($item->judul); ?></h3>
                        <?php if($item->deskripsi): ?>
                        <p class="text-white/70 text-[10px] sm:text-xs mt-0.5 sm:mt-1 line-clamp-2 hidden sm:block"><?php echo e($item->deskripsi); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($item->kategori): ?>
                <span class="absolute top-2 left-2 sm:top-3 sm:left-3 px-1.5 sm:px-2.5 py-0.5 sm:py-1 rounded-full bg-white/90 backdrop-blur-sm text-amber-700 text-[9px] sm:text-[10px] font-medium shadow-sm"><?php echo e($item->kategori); ?></span>
                <?php endif; ?>
                <div class="absolute top-2 right-2 sm:top-3 sm:right-3 w-7 h-7 sm:w-9 sm:h-9 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg">
                    <i class="fas fa-expand text-[10px] sm:text-xs text-stone-700"></i>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Lightbox Enhanced -->
    <template x-teleport="body">
    <div x-show="open"
         x-transition:enter="transition-all duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-all duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[999] flex items-center justify-center bg-black/95 backdrop-blur-sm p-2 sm:p-4"
         @keydown.window.escape="closeLightbox()"
         @keydown.window.left="prev()"
         @keydown.window.right="next()"
         @click="closeLightbox()"
         x-trap.noscroll="open">
        <!-- Close button -->
        <button @click.stop="closeLightbox()"
                class="absolute top-3 right-3 sm:top-6 sm:right-6 w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all z-20 backdrop-blur-sm">
            <i class="fas fa-times"></i>
        </button>

        <!-- Prev -->
        <button x-show="items.length > 1" @click.stop="prev()"
                class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all z-20 backdrop-blur-sm">
            <i class="fas fa-chevron-left text-sm sm:text-base"></i>
        </button>

        <!-- Next -->
        <button x-show="items.length > 1" @click.stop="next()"
                class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all z-20 backdrop-blur-sm">
            <i class="fas fa-chevron-right text-sm sm:text-base"></i>
        </button>

        <!-- Image -->
        <div @click.stop class="flex flex-col items-center w-full max-w-5xl">
            <img :src="currentItem?.foto" :alt="currentItem?.judul"
                 class="max-w-full max-h-[70vh] sm:max-h-[80vh] object-contain rounded-xl sm:rounded-2xl shadow-2xl"
                 @touchstart="touchStart($event)"
                 @touchend="touchEnd($event)">

            <!-- Info -->
            <div class="mt-4 text-center text-white max-w-lg">
                <h3 class="font-display font-semibold text-sm sm:text-base" x-text="currentItem?.judul"></h3>
                <p class="text-white/60 text-xs sm:text-sm mt-1" x-text="currentItem?.deskripsi" x-show="currentItem?.deskripsi"></p>
            </div>

            <!-- Dots -->
            <div class="flex items-center justify-center gap-1.5 mt-4" x-show="items.length > 1">
                <template x-for="(item, idx) in items" :key="idx">
                    <button @click="current = idx"
                            x-bind:class="current === idx ? 'bg-amber-400 w-5' : 'bg-white/30 w-1.5'"
                            class="h-1.5 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
    </div>
    </template>
</section>
<?php else: ?>
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-stone-100 mb-5">
            <i class="fas fa-images text-3xl text-stone-300"></i>
        </div>
        <p class="text-base font-medium text-stone-600">Belum ada foto galeri</p>
        <p class="text-sm text-stone-400 mt-1">Galeri foto akan segera hadir.</p>
    </div>
</section>
<?php endif; ?>

<?php echo $__env->make('components.footer-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<script>
function galleryLightbox() {
    return {
        open: false,
        current: 0,
        items: [],
        touchX: 0,

        get currentItem() {
            return this.items[this.current] || null;
        },

        init(data) {
            this.items = data;
        },

        openLightbox(index) {
            this.current = index;
            this.open = true;
        },

        closeLightbox() {
            this.open = false;
        },

        prev() {
            if (this.items.length < 2) return;
            this.current = this.current === 0 ? this.items.length - 1 : this.current - 1;
        },

        next() {
            if (this.items.length < 2) return;
            this.current = this.current === this.items.length - 1 ? 0 : this.current + 1;
        },

        touchStart(e) {
            this.touchX = e.changedTouches[0].screenX;
        },

        touchEnd(e) {
            const diff = this.touchX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) this.next();
                else this.prev();
            }
        }
    }
}
</script>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views/frontend/galeri.blade.php ENDPATH**/ ?>