<section class="relative py-20 lg:py-28 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-intersect="$el.classList.add('section-visible')" class="section-hidden text-center max-w-2xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gradient-to-r from-amber-400/10 to-orange-500/10 border border-amber-500/20 text-amber-600 text-xs font-semibold uppercase tracking-wider mb-4">
                <i class="fas fa-tools"></i>
                <span>Layanan</span>
            </div>
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-stone-900 flex items-center justify-center gap-3 mb-4">
                Layanan Kami
                <span class="w-8 h-1 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full hidden sm:inline-block"></span>
            </h2>
            <p class="text-stone-500 text-base lg:text-lg">Kami melayani berbagai perbaikan HP Android & iPhone dengan teknisi berpengalaman.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
            @forelse($services as $index => $service)
            <div x-intersect="$el.classList.add('section-visible')" class="section-hidden group relative bg-white rounded-2xl border border-stone-200/80 p-5 sm:p-7 card-hover text-center"
                 style="transition-delay: {{ ($index % 6) * 100 }}ms">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-amber-400/5 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="flex flex-col items-center justify-center mb-4 sm:mb-5">
                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shadow-lg shadow-amber-500/20 group-hover:shadow-amber-500/40 group-hover:scale-110 transition-all duration-300">
                            <i class="{{ $service->icon }} text-base sm:text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-sm sm:text-lg font-semibold text-stone-900 mb-2">{{ $service->nama }}</h3>
                    @if($service->deskripsi)
                    <p class="text-xs sm:text-sm text-stone-500 leading-relaxed">{{ $service->deskripsi }}</p>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-stone-400">
                <i class="fas fa-tools text-4xl mb-3"></i>
                <p>Belum ada layanan tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
