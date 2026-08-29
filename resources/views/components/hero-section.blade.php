@php $totalHeroes = $heroes->count(); @endphp

<section class="relative min-h-[75vh] sm:min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950"
         x-data="{ current: 0, total: {{ $totalHeroes }} }"
         x-init="if(total > 1) setInterval(() => { current = (current + 1) % total }, 5000)">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="absolute inset-0 hero-glow-2"></div>

    @if($totalHeroes > 0)
    <div class="absolute inset-0">
        @foreach($heroes as $i => $slide)
        <div x-show="current === {{ $i }}"
             x-transition:enter="transition-all duration-700"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition-all duration-700"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="absolute inset-0">
            @if($slide->gambar_bg)
            <img src="{{ asset('storage/' . $slide->gambar_bg) }}" alt="Hero {{ $i + 1 }}" class="w-full h-full object-cover opacity-40">
            @endif
            <div class="absolute inset-0 bg-gradient-to-br from-stone-950/70 via-stone-900/50 to-stone-950/70"></div>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Animated Shapes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="hero-shape w-72 h-72 bg-amber-500/5 rounded-full blur-3xl animate-floatSlow" style="top: 15%; left: 10%;"></div>
        <div class="hero-shape w-96 h-96 bg-orange-500/5 rounded-full blur-3xl animate-float" style="bottom: 10%; right: 5%; animation-delay: 1s;"></div>
        <div class="hero-shape w-48 h-48 bg-amber-400/5 rounded-full blur-3xl animate-floatSlow" style="top: 40%; right: 20%; animation-delay: 2s;"></div>
        <div class="absolute w-4 h-4 bg-amber-500/20 rounded-full animate-float" style="top: 25%; left: 15%; animation-delay: 0.5s;"></div>
        <div class="absolute w-3 h-3 bg-amber-400/20 rotate-45 animate-floatSlow" style="top: 35%; right: 12%; animation-delay: 1.5s;"></div>
        <div class="absolute w-5 h-5 bg-orange-500/15 rounded-full animate-float" style="bottom: 30%; left: 8%; animation-delay: 2.5s;"></div>
        <div class="absolute w-3 h-3 bg-amber-300/20 animate-floatSlow" style="bottom: 20%; right: 25%; animation-delay: 0.8s;"></div>
        <div class="absolute w-6 h-6 border border-amber-400/10 rotate-45 animate-spinSlow" style="top: 15%; right: 30%;"></div>
        <div class="absolute w-4 h-4 border border-amber-500/10 rounded-full animate-spinSlow" style="bottom: 35%; left: 20%; animation-delay: 3s;"></div>
    </div>

    @if($totalHeroes > 0)
    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto w-full min-h-[320px] sm:min-h-[360px] flex flex-col items-center justify-center">
        @foreach($heroes as $i => $slide)
        <div x-show="current === {{ $i }}"
             x-transition:enter="transition-opacity duration-500"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 flex flex-col items-center justify-center px-4">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-semibold uppercase tracking-wider mb-6 backdrop-blur-sm">
                <i class="fas fa-certificate text-[10px]"></i> {{ $slide->badge ?? 'Service HP' }}
            </div>
            <h1 class="font-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-[1.1] mb-3">
                {{ $slide->judul ?? 'Juneo Phone' }}
            </h1>
            @if($slide->subjudul ?? null)
            <p class="text-white/90 text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold mb-3">
                {{ $slide->subjudul }}
            </p>
            @endif
            @if($slide->tagline ?? null)
            <p class="text-amber-200/90 text-sm sm:text-base md:text-lg font-medium drop-shadow-lg max-w-2xl mx-auto mb-8 leading-relaxed">
                {{ $slide->tagline }}
            </p>
            @endif
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                @if($settings['whatsapp'] ?? null)
                <a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank"
                   class="btn-primary text-base py-3 sm:py-4 px-6 sm:px-8 shadow-2xl shadow-amber-500/30">
                    <i class="fab fa-whatsapp text-xl"></i>
                    {{ $slide->cta_text ?? 'Hubungi Kami via WhatsApp' }}
                </a>
                @endif
                <a href="{{ route('kontak') }}"
                   class="btn-outline text-base py-3 sm:py-4 px-6 sm:px-8">
                    <i class="fas fa-store-alt"></i>
                    Kunjungi Toko
                    <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
        @endforeach

        @if($totalHeroes > 1)
        <div class="flex items-center justify-center gap-2 mt-10">
            @foreach($heroes as $i => $slide)
            <button @click="current = {{ $i }}"
                    x-bind:class="current === {{ $i }} ? 'bg-gradient-to-r from-amber-400 to-orange-500 w-8' : 'bg-white/20 w-2'"
                    class="h-2 rounded-full transition-all duration-300"></button>
            @endforeach
        </div>
        @endif
    </div>
    @else
    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto min-h-[320px] sm:min-h-[360px] flex flex-col items-center justify-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-semibold uppercase tracking-wider mb-6 backdrop-blur-sm">
            <i class="fas fa-certificate text-[10px]"></i> Service HP
        </div>
        <h1 class="font-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-[1.1] mb-3">
            Juneo Phone
        </h1>
        <p class="text-white/90 text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold mb-3">
            Service Hp Android &amp; iPhone
        </p>
        <p class="text-amber-200/90 text-sm sm:text-base md:text-lg font-medium drop-shadow-lg max-w-2xl mx-auto mb-8 leading-relaxed">
            Ahlinya service handphone — cepat, bergaransi, dan harga bersahabat.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            @if($settings['whatsapp'] ?? null)
            <a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank"
               class="btn-primary text-base py-3 sm:py-4 px-6 sm:px-8 shadow-2xl shadow-amber-500/30">
                <i class="fab fa-whatsapp text-xl"></i> Hubungi Kami via WhatsApp
            </a>
            @endif
                <a href="{{ route('kontak') }}" class="btn-outline text-base py-3 sm:py-4 px-6 sm:px-8">
                    <i class="fas fa-store-alt"></i> Kunjungi Toko <i class="fas fa-arrow-right text-sm"></i>
                </a>
        </div>
    </div>
    @endif

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounceGentle">
        <a href="#after-hero" class="text-stone-500 hover:text-amber-400 transition-colors">
            <i class="fas fa-chevron-down text-lg"></i>
        </a>
    </div>
    <span id="after-hero" class="absolute bottom-0"></span>
</section>
