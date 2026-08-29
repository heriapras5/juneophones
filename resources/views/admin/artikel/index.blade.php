@extends('layouts.admin')

@section('title', 'Artikel / Blog')
@section('subtitle', 'Kelola artikel blog')

@section('content')
<div class="max-w-7xl mx-auto">
<!-- Header + Search/Filter -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <p class="text-sm text-stone-500">Total: <span class="font-semibold text-stone-900">{{ $artikels->total() }}</span> artikel</p>
    <a href="{{ route('admin.artikel.create') }}"
       class="btn-primary text-sm py-2.5 px-5 shadow-lg shadow-amber-500/25">
        <i class="fas fa-plus mr-2"></i> Tambah Artikel
    </a>
</div>

<form method="GET" action="{{ route('admin.artikel.index') }}" class="flex flex-wrap items-center gap-3 mb-6">
    <div class="relative flex-1 min-w-[200px]">
        <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
        <input type="text" name="search" placeholder="Cari judul artikel..." value="{{ request('search') }}"
               class="w-full pl-9 pr-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
    </div>
    <select name="status" class="px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
        <option value="">Semua Status</option>
        <option value="publish" {{ request('status') === 'publish' ? 'selected' : '' }}>Publish</option>
        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
    </select>
    <select name="kategori" class="px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
        <option value="">Semua Kategori</option>
        @foreach($kategoriList as $k)
        <option value="{{ $k }}" {{ request('kategori') === $k ? 'selected' : '' }}>{{ $k }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn-primary text-sm py-2.5 px-5 shadow-lg shadow-amber-500/25">
        <i class="fas fa-search mr-2"></i> Cari
    </button>
    @if(request('search') || request('status') || request('kategori'))
    <a href="{{ route('admin.artikel.index') }}" class="text-sm text-stone-500 hover:text-stone-700 px-4 py-2.5 transition-colors">
        <i class="fas fa-undo mr-1"></i> Reset
    </a>
    @endif
</form>

<!-- Table -->
<div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-stone-50">
                    <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Thumbnail</th>
                    <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Judul</th>
                    <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Kategori</th>
                    <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Status</th>
                    <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Tanggal</th>
                    <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @forelse($artikels as $item)
                <tr class="hover:bg-stone-50/50 transition-colors">
                    <td class="px-5 py-4">
                        @if($item->foto)
                        <div class="w-16 h-12 rounded-lg overflow-hidden border border-stone-200 shadow-sm">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-16 h-12 rounded-lg bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-400">
                            <i class="fas fa-newspaper text-sm"></i>
                        </div>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <p class="text-sm font-medium text-stone-900 max-w-xs truncate">{{ $item->judul }}</p>
                        <p class="text-xs text-stone-400 mt-0.5">oleh {{ $item->penulis ?? 'Admin' }}</p>
                    </td>
                    <td class="px-5 py-4">
                        @if($item->kategori)
                        <span class="inline-flex px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-medium border border-amber-200/50">{{ $item->kategori }}</span>
                        @else
                        <span class="text-stone-400 text-xs">-</span>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium {{ $item->status === 'publish' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/50' : 'bg-stone-100 text-stone-500 border border-stone-200/50' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $item->status === 'publish' ? 'bg-emerald-500' : 'bg-stone-400' }}"></span>
                                {{ $item->status === 'publish' ? 'Publish' : 'Draft' }}
                            </span>
                            @if(!$item->aktif)
                            <span class="inline-flex px-2 py-0.5 rounded bg-rose-50 text-rose-500 text-[10px] font-medium border border-rose-200/50">Nonaktif</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-stone-500">{{ $item->tgl_publikasi ? \Carbon\Carbon::parse($item->tgl_publikasi)->format('d M Y') : '-' }}</td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('blog.detail', $item->slug) }}" target="_blank"
                               class="p-2 rounded-lg text-stone-400 hover:text-blue-600 hover:bg-blue-50 transition-all">
                                <i class="fas fa-external-link-alt text-sm"></i>
                            </a>
                            <a href="{{ route('admin.artikel.edit', $item->id) }}"
                               class="p-2 rounded-lg text-stone-400 hover:text-amber-600 hover:bg-amber-50 transition-all">
                                <i class="fas fa-pen text-sm"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.artikel.destroy', $item->id) }}" class="inline">
                                @csrf @method('DELETE')
                                <button type="button"
                                        @click.prevent="confirm.message = 'Hapus artikel ini?'; confirm.action = () => $el.closest('form').submit(); confirm.show = true"
                                        class="p-2 rounded-lg text-stone-400 hover:text-rose-600 hover:bg-rose-50 transition-all">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-16 text-center text-stone-400">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-stone-100 mb-4">
                            <i class="fas fa-newspaper text-2xl text-stone-300"></i>
                        </div>
                        <p class="text-sm font-medium text-stone-600">Belum ada artikel</p>
                        <p class="text-xs text-stone-400 mt-1">Klik "Tambah Artikel" untuk menulis artikel pertama.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($artikels->hasPages())
<div class="mt-4">{{ $artikels->links() }}</div>
@endif
</div>
@endsection