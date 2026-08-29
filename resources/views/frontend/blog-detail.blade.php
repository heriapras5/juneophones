@extends('layouts.frontend')

@section('meta_title', $artikel->judul . ' — Juneo Phone')
@section('meta_desc', Str::limit(strip_tags($artikel->konten), 160))

@section('content')
<!-- Header -->
<section class="relative pt-28 pb-12 bg-gradient-to-br from-stone-950 via-stone-900 to-stone-950">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4">
        <div class="flex items-center gap-2 text-xs text-stone-400 mb-4">
            <a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-[8px] text-stone-600"></i>
            <a href="{{ route('blog') }}" class="hover:text-amber-400 transition-colors">Blog</a>
            <i class="fas fa-chevron-right text-[8px] text-stone-600"></i>
            <span class="text-stone-500 truncate max-w-[200px]">{{ $artikel->judul }}</span>
        </div>
        <div class="max-w-3xl">
            @if($artikel->kategori)
            <span class="inline-flex px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-medium mb-4">{{ $artikel->kategori }}</span>
            @endif
            <h1 class="font-display text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-[1.15]">{{ $artikel->judul }}</h1>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 mt-4 text-sm text-stone-400">
                <span class="flex items-center gap-1.5"><i class="fas fa-user text-amber-400 text-xs"></i> {{ $artikel->penulis ?? 'Admin' }}</span>
                <span class="flex items-center gap-1.5"><i class="fas fa-calendar text-amber-400 text-xs"></i> {{ \Carbon\Carbon::parse($artikel->tgl_publikasi ?? $artikel->created_at)->format('d F Y') }}</span>
                <span class="flex items-center gap-1.5"><i class="fas fa-clock text-amber-400 text-xs"></i> {{ ceil(str_word_count(strip_tags($artikel->konten)) / 200) }} menit baca</span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<article class="py-10 lg:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <!-- Share Sidebar Desktop -->
        <div class="hidden lg:block absolute left-0 top-0 -ml-16">
            <div class="sticky top-24 space-y-3">
                <p class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider text-center mb-3">Bagikan</p>
                <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' - ' . route('blog.detail', $artikel->slug)) }}" target="_blank"
                   class="flex items-center justify-center w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 hover:bg-emerald-100 hover:scale-110 transition-all duration-200">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.detail', $artikel->slug)) }}" target="_blank"
                   class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-50 border border-blue-100 text-blue-600 hover:bg-blue-100 hover:scale-110 transition-all duration-200">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($artikel->judul) }}&url={{ urlencode(route('blog.detail', $artikel->slug)) }}" target="_blank"
                   class="flex items-center justify-center w-10 h-10 rounded-xl bg-stone-50 border border-stone-100 text-stone-600 hover:bg-stone-100 hover:scale-110 transition-all duration-200">
                    <i class="fab fa-twitter"></i>
                </a>
                <button onclick="navigator.clipboard.writeText('{{ route('blog.detail', $artikel->slug) }}'); this.querySelector('i').className = 'fas fa-check'; setTimeout(() => this.querySelector('i').className = 'fas fa-link', 2000);"
                        class="flex items-center justify-center w-10 h-10 rounded-xl bg-stone-50 border border-stone-100 text-stone-500 hover:bg-stone-100 hover:scale-110 transition-all duration-200">
                    <i class="fas fa-link text-xs"></i>
                </button>
            </div>
        </div>

        <div class="lg:pl-8">
            <!-- Featured Image -->
            @if($artikel->foto)
            <div class="mb-8 rounded-2xl overflow-hidden shadow-xl border border-stone-200/60">
                <img src="{{ asset('storage/' . $artikel->foto) }}" alt="{{ $artikel->judul }}" class="w-full max-h-[420px] object-cover">
            </div>
            @endif

            <!-- Content Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-stone-200/60 p-6 sm:p-8 lg:p-12">
                <div class="prose prose-stone max-w-none
                            prose-headings:font-display prose-headings:text-stone-900
                            prose-h2:text-lg sm:prose-h2:text-xl lg:prose-h2:text-2xl prose-h2:mt-6 sm:prose-h2:mt-8 prose-h2:mb-3 sm:prose-h2:mb-4
                            prose-h3:text-base sm:prose-h3:text-lg prose-h3:mt-5 sm:prose-h3:mt-6 prose-h3:mb-2 sm:prose-h3:mb-3
                            prose-p:text-sm sm:prose-p:text-base prose-p:text-stone-600 prose-p:leading-relaxed
                            prose-a:text-amber-600 prose-a:no-underline hover:prose-a:text-amber-700
                            prose-img:rounded-xl sm:prose-img:rounded-2xl prose-img:shadow-lg
                            prose-strong:text-stone-900
                            prose-blockquote:border-amber-400 prose-blockquote:bg-amber-50/50 prose-blockquote:rounded-xl prose-blockquote:py-2 prose-blockquote:px-4 sm:prose-blockquote:px-5
                            prose-ul:space-y-1 prose-li:text-stone-600 prose-li:text-sm sm:prose-li:text-base
                            prose-code:text-amber-700 prose-code:bg-amber-50 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded-lg prose-code:text-xs sm:prose-code:text-sm">
                    {!! $artikel->konten !!}
                </div>
            </div>

            <!-- Mobile Share -->
            <div class="lg:hidden flex items-center justify-center gap-2 pt-5 mt-6 border-t border-stone-200/60">
                <span class="text-[10px] font-semibold text-stone-400 uppercase tracking-wider mr-2">Bagikan:</span>
                <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' - ' . route('blog.detail', $artikel->slug)) }}" target="_blank"
                   class="w-9 h-9 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 hover:bg-emerald-100 transition-colors">
                    <i class="fab fa-whatsapp text-xs"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.detail', $artikel->slug)) }}" target="_blank"
                   class="w-9 h-9 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 hover:bg-blue-100 transition-colors">
                    <i class="fab fa-facebook-f text-xs"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($artikel->judul) }}&url={{ urlencode(route('blog.detail', $artikel->slug)) }}" target="_blank"
                   class="w-9 h-9 rounded-xl bg-stone-50 border border-stone-100 flex items-center justify-center text-stone-600 hover:bg-stone-100 transition-colors">
                    <i class="fab fa-twitter text-xs"></i>
                </a>
            </div>

            <!-- CTA -->
            @if($settings['whatsapp'] ?? null)
            <div class="mt-6 sm:mt-8 bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-100/60 p-6 sm:p-8 text-center">
                <h3 class="font-display font-bold text-stone-900 text-base sm:text-lg mb-2">Punya Pertanyaan?</h3>
                <p class="text-sm text-stone-500 mb-4">Konsultasi gratis dengan teknisi kami via WhatsApp.</p>
                <a href="https://wa.me/{{ $settings['whatsapp'] }}?text=Halo%20Juneo%20Phone%2C%20saya%20mau%20bertanya%20tentang%20{{ urlencode($artikel->judul) }}." target="_blank"
                   class="btn-primary text-sm py-3 px-8 shadow-lg shadow-amber-500/25">
                    <i class="fab fa-whatsapp"></i> Tanya via WhatsApp
                </a>
            </div>
            @endif
        </div>
    </div>
</article>

<!-- Divider -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <hr class="border-stone-200">
</div>

<!-- Related Posts -->
@if($recentPosts->count() > 0)
<section class="py-12 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 sm:mb-10">
            <h2 class="font-display text-xl sm:text-2xl lg:text-3xl font-bold text-stone-900">Artikel Lainnya</h2>
            <p class="text-stone-500 text-sm sm:text-base mt-2">Baca juga artikel menarik lainnya dari kami.</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">
            @foreach($recentPosts as $rp)
            <a href="{{ route('blog.detail', $rp->slug) }}" class="group">
                <div class="bg-white rounded-xl sm:rounded-2xl border border-stone-200/60 overflow-hidden shadow-sm card-hover h-full flex flex-col">
                    <div class="aspect-[4/3] bg-stone-100 overflow-hidden">
                        @if($rp->foto)
                        <img src="{{ asset('storage/' . $rp->foto) }}" alt="{{ $rp->judul }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-50 to-orange-50">
                            <i class="fas fa-newspaper text-2xl sm:text-3xl text-amber-300"></i>
                        </div>
                        @endif
                    </div>
                    <div class="p-3 sm:p-4 flex flex-col flex-1">
                        <p class="text-xs sm:text-sm font-semibold text-stone-900 group-hover:text-amber-600 transition-colors line-clamp-2 leading-snug">{{ $rp->judul }}</p>
                        <p class="text-[10px] sm:text-xs text-stone-500 mt-1 sm:mt-2 line-clamp-2 flex-1">{{ Str::limit(strip_tags($rp->konten), 80) }}</p>
                        <p class="text-[10px] text-stone-400 mt-1.5 sm:mt-2">{{ \Carbon\Carbon::parse($rp->tgl_publikasi ?? $rp->created_at)->format('d M Y') }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@include('components.footer-section')
@endsection
