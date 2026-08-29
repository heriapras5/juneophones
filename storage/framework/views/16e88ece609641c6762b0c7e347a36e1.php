<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('subtitle', 'Overview panel admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Welcome Card -->
    <div x-data="{ time: '', date: '' }" x-init="function updateClock() { const n = new Date(); time = n.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }); date = n.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }); }; updateClock(); setInterval(updateClock, 1000)"
         class="bg-gradient-to-br from-stone-900 via-stone-800 to-stone-900 rounded-2xl p-6 lg:p-8 shadow-lg border border-white/5">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-stone-400 text-sm">Selamat datang kembali,</p>
                <h2 class="font-display text-2xl lg:text-3xl font-bold text-white mt-1"><?php echo e(Auth::user()->name ?? 'Admin'); ?></h2>
                <div class="flex items-center gap-4 mt-3 text-xs text-stone-500">
                    <span x-text="date" class="hidden sm:inline"></span>
                    <span class="inline-flex items-center gap-1.5 text-emerald-400">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span x-text="time"></span>
                    </span>
                </div>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white text-xl shadow-lg shadow-amber-500/20 shrink-0">
                <i class="fas fa-store"></i>
            </div>
        </div>
    </div>

    <!-- Visitor Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <?php
            $visitorCards = [
                ['icon' => 'fa-users', 'label' => 'Hari Ini', 'count' => $visitor['hari_ini'], 'desc' => 'pengunjung unik', 'from' => 'from-amber-500', 'to' => 'to-orange-500', 'bg' => 'bg-amber-50', 'text' => 'text-amber-600', 'badge' => 'bg-amber-100 text-amber-700'],
                ['icon' => 'fa-calendar-week', 'label' => 'Minggu Ini', 'count' => $visitor['minggu_ini'], 'desc' => '7 hari terakhir', 'from' => 'from-sky-500', 'to' => 'to-blue-500', 'bg' => 'bg-sky-50', 'text' => 'text-sky-600', 'badge' => 'bg-sky-100 text-sky-700'],
                ['icon' => 'fa-calendar-alt', 'label' => 'Bulan Ini', 'count' => $visitor['bulan_ini'], 'desc' => '30 hari terakhir', 'from' => 'from-violet-500', 'to' => 'to-purple-500', 'bg' => 'bg-violet-50', 'text' => 'text-violet-600', 'badge' => 'bg-violet-100 text-violet-700'],
                ['icon' => 'fa-calendar', 'label' => 'Tahun Ini', 'count' => $visitor['tahun_ini'], 'desc' => '365 hari terakhir', 'from' => 'from-emerald-500', 'to' => 'to-green-500', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'badge' => 'bg-emerald-100 text-emerald-700'],
                ['icon' => 'fa-chart-line', 'label' => 'Total', 'count' => $visitor['total'], 'desc' => 'semua kunjungan', 'from' => 'from-rose-500', 'to' => 'to-pink-500', 'bg' => 'bg-rose-50', 'text' => 'text-rose-600', 'badge' => 'bg-rose-100 text-rose-700'],
            ];
        ?>
        <?php $__currentLoopData = $visitorCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div x-intersect="$el.classList.add('animate-fadeIn')" class="opacity-0 bg-white border border-stone-200/60 rounded-2xl shadow-sm p-5 group hover:shadow-lg hover:border-stone-300/60 transition-all duration-300" style="transition-delay: <?php echo e($loop->index * 80); ?>ms">
            <div class="flex items-center justify-between mb-4">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-br <?php echo e($c['from']); ?>/10 <?php echo e($c['to']); ?>/5 flex items-center justify-center <?php echo e($c['text']); ?> group-hover:scale-110 transition-transform duration-300">
                    <i class="fas <?php echo e($c['icon']); ?>"></i>
                </div>
                <?php if($c['count'] > 0): ?>
                <span class="text-[10px] font-semibold <?php echo e($c['badge']); ?> px-2 py-0.5 rounded-full flex items-center gap-1">
                    <i class="fas fa-arrow-up text-[8px]"></i>
                    <span><?php echo e(number_format($c['count'])); ?></span>
                </span>
                <?php endif; ?>
            </div>
            <p class="text-[10px] text-stone-400 uppercase tracking-wider font-semibold"><?php echo e($c['label']); ?></p>
            <p class="text-2xl font-bold text-stone-900 font-display mt-1"><?php echo e(number_format($c['count'])); ?></p>
            <p class="text-xs text-stone-400 mt-0.5"><?php echo e($c['desc']); ?></p>
            <div class="mt-3 h-1.5 rounded-full bg-stone-100 overflow-hidden">
                <div class="h-full rounded-full bg-gradient-to-r <?php echo e($c['from']); ?> <?php echo e($c['to']); ?>" style="width: <?php echo e(min(100, max(2, ($c['count'] / max(1, $visitor['total'])) * 100))); ?>%"></div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Chart Row -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Chart -->
        <div x-intersect="$el.classList.add('animate-fadeIn')" class="opacity-0 lg:col-span-2 bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                        <i class="fas fa-chart-line text-sm"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-stone-900 font-display">Kunjungan 30 Hari</h3>
                        <p class="text-xs text-stone-400">Tren pengunjung unik per hari</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 text-xs text-stone-400">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                    <span>Unik</span>
                </div>
            </div>
            <div class="relative" style="height: 260px;">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>

        <!-- Quick Summary -->
        <div x-intersect="$el.classList.add('animate-fadeIn')" class="opacity-0 bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6" style="transition-delay: 100ms">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                    <i class="fas fa-bolt text-sm"></i>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-stone-900 font-display">Ringkasan</h3>
                    <p class="text-xs text-stone-400">Overview singkat</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="p-3 rounded-xl bg-amber-50 border border-amber-100/50">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-xs text-stone-500">Hero Slide</span>
                        <span class="text-sm font-bold text-stone-900 font-display"><?php echo e($stats['hero']); ?></span>
                    </div>
                    <div class="h-1.5 rounded-full bg-amber-200/50 overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r from-amber-400 to-orange-500" style="width: <?php echo e(min(100, $stats['hero'] * 20)); ?>%"></div>
                    </div>
                </div>
                <div class="p-3 rounded-xl bg-sky-50 border border-sky-100/50">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-xs text-stone-500">Layanan</span>
                        <span class="text-sm font-bold text-stone-900 font-display"><?php echo e($stats['layanan']); ?></span>
                    </div>
                    <div class="h-1.5 rounded-full bg-sky-200/50 overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r from-sky-400 to-blue-500" style="width: <?php echo e(min(100, $stats['layanan'] * 20)); ?>%"></div>
                    </div>
                </div>
                <div class="p-3 rounded-xl bg-violet-50 border border-violet-100/50">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-xs text-stone-500">FAQ</span>
                        <span class="text-sm font-bold text-stone-900 font-display"><?php echo e($stats['faq']); ?></span>
                    </div>
                    <div class="h-1.5 rounded-full bg-violet-200/50 overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r from-violet-400 to-purple-500" style="width: <?php echo e(min(100, $stats['faq'] * 20)); ?>%"></div>
                    </div>
                </div>
                <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-100/50">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-xs text-stone-500">Artikel</span>
                        <span class="text-sm font-bold text-stone-900 font-display"><?php echo e($stats['artikel']); ?></span>
                    </div>
                    <div class="h-1.5 rounded-full bg-emerald-200/50 overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r from-emerald-400 to-green-500" style="width: <?php echo e(min(100, $stats['artikel'] * 20)); ?>%"></div>
                    </div>
                </div>
                <div class="p-3 rounded-xl bg-rose-50 border border-rose-100/50">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-xs text-stone-500">Galeri</span>
                        <span class="text-sm font-bold text-stone-900 font-display"><?php echo e($stats['galeri']); ?></span>
                    </div>
                    <div class="h-1.5 rounded-full bg-rose-200/50 overflow-hidden">
                        <div class="h-full rounded-full bg-gradient-to-r from-rose-400 to-pink-500" style="width: <?php echo e(min(100, $stats['galeri'] * 20)); ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Shortcuts -->
    <div x-intersect="$el.classList.add('animate-slideUp')" class="opacity-0">
        <div class="flex items-center gap-3 mb-5">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-layer-group text-sm"></i>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-stone-900 font-display">Akses Cepat</h3>
                <p class="text-xs text-stone-400">Menu konten website</p>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            <?php
                $shortcuts = [
                    ['route' => 'admin.hero.index', 'icon' => 'fa-image', 'label' => 'Hero', 'color' => 'from-amber-500/10 to-orange-500/5', 'text' => 'text-amber-600', 'count' => $stats['hero']],
                    ['route' => 'admin.artikel.index', 'icon' => 'fa-newspaper', 'label' => 'Blog', 'color' => 'from-sky-500/10 to-blue-500/5', 'text' => 'text-sky-600', 'count' => $stats['artikel']],
                    ['route' => 'admin.galeri.index', 'icon' => 'fa-images', 'label' => 'Galeri', 'color' => 'from-violet-500/10 to-purple-500/5', 'text' => 'text-violet-600', 'count' => $stats['galeri']],
                    ['route' => 'admin.layanan.index', 'icon' => 'fa-tools', 'label' => 'Layanan', 'color' => 'from-emerald-500/10 to-green-500/5', 'text' => 'text-emerald-600', 'count' => $stats['layanan']],
                    ['route' => 'admin.faq.index', 'icon' => 'fa-question-circle', 'label' => 'FAQ', 'color' => 'from-rose-500/10 to-pink-500/5', 'text' => 'text-rose-600', 'count' => $stats['faq']],
                    ['route' => 'admin.settings.edit', 'icon' => 'fa-cog', 'label' => 'Pengaturan', 'color' => 'from-stone-500/10 to-stone-400/5', 'text' => 'text-stone-600', 'count' => $stats['about']],
                ];
            ?>
            <?php $__currentLoopData = $shortcuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route($s['route'])); ?>" class="group bg-white border border-stone-200/60 rounded-xl p-4 hover:shadow-lg hover:border-stone-300/60 transition-all duration-300">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br <?php echo e($s['color']); ?> flex items-center justify-center <?php echo e($s['text']); ?> group-hover:scale-110 transition-transform duration-300">
                        <i class="fas <?php echo e($s['icon']); ?> text-sm"></i>
                    </div>
                    <span class="text-xs font-semibold text-stone-400 bg-stone-50 px-2 py-0.5 rounded-full border border-stone-200/50"><?php echo e($s['count']); ?></span>
                </div>
                <h4 class="text-xs font-semibold text-stone-900"><?php echo e($s['label']); ?></h4>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Info Footer -->
    <div x-intersect="$el.classList.add('animate-fadeIn')" class="opacity-0 bg-white border border-stone-200/60 rounded-2xl shadow-sm p-5">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0">
                    <i class="fas fa-globe text-sm"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-stone-900">Juneo Phone</p>
                    <div class="flex items-center gap-3 mt-0.5">
                        <a href="<?php echo e(url('/')); ?>" target="_blank" class="text-xs text-amber-600 hover:text-amber-700 transition-colors"><?php echo e(url('/')); ?></a>
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/50">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Online
                        </span>
                    </div>
                </div>
            </div>
            <?php if($settings['whatsapp'] ?? null): ?>
            <a href="https://wa.me/<?php echo e($settings['whatsapp']); ?>" target="_blank" class="inline-flex items-center gap-2 text-xs font-medium text-emerald-600 bg-emerald-50 hover:bg-emerald-100 px-4 py-2 rounded-xl transition-all border border-emerald-200/50">
                <i class="fab fa-whatsapp"></i> <span><?php echo e($settings['whatsapp']); ?></span>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('visitorChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 260);
    gradient.addColorStop(0, 'rgba(251, 191, 36, 0.4)');
    gradient.addColorStop(0.4, 'rgba(251, 191, 36, 0.12)');
    gradient.addColorStop(1, 'rgba(251, 191, 36, 0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode(array_column($chart, 'date')); ?>,
            datasets: [{
                label: 'Pengunjung Unik',
                data: <?php echo json_encode(array_column($chart, 'count')); ?>,
                backgroundColor: gradient,
                borderColor: '#f59e0b',
                borderWidth: 2.5,
                pointBackgroundColor: '#fbbf24',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 2,
                pointHoverRadius: 6,
                pointHoverBackgroundColor: '#f97316',
                pointHoverBorderColor: '#fff',
                pointHoverBorderWidth: 2.5,
                tension: 0.4,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: { duration: 800, easing: 'easeOutQuart' },
            interaction: { intersect: false, mode: 'index' },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#292524',
                    titleColor: '#fbbf24',
                    bodyColor: '#fff',
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1, color: '#a8a29e', font: { size: 11 } },
                    grid: { color: 'rgba(168, 162, 158, 0.08)' }
                },
                x: {
                    ticks: { color: '#a8a29e', font: { size: 9 }, maxRotation: 40, maxTicksLimit: 12 },
                    grid: { display: false }
                }
            }
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>