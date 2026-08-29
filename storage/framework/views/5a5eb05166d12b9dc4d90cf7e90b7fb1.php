<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('subtitle', 'Overview panel admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto">
<!-- Visitor Analytics -->
<div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
    <?php
        $cards = [
            ['icon' => 'fa-users', 'label' => 'Hari Ini', 'count' => $visitor['hari_ini'], 'desc' => 'pengunjung unik', 'color' => 'from-amber-50 to-orange-50', 'text' => 'text-amber-600'],
            ['icon' => 'fa-calendar-week', 'label' => 'Minggu Ini', 'count' => $visitor['minggu_ini'], 'desc' => '7 hari terakhir', 'color' => 'from-sky-50 to-blue-50', 'text' => 'text-sky-600'],
            ['icon' => 'fa-calendar-alt', 'label' => 'Bulan Ini', 'count' => $visitor['bulan_ini'], 'desc' => '30 hari terakhir', 'color' => 'from-violet-50 to-purple-50', 'text' => 'text-violet-600'],
            ['icon' => 'fa-calendar', 'label' => 'Tahun Ini', 'count' => $visitor['tahun_ini'], 'desc' => '365 hari terakhir', 'color' => 'from-emerald-50 to-green-50', 'text' => 'text-emerald-600'],
            ['icon' => 'fa-chart-line', 'label' => 'Total Kunjungan', 'count' => $visitor['total'], 'desc' => 'semua halaman', 'color' => 'from-rose-50 to-pink-50', 'text' => 'text-rose-600'],
        ];
    ?>
    <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-5 group">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 rounded-2xl bg-gradient-to-br <?php echo e($c['color']); ?> flex items-center justify-center <?php echo e($c['text']); ?> group-hover:scale-110 transition-transform duration-300">
                <i class="fas <?php echo e($c['icon']); ?>"></i>
            </div>
            <?php if($c['count'] > 0): ?>
            <span class="flex items-center gap-1 text-[10px] font-semibold <?php echo e($loop->first ? 'text-amber-600' : 'text-stone-400'); ?> bg-stone-50 px-2 py-0.5 rounded-full border border-stone-200/50">
                <i class="fas fa-arrow-up text-[8px]"></i>
                <span>aktif</span>
            </span>
            <?php endif; ?>
        </div>
        <p class="text-[10px] text-stone-400 uppercase tracking-wider font-semibold"><?php echo e($c['label']); ?></p>
        <p class="text-2xl font-bold text-stone-900 font-display mt-1"><?php echo e(number_format($c['count'])); ?></p>
        <p class="text-xs text-stone-400 mt-0.5"><?php echo e($c['desc']); ?></p>
        <div class="mt-3 h-1 rounded-full bg-stone-100 overflow-hidden">
            <div class="h-full rounded-full bg-gradient-to-r <?php echo e($c['color']); ?>" style="width: <?php echo e(min(100, ($c['count'] / max(1, $visitor['total'])) * 100)); ?>%"></div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Chart -->
<div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 mb-8">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
            <i class="fas fa-chart-line text-sm"></i>
        </div>
        <div>
            <h3 class="text-sm font-semibold text-stone-900 font-display">Kunjungan 30 Hari Terakhir</h3>
            <p class="text-xs text-stone-400">Grafik tren pengunjung unik per hari</p>
        </div>
    </div>
    <div class="relative" style="height: 280px;">
        <canvas id="visitorChart"></canvas>
    </div>
</div>

<!-- Content Stats -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
    <a href="<?php echo e(route('admin.hero.index')); ?>" class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-4 card-hover group">
        <div class="flex items-center justify-between mb-2">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-image text-sm"></i>
            </div>
            <span class="text-[10px] font-semibold text-stone-400 bg-stone-50 px-2 py-0.5 rounded-full border border-stone-200/50"><?php echo e($stats['hero']); ?></span>
        </div>
        <h3 class="text-xs font-semibold text-stone-900">Hero</h3>
    </a>

    <a href="<?php echo e(route('admin.artikel.index')); ?>" class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-4 card-hover group">
        <div class="flex items-center justify-between mb-2">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-sky-50 to-blue-50 flex items-center justify-center text-sky-600 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-newspaper text-sm"></i>
            </div>
            <span class="text-[10px] font-semibold text-stone-400 bg-stone-50 px-2 py-0.5 rounded-full border border-stone-200/50"><?php echo e($stats['artikel']); ?></span>
        </div>
        <h3 class="text-xs font-semibold text-stone-900">Blog</h3>
    </a>

    <a href="<?php echo e(route('admin.galeri.index')); ?>" class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-4 card-hover group">
        <div class="flex items-center justify-between mb-2">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-violet-50 to-purple-50 flex items-center justify-center text-violet-600 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-images text-sm"></i>
            </div>
            <span class="text-[10px] font-semibold text-stone-400 bg-stone-50 px-2 py-0.5 rounded-full border border-stone-200/50"><?php echo e($stats['galeri']); ?></span>
        </div>
        <h3 class="text-xs font-semibold text-stone-900">Galeri</h3>
    </a>

    <a href="<?php echo e(route('admin.layanan.index')); ?>" class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-4 card-hover group">
        <div class="flex items-center justify-between mb-2">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-50 to-green-50 flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-tools text-sm"></i>
            </div>
            <span class="text-[10px] font-semibold text-stone-400 bg-stone-50 px-2 py-0.5 rounded-full border border-stone-200/50"><?php echo e($stats['layanan']); ?></span>
        </div>
        <h3 class="text-xs font-semibold text-stone-900">Layanan</h3>
    </a>

    <a href="<?php echo e(route('admin.faq.index')); ?>" class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-4 card-hover group">
        <div class="flex items-center justify-between mb-2">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-rose-50 to-pink-50 flex items-center justify-center text-rose-600 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-question-circle text-sm"></i>
            </div>
            <span class="text-[10px] font-semibold text-stone-400 bg-stone-50 px-2 py-0.5 rounded-full border border-stone-200/50"><?php echo e($stats['faq']); ?></span>
        </div>
        <h3 class="text-xs font-semibold text-stone-900">FAQ</h3>
    </a>

    <a href="<?php echo e(route('admin.settings.edit')); ?>" class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-4 card-hover group">
        <div class="flex items-center justify-between mb-2">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-stone-50 to-stone-100 flex items-center justify-center text-stone-600 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-cog text-sm"></i>
            </div>
            <span class="text-[10px] font-semibold text-stone-400 bg-stone-50 px-2 py-0.5 rounded-full border border-stone-200/50"><?php echo e($stats['about']); ?></span>
        </div>
        <h3 class="text-xs font-semibold text-stone-900">Pengaturan</h3>
    </a>
</div>

<!-- Info -->
<div class="grid lg:grid-cols-2 gap-6">
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-chart-simple text-sm"></i>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-stone-900 font-display">Ringkasan Konten</h3>
                <p class="text-xs text-stone-400">Seluruh konten website</p>
            </div>
        </div>
        <div class="space-y-2">
            <div class="flex items-center justify-between py-2 px-3 rounded-xl bg-stone-50">
                <span class="text-sm text-stone-600">Total Layanan</span>
                <span class="text-sm font-semibold text-stone-900"><?php echo e($stats['layanan']); ?></span>
            </div>
            <div class="flex items-center justify-between py-2 px-3 rounded-xl bg-stone-50">
                <span class="text-sm text-stone-600">Total FAQ</span>
                <span class="text-sm font-semibold text-stone-900"><?php echo e($stats['faq']); ?></span>
            </div>
            <div class="flex items-center justify-between py-2 px-3 rounded-xl bg-stone-50">
                <span class="text-sm text-stone-600">Total Artikel</span>
                <span class="text-sm font-semibold text-stone-900"><?php echo e($stats['artikel']); ?></span>
            </div>
            <div class="flex items-center justify-between py-2 px-3 rounded-xl bg-stone-50">
                <span class="text-sm text-stone-600">Total Foto Galeri</span>
                <span class="text-sm font-semibold text-stone-900"><?php echo e($stats['galeri']); ?></span>
            </div>
        </div>
    </div>

    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-info-circle text-sm"></i>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-stone-900 font-display">Informasi</h3>
                <p class="text-xs text-stone-400">Detail website</p>
            </div>
        </div>
        <div class="space-y-3">
            <div class="flex items-center justify-between py-2 px-3 rounded-xl bg-stone-50">
                <span class="text-sm text-stone-600">Website</span>
                <a href="<?php echo e(url('/')); ?>" target="_blank" class="text-sm font-medium text-amber-600 hover:text-amber-700 transition-colors"><?php echo e(url('/')); ?></a>
            </div>
            <div class="flex items-center justify-between py-2 px-3 rounded-xl bg-stone-50">
                <span class="text-sm text-stone-600">Status</span>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200/50">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Online
                </span>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('visitorChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 280);
    gradient.addColorStop(0, 'rgba(251, 191, 36, 0.35)');
    gradient.addColorStop(0.5, 'rgba(251, 191, 36, 0.12)');
    gradient.addColorStop(1, 'rgba(251, 191, 36, 0.01)');

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
                pointRadius: 3,
                pointHoverRadius: 6,
                pointHoverBackgroundColor: '#f97316',
                pointHoverBorderColor: '#fff',
                pointHoverBorderWidth: 2.5,
                tension: 0.35,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index',
            },
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
                    ticks: {
                        stepSize: 1,
                        color: '#a8a29e',
                        font: { size: 11 },
                    },
                    grid: { color: 'rgba(168, 162, 158, 0.1)' }
                },
                x: {
                    ticks: {
                        color: '#a8a29e',
                        font: { size: 10 },
                        maxRotation: 45,
                        maxTicksLimit: 15,
                    },
                    grid: { display: false }
                }
            }
        }
    });
});
</script>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>