@extends('layouts.frontend')

@section('meta_title', 'Blog — Tips & Edukasi Service HP Juneo Phone')
@section('meta_desc', 'Temukan tips, trik, dan edukasi seputar perawatan HP Android & iPhone dari Juneo Phone Service.')

@section('content')
<x-page-header page="blog" icon="newspaper" label="Blog" title="Tips & Edukasi HP" subtitle="Dapatkan informasi terbaru seputar perawatan, tips, dan trik HP Android & iPhone." />

@if($featured)
<section class="relative -mt-10 z-20 max-w-7xl mx-auto px-4 mb-12">
    <a href="{{ route('blog.detail', $featured->slug) }}" class="block group">
        <div class="relative bg-white rounded-2xl shadow-xl border border-stone-200/60 overflow-hidden card-hover">
            <div class="grid md:grid-cols-5">
                <div class="md:col-span-3 relative h-64 md:h-full min-h-[280px] bg-stone-100 overflow-hidden">
                    @if($featured->foto)
                    <img src="{{ asset('storage/' . $featured->foto) }}" alt="{{ $featured->judul }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-50 to-orange-50">
                        <i class="fas fa-newspaper text-6xl text-amber-300"></i>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent md:hidden"></div>
                </div>
                <div class="md:col-span-2 p-6 lg:p-8 flex flex-col justify-center">
                    @if($featured->kategori)
                    <span class="inline-flex self-start px-3 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-medium border border-amber-200/50 mb-3">{{ $featured->kategori }}</span>
                    @endif
                    <h2 class="font-display text-xl lg:text-2xl font-bold text-stone-900 mb-3 group-hover:text-amber-600 transition-colors">{{ $featured->judul }}</h2>
                    <p class="text-stone-500 text-sm leading-relaxed mb-4">{{ Str::limit(strip_tags($featured->konten), 200) }}</p>
                    <div class="flex items-center gap-3 text-xs text-stone-400 mt-auto">
                        <span class="flex items-center gap-1.5"><i class="fas fa-user text-amber-400"></i> {{ $featured->penulis ?? 'Admin' }}</span>
                        <span class="w-1 h-1 rounded-full bg-stone-300"></span>
                        <span class="flex items-center gap-1.5"><i class="fas fa-calendar text-amber-400"></i> {{ \Carbon\Carbon::parse($featured->tgl_publikasi ?? $featured->created_at)->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</section>

<!-- Blog Grid + Sidebar -->
<section class="pb-20 lg:pb-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-4 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-3">
                @if($kategoriList->count() > 0)
                <div class="flex flex-wrap items-center gap-2 mb-8">
                    <a href="{{ route('blog') }}"
                       class="px-4 py-2 rounded-xl text-xs font-medium transition-all duration-200 {{ !request('kategori') ? 'bg-gradient-to-r from-amber-400 to-orange-500 text-white shadow-lg shadow-amber-500/20' : 'bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-600' }}">
                        Semua
                    </a>
                    @foreach($kategoriList as $k)
                    <a href="{{ route('blog', ['kategori' => $k]) }}"
                       class="px-4 py-2 rounded-xl text-xs font-medium transition-all duration-200 {{ request('kategori') == $k ? 'bg-gradient-to-r from-amber-400 to-orange-500 text-white shadow-lg shadow-amber-500/20' : 'bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-600' }}">
                        {{ $k }}
                    </a>
                    @endforeach
                </div>
                @endif

                @if($artikels->count() > 0)
                <div class="grid sm:grid-cols-2 gap-6">
                    @foreach($artikels as $item)
                    <a href="{{ route('blog.detail', $item->slug) }}" class="group">
                        <div class="bg-white rounded-2xl border border-stone-200/60 overflow-hidden shadow-sm card-hover h-full flex flex-col">
                            <div class="relative h-48 bg-stone-100 overflow-hidden">
                                @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-50 to-orange-50">
                                    <i class="fas fa-newspaper text-4xl text-amber-300"></i>
                                </div>
                                @endif
                                @if($item->kategori)
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-white/90 backdrop-blur-sm text-amber-700 text-[10px] font-medium border border-amber-200/50 shadow-sm">{{ $item->kategori }}</span>
                                @endif
                            </div>
                            <div class="p-5 flex-1 flex flex-col">
                                <h3 class="font-display font-semibold text-stone-900 text-sm lg:text-base mb-2 group-hover:text-amber-600 transition-colors line-clamp-2">{{ $item->judul }}</h3>
                                <p class="text-xs text-stone-500 leading-relaxed mb-4 line-clamp-2 flex-1">{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                                <div class="flex items-center gap-2 text-[10px] text-stone-400 pt-3 border-t border-stone-100">
                                    <span class="flex items-center gap-1"><i class="fas fa-user text-amber-400"></i> {{ $item->penulis ?? 'Admin' }}</span>
                                    <span class="w-1 h-1 rounded-full bg-stone-300"></span>
                                    <span class="flex items-center gap-1"><i class="fas fa-calendar text-amber-400"></i> {{ \Carbon\Carbon::parse($item->tgl_publikasi ?? $item->created_at)->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $artikels->appends(request()->query())->links() }}
                </div>
                @else
                <div class="text-center py-20 text-stone-400">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-stone-100 mb-5">
                        <i class="fas fa-newspaper text-3xl text-stone-300"></i>
                    </div>
                    <p class="text-base font-medium text-stone-600">Tidak ada artikel</p>
                    <p class="text-sm text-stone-400 mt-1">Belum ada artikel di kategori ini.</p>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 mt-8 lg:mt-0 space-y-6">
                <div class="bg-white rounded-2xl border border-stone-200/60 p-5 shadow-sm">
                    <h4 class="font-display font-bold text-stone-900 text-sm uppercase tracking-wider mb-4">Artikel Terbaru</h4>
                    <div class="space-y-3">
                        @foreach($recentPosts as $rp)
                        <a href="{{ route('blog.detail', $rp->slug) }}" class="flex items-start gap-3 group">
                            <div class="w-12 h-12 rounded-xl overflow-hidden shrink-0 bg-stone-100">
                                @if($rp->foto)
                                <img src="{{ asset('storage/' . $rp->foto) }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full flex items-center justify-center text-amber-300">
                                    <i class="fas fa-newspaper text-sm"></i>
                                </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-medium text-stone-900 group-hover:text-amber-600 transition-colors line-clamp-2">{{ $rp->judul }}</p>
                                <p class="text-[10px] text-stone-400 mt-0.5">{{ \Carbon\Carbon::parse($rp->tgl_publikasi ?? $rp->created_at)->format('d M Y') }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-100/60 p-5 shadow-sm">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white text-xs">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <h4 class="font-display font-bold text-stone-900 text-sm">Konsultasi Gratis</h4>
                    </div>
                    <p class="text-xs text-stone-500 leading-relaxed mb-4">Punya masalah dengan HP? Tanyakan langsung ke teknisi kami via WhatsApp.</p>
                    @if($settings['whatsapp'] ?? null)
                    <a href="https://wa.me/{{ $settings['whatsapp'] }}?text=Halo%20Juneo%20Phone%2C%20saya%20ingin%20konsultasi%20tentang%20masalah%20HP." target="_blank"
                       class="btn-primary text-xs py-2.5 px-4 w-full justify-center shadow-lg shadow-amber-500/25">
                        <i class="fab fa-whatsapp"></i> Chat WhatsApp
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-stone-100 mb-5">
            <i class="fas fa-newspaper text-3xl text-stone-300"></i>
        </div>
        <p class="text-base font-medium text-stone-600">Belum ada artikel</p>
        <p class="text-sm text-stone-400 mt-1">Artikel akan sehadir segera. Nantikan tips & edukasi menarik dari kami!</p>
    </div>
</section>
@endif

@include('components.footer-section')
@endsection
