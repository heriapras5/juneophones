<?php $__env->startSection('meta_title', 'Blog — Tips & Edukasi Service HP Juneo Phone'); ?>
<?php $__env->startSection('meta_desc', 'Temukan tips, trik, dan edukasi seputar perawatan HP Android & iPhone dari Juneo Phone Service.'); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-header','data' => ['page' => 'blog','icon' => 'newspaper','label' => 'Blog','title' => 'Tips & Edukasi HP','subtitle' => 'Dapatkan informasi terbaru seputar perawatan, tips, dan trik HP Android & iPhone.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => 'blog','icon' => 'newspaper','label' => 'Blog','title' => 'Tips & Edukasi HP','subtitle' => 'Dapatkan informasi terbaru seputar perawatan, tips, dan trik HP Android & iPhone.']); ?>
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

<?php if($featured): ?>
<section class="relative -mt-10 z-20 max-w-7xl mx-auto px-4 mb-12">
    <a href="<?php echo e(route('blog.detail', $featured->slug)); ?>" class="block group">
        <div class="relative bg-white rounded-2xl shadow-xl border border-stone-200/60 overflow-hidden card-hover">
            <div class="grid md:grid-cols-5">
                <div class="md:col-span-3 relative h-64 md:h-full min-h-[280px] bg-stone-100 overflow-hidden">
                    <?php if($featured->foto): ?>
                    <img src="<?php echo e(asset('storage/' . $featured->foto)); ?>" alt="<?php echo e($featured->judul); ?>"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-50 to-orange-50">
                        <i class="fas fa-newspaper text-6xl text-amber-300"></i>
                    </div>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent md:hidden"></div>
                </div>
                <div class="md:col-span-2 p-6 lg:p-8 flex flex-col justify-center">
                    <?php if($featured->kategori): ?>
                    <span class="inline-flex self-start px-3 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-medium border border-amber-200/50 mb-3"><?php echo e($featured->kategori); ?></span>
                    <?php endif; ?>
                    <h2 class="font-display text-xl lg:text-2xl font-bold text-stone-900 mb-3 group-hover:text-amber-600 transition-colors"><?php echo e($featured->judul); ?></h2>
                    <p class="text-stone-500 text-sm leading-relaxed mb-4"><?php echo e(Str::limit(strip_tags($featured->konten), 200)); ?></p>
                    <div class="flex items-center gap-3 text-xs text-stone-400 mt-auto">
                        <span class="flex items-center gap-1.5"><i class="fas fa-user text-amber-400"></i> <?php echo e($featured->penulis ?? 'Admin'); ?></span>
                        <span class="w-1 h-1 rounded-full bg-stone-300"></span>
                        <span class="flex items-center gap-1.5"><i class="fas fa-calendar text-amber-400"></i> <?php echo e(\Carbon\Carbon::parse($featured->tgl_publikasi ?? $featured->created_at)->format('d M Y')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</section>

<!-- Blog Grid + Sidebar -->
<section class="pb-20 lg:pb-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-4 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-3">
                <?php if($kategoriList->count() > 0): ?>
                <div class="flex flex-wrap items-center gap-2 mb-8">
                    <a href="<?php echo e(route('blog')); ?>"
                       class="px-4 py-2 rounded-xl text-xs font-medium transition-all duration-200 <?php echo e(!request('kategori') ? 'bg-gradient-to-r from-amber-400 to-orange-500 text-white shadow-lg shadow-amber-500/20' : 'bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-600'); ?>">
                        Semua
                    </a>
                    <?php $__currentLoopData = $kategoriList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('blog', ['kategori' => $k])); ?>"
                       class="px-4 py-2 rounded-xl text-xs font-medium transition-all duration-200 <?php echo e(request('kategori') == $k ? 'bg-gradient-to-r from-amber-400 to-orange-500 text-white shadow-lg shadow-amber-500/20' : 'bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-600'); ?>">
                        <?php echo e($k); ?>

                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

                <?php if($artikels->count() > 0): ?>
                <div class="grid sm:grid-cols-2 gap-6">
                    <?php $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('blog.detail', $item->slug)); ?>" class="group">
                        <div class="bg-white rounded-2xl border border-stone-200/60 overflow-hidden shadow-sm card-hover h-full flex flex-col">
                            <div class="relative h-48 bg-stone-100 overflow-hidden">
                                <?php if($item->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="<?php echo e($item->judul); ?>"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-50 to-orange-50">
                                    <i class="fas fa-newspaper text-4xl text-amber-300"></i>
                                </div>
                                <?php endif; ?>
                                <?php if($item->kategori): ?>
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-white/90 backdrop-blur-sm text-amber-700 text-[10px] font-medium border border-amber-200/50 shadow-sm"><?php echo e($item->kategori); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="p-5 flex-1 flex flex-col">
                                <h3 class="font-display font-semibold text-stone-900 text-sm lg:text-base mb-2 group-hover:text-amber-600 transition-colors line-clamp-2"><?php echo e($item->judul); ?></h3>
                                <p class="text-xs text-stone-500 leading-relaxed mb-4 line-clamp-2 flex-1"><?php echo e(Str::limit(strip_tags($item->konten), 120)); ?></p>
                                <div class="flex items-center gap-2 text-[10px] text-stone-400 pt-3 border-t border-stone-100">
                                    <span class="flex items-center gap-1"><i class="fas fa-user text-amber-400"></i> <?php echo e($item->penulis ?? 'Admin'); ?></span>
                                    <span class="w-1 h-1 rounded-full bg-stone-300"></span>
                                    <span class="flex items-center gap-1"><i class="fas fa-calendar text-amber-400"></i> <?php echo e(\Carbon\Carbon::parse($item->tgl_publikasi ?? $item->created_at)->format('d M Y')); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-10">
                    <?php echo e($artikels->appends(request()->query())->links()); ?>

                </div>
                <?php else: ?>
                <div class="text-center py-20 text-stone-400">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-stone-100 mb-5">
                        <i class="fas fa-newspaper text-3xl text-stone-300"></i>
                    </div>
                    <p class="text-base font-medium text-stone-600">Tidak ada artikel</p>
                    <p class="text-sm text-stone-400 mt-1">Belum ada artikel di kategori ini.</p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 mt-8 lg:mt-0 space-y-6">
                <div class="bg-white rounded-2xl border border-stone-200/60 p-5 shadow-sm">
                    <h4 class="font-display font-bold text-stone-900 text-sm uppercase tracking-wider mb-4">Artikel Terbaru</h4>
                    <div class="space-y-3">
                        <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('blog.detail', $rp->slug)); ?>" class="flex items-start gap-3 group">
                            <div class="w-12 h-12 rounded-xl overflow-hidden shrink-0 bg-stone-100">
                                <?php if($rp->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $rp->foto)); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-amber-300">
                                    <i class="fas fa-newspaper text-sm"></i>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-medium text-stone-900 group-hover:text-amber-600 transition-colors line-clamp-2"><?php echo e($rp->judul); ?></p>
                                <p class="text-[10px] text-stone-400 mt-0.5"><?php echo e(\Carbon\Carbon::parse($rp->tgl_publikasi ?? $rp->created_at)->format('d M Y')); ?></p>
                            </div>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-100/60 p-5 shadow-sm">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white text-xs">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <h4 class="font-display font-bold text-stone-900 text-sm">Konsultasi Gratis</h4>
                    </div>
                    <p class="text-xs text-stone-500 leading-relaxed mb-4">Punya masalah dengan HP? Tanyakan langsung ke teknisi kami via WhatsApp.</p>
                    <?php if($settings['whatsapp'] ?? null): ?>
                    <a href="https://wa.me/<?php echo e($settings['whatsapp']); ?>?text=Halo%20Juneo%20Phone%2C%20saya%20ingin%20konsultasi%20tentang%20masalah%20HP." target="_blank"
                       class="btn-primary text-xs py-2.5 px-4 w-full justify-center shadow-lg shadow-amber-500/25">
                        <i class="fab fa-whatsapp"></i> Chat WhatsApp
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-stone-100 mb-5">
            <i class="fas fa-newspaper text-3xl text-stone-300"></i>
        </div>
        <p class="text-base font-medium text-stone-600">Belum ada artikel</p>
        <p class="text-sm text-stone-400 mt-1">Artikel akan sehadir segera. Nantikan tips & edukasi menarik dari kami!</p>
    </div>
</section>
<?php endif; ?>

<?php echo $__env->make('components.footer-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\frontend\blog.blade.php ENDPATH**/ ?>