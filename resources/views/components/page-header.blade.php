@props(['icon', 'label', 'title', 'subtitle', 'page' => ''])

@php
    if ($page) {
        $allHeaders = json_decode(\App\Models\Setting::getValue('pageheaders', '{}'), true);
        $pageData = $allHeaders[$page] ?? [];
        if (isset($pageData['title']) && $pageData['title']) $title = $pageData['title'];
        if (isset($pageData['subtitle']) && $pageData['subtitle']) $subtitle = $pageData['subtitle'];
    }
@endphp

<section class="relative pt-28 pb-16 md:pt-36 md:pb-24 bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 overflow-hidden">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="absolute inset-0 hero-glow-2"></div>
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-80 h-80 md:w-96 md:h-96 bg-amber-500/5 rounded-full blur-3xl animate-floatSlow" style="top: -20%; left: -10%;"></div>
        <div class="absolute w-72 h-72 md:w-80 md:h-80 bg-orange-500/5 rounded-full blur-3xl animate-float" style="bottom: -10%; right: -5%; animation-delay: 1s;"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-semibold uppercase tracking-wider mb-5 md:mb-6 backdrop-blur-sm">
            <i class="fas fa-{{ $icon }}"></i>
            <span>{{ $label }}</span>
        </div>
        <h1 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold text-white leading-[1.15] mb-3 md:mb-4">{{ $title }}</h1>
        <p class="text-stone-400 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed">{{ $subtitle }}</p>
    </div>
</section>
