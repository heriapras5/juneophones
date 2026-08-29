<section class="relative py-20 lg:py-28 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-intersect="$el.classList.add('section-visible')" class="section-hidden text-center max-w-2xl mx-auto mb-14">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-orange-500 rounded-full"></div>
                <span class="text-xs font-semibold text-stone-400 uppercase tracking-[0.2em]">Kontak</span>
                <div class="w-1 h-6 bg-gradient-to-b from-amber-400 to-orange-500 rounded-full"></div>
            </div>
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-stone-900 mb-4">Lokasi & Kontak</h2>
            <p class="text-stone-500 text-base lg:text-lg">Kunjungi toko kami atau hubungi via kontak di bawah.</p>
        </div>

        <div class="grid lg:grid-cols-5 gap-8 items-start">
            <div x-intersect="$el.classList.add('section-visible')" class="section-hidden lg:col-span-3 rounded-2xl overflow-hidden shadow-xl border border-stone-200 h-[400px]">
                @if($settings['maps_embed'] ?? null)
                <iframe src="{{ $settings['maps_embed'] }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @else
                <div class="w-full h-full bg-gradient-to-br from-stone-100 to-stone-200 flex items-center justify-center">
                    <div class="text-center text-stone-400">
                        <i class="fas fa-map-marked-alt text-5xl mb-3"></i>
                        <p class="text-sm">Google Maps belum dikonfigurasi.</p>
                    </div>
                </div>
                @endif
            </div>

            <div x-intersect="$el.classList.add('section-visible')" class="section-hidden lg:col-span-2 space-y-4" style="transition-delay: 150ms;">
                @if($settings['alamat'] ?? null)
                <div class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-stone-200 shadow-sm card-hover">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-1">Alamat</p>
                        <p class="text-sm text-stone-900">{{ $settings['alamat'] }}</p>
                    </div>
                </div>
                @endif

                @if($settings['telepon'] ?? null)
                <a href="tel:{{ $settings['telepon'] }}" class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-stone-200 shadow-sm card-hover group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0 group-hover:scale-110 transition-transform">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-1">Telepon</p>
                        <p class="text-sm text-stone-900">{{ $settings['telepon'] }}</p>
                    </div>
                </a>
                @endif

                @if($settings['whatsapp'] ?? null)
                <a href="https://wa.me/{{ $settings['whatsapp'] }}" target="_blank" class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-stone-200 shadow-sm card-hover group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-50 to-green-50 flex items-center justify-center text-emerald-600 shrink-0 group-hover:scale-110 transition-transform">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-1">WhatsApp</p>
                        <p class="text-sm text-stone-900">{{ $settings['whatsapp'] }}</p>
                    </div>
                </a>
                @endif

                @if($settings['email'] ?? null)
                <a href="mailto:{{ $settings['email'] }}" class="flex items-start gap-4 bg-white rounded-2xl p-5 border border-stone-200 shadow-sm card-hover group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0 group-hover:scale-110 transition-transform">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-1">Email</p>
                        <p class="text-sm text-stone-900">{{ $settings['email'] }}</p>
                    </div>
                </a>
                @endif

                @if($settings['jam_operasional'] ?? null)
                @php
                    $jamRows = [];
                    $parts = explode(',', $settings['jam_operasional']);
                    foreach ($parts as $p) {
                        $p = trim($p);
                        if (str_contains($p, ':')) {
                            $split = explode(':', $p, 2);
                            $hari = trim($split[0]);
                            $jam = trim($split[1]);
                            if ($hari && $jam) $jamRows[] = ['hari' => $hari, 'jam' => $jam];
                        } else {
                            $jamRows[] = ['hari' => $p, 'jam' => ''];
                        }
                    }
                @endphp
                <div class="bg-white rounded-2xl p-5 border border-stone-200 shadow-sm">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mb-2">Jam Operasional</p>
                            <div class="space-y-1">
                                @foreach($jamRows as $r)
                                <div class="flex items-center justify-between gap-2 text-sm">
                                    <span class="text-stone-500 font-medium whitespace-nowrap">{{ $r['hari'] }}</span>
                                    <span class="text-stone-900 text-right">{{ $r['jam'] ?: '-' }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
