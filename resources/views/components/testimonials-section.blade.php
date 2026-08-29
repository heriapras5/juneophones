<section class="relative py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-intersect="$el.classList.add('section-visible')" class="section-hidden text-center max-w-2xl mx-auto mb-14">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-orange-500 rounded-full"></div>
                <span class="text-xs font-semibold text-stone-400 uppercase tracking-[0.2em]">Testimoni</span>
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-orange-500 rounded-full"></div>
            </div>
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-stone-900 mb-4">Apa Kata Pelanggan</h2>
            <p class="text-stone-500 text-base lg:text-lg">Kepercayaan mereka adalah motivasi kami untuk terus berkembang.</p>
        </div>

        @if($testimonials->count() > 0)
        <div x-data="{ current: 0 }" x-init="setInterval(() => { current = (current + 1) % {{ $testimonials->count() }} }, 5000)" class="relative max-w-4xl mx-auto">
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-out"
                     x-bind:style="'transform: translateX(-' + (current * 100) + '%)'">
                    @foreach($testimonials as $testimonial)
                    <div class="w-full flex-shrink-0 px-4">
                        <div class="bg-gradient-to-br from-stone-50 to-white rounded-2xl p-8 lg:p-10 text-center border border-stone-100 shadow-sm">
                            <div class="w-16 h-16 rounded-full mx-auto mb-5 overflow-hidden ring-4 ring-amber-400/20 shadow-lg shadow-amber-500/10 bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center">
                                @if($testimonial->foto)
                                <img src="{{ asset('storage/' . $testimonial->foto) }}" alt="{{ $testimonial->nama }}" class="w-full h-full object-cover">
                                @else
                                <i class="fas fa-user text-2xl text-amber-500"></i>
                                @endif
                            </div>
                            <div class="flex items-center justify-center gap-1 mb-4">
                                @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star {{ $i < ($testimonial->rating ?? 5) ? 'text-amber-400' : 'text-stone-200' }} text-sm"></i>
                                @endfor
                            </div>
                            <div class="relative">
                                <i class="fas fa-quote-left absolute -top-2 -left-2 text-amber-200 text-2xl"></i>
                                <p class="text-stone-600 text-base lg:text-lg leading-relaxed italic px-6">"{{ $testimonial->kutipan }}"</p>
                            </div>
                            <div class="mt-6 pt-4 border-t border-stone-100">
                                <p class="font-semibold text-stone-900">{{ $testimonial->nama }}</p>
                                @if($testimonial->jabatan)
                                <p class="text-sm text-stone-400">{{ $testimonial->jabatan }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            @if($testimonials->count() > 1)
            <button @click="current = current > 0 ? current - 1 : {{ $testimonials->count() - 1 }}"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 lg:-translate-x-8 w-12 h-12 rounded-full bg-white border border-stone-200 shadow-lg flex items-center justify-center text-stone-500 hover:text-amber-600 hover:border-amber-500/30 hover:shadow-xl transition-all duration-200">
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button @click="current = current < {{ $testimonials->count() - 1 }} ? current + 1 : 0"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 lg:translate-x-8 w-12 h-12 rounded-full bg-white border border-stone-200 shadow-lg flex items-center justify-center text-stone-500 hover:text-amber-600 hover:border-amber-500/30 hover:shadow-xl transition-all duration-200">
                <i class="fas fa-chevron-right text-sm"></i>
            </button>

            <div class="flex items-center justify-center gap-2 mt-8">
                @foreach($testimonials as $index => $testimonial)
                <button @click="current = {{ $index }}"
                        x-bind:class="current === {{ $index }} ? 'bg-gradient-to-r from-amber-400 to-orange-500 w-8' : 'bg-stone-300 w-2'"
                        class="h-2 rounded-full transition-all duration-300"></button>
                @endforeach
            </div>
            @endif
        </div>
        @else
        <div class="text-center py-12 text-stone-400">
            <i class="fas fa-comment text-4xl mb-3"></i>
            <p>Belum ada testimoni.</p>
        </div>
        @endif
    </div>
</section>
