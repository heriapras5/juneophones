<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['icon', 'label', 'title', 'subtitle', 'page' => '']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['icon', 'label', 'title', 'subtitle', 'page' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    if ($page) {
        $allHeaders = json_decode(\App\Models\Setting::getValue('pageheaders', '{}'), true);
        $pageData = $allHeaders[$page] ?? [];
        if (isset($pageData['title']) && $pageData['title']) $title = $pageData['title'];
        if (isset($pageData['subtitle']) && $pageData['subtitle']) $subtitle = $pageData['subtitle'];
    }
?>

<section class="relative pt-28 pb-16 md:pt-36 md:pb-24 bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 overflow-hidden">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="absolute inset-0 hero-glow-2"></div>
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-80 h-80 md:w-96 md:h-96 bg-amber-500/5 rounded-full blur-3xl animate-floatSlow" style="top: -20%; left: -10%;"></div>
        <div class="absolute w-72 h-72 md:w-80 md:h-80 bg-orange-500/5 rounded-full blur-3xl animate-float" style="bottom: -10%; right: -5%; animation-delay: 1s;"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-semibold uppercase tracking-wider mb-5 md:mb-6 backdrop-blur-sm">
            <i class="fas fa-<?php echo e($icon); ?>"></i>
            <span><?php echo e($label); ?></span>
        </div>
        <h1 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold text-white leading-[1.15] mb-3 md:mb-4"><?php echo e($title); ?></h1>
        <p class="text-stone-400 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed"><?php echo e($subtitle); ?></p>
    </div>
</section>
<?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views/components/page-header.blade.php ENDPATH**/ ?>