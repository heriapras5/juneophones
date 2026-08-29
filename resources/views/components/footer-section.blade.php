<footer class="relative bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950 border-t border-amber-500/10">
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 sm:gap-10">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-3 mb-4">
                    @if($settings['logo'] ?? false)
                    <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Juneo Phone" class="logo-img-3d">
                    @else
                    <div class="logo-gold-3d">
                        <span class="text-sm">J</span>
                    </div>
                    @endif
                    <span class="font-display font-bold text-white text-lg">Juneo Phone</span>
                </a>
                <p class="text-stone-400 text-sm leading-relaxed">Ahlinya Service HP Android &amp; iPhone. Solusi terpercaya untuk perbaikan handphone Anda.</p>
            </div>

            <div>
                <h4 class="font-display font-bold text-white text-sm uppercase tracking-wider mb-4">Navigasi</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('home') }}" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>Beranda</a></li>
                    <li><a href="{{ route('tentang') }}" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>Tentang Kami</a></li>
                    <li><a href="{{ route('blog') }}" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>Blog</a></li>
                    <li><a href="{{ route('galeri') }}" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>Galeri</a></li>
                    <li><a href="{{ route('faq') }}" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>FAQ</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-stone-400 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-stone-600 shrink-0"></span>Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-bold text-white text-sm uppercase tracking-wider mb-4">Ikuti Kami</h4>
                @php $sosialMedia = $settings['sosial_media'] ?? []; @endphp
                <div class="flex items-center gap-2.5 mb-4">
                    @if(!empty($sosialMedia))
                        @foreach($sosialMedia as $sm)
                        <a href="{{ $sm['url'] ?? '#' }}" target="_blank"
                           class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-stone-400 hover:text-amber-400 hover:border-amber-500/30 hover:bg-amber-500/10 transition-all duration-200">
                            <i class="{{ $sm['icon'] ?? 'fas fa-globe' }}"></i>
                        </a>
                        @endforeach
                    @else
                        <a href="{{ route('kontak') }}" class="text-stone-500 hover:text-amber-400 text-sm transition-colors flex items-center gap-2"><i class="fas fa-plus-circle text-xs"></i> Hubungi kami</a>
                    @endif
                </div>
                <div class="bg-white/5 rounded-xl p-3 sm:p-4 border border-white/5">
                    <p class="text-[10px] text-stone-500 uppercase tracking-wider mb-2">Jam Operasional</p>
                    @php
                        $jam = $settings['jam_operasional'] ?? 'Sen–Kam: 09:00–18:00, Jum: Libur, Sab: 09:00–16:00';
                        $parts = explode(',', $jam);
                    @endphp
                    <div class="space-y-1 text-xs sm:text-sm text-stone-300">
                        @foreach($parts as $p)
                        @php $trimmed = trim($p); $isLibur = str_contains($trimmed, 'Libur'); @endphp
                        <div class="flex justify-between items-center gap-2 {{ $isLibur ? 'text-rose-400' : '' }}">
                            <span class="shrink-0">{{ Str::before($trimmed, ':') }}</span>
                            <span class="font-medium {{ $isLibur ? '' : 'text-stone-100' }} text-right">{{ trim(Str::after($trimmed, ':')) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 sm:mt-10 pt-6 sm:pt-8 border-t border-white/5 flex flex-col items-center text-center gap-3">
            <p class="text-stone-500 text-xs sm:text-sm">&copy; 2026 Juneo Phone Service. All rights reserved.</p>
            <a href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" class="text-stone-500 hover:text-amber-400 text-xs sm:text-sm transition-colors flex items-center gap-2">
                <i class="fas fa-arrow-up text-xs"></i> Kembali ke atas
            </a>
        </div>
    </div>
</footer>
