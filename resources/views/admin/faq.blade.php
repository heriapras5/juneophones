@extends('layouts.admin')

@section('title', 'FAQ')
@section('subtitle', 'Kelola pertanyaan umum')

@section('content')
<div class="max-w-7xl mx-auto">
<div x-data="faqModal()">
    <!-- Header + Search/Filter -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <p class="text-sm text-stone-500">Total: <span class="font-semibold text-stone-900">{{ $faqs->total() }}</span> FAQ</p>
        <button @click="openModal()"
                class="btn-primary text-sm py-2.5 px-5 shadow-lg shadow-amber-500/25">
            <i class="fas fa-plus mr-2"></i> Tambah FAQ
        </button>
    </div>

    <form method="GET" action="{{ route('admin.faq.index') }}" class="flex flex-wrap items-center gap-3 mb-6">
        <div class="relative flex-1 min-w-[200px]">
            <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
            <input type="text" name="search" placeholder="Cari pertanyaan..." value="{{ request('search') }}"
                   class="w-full pl-9 pr-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
        </div>
        <select name="status" class="px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
            <option value="">Semua Status</option>
            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Nonaktif</option>
        </select>
        <button type="submit" class="btn-primary text-sm py-2.5 px-5 shadow-lg shadow-amber-500/25">
            <i class="fas fa-search mr-2"></i> Cari
        </button>
        @if(request('search') || request('status') !== null)
        <a href="{{ route('admin.faq.index') }}" class="text-sm text-stone-500 hover:text-stone-700 px-4 py-2.5 transition-colors">
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
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Urutan</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Pertanyaan</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Jawaban</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Status</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($faqs as $item)
                    <tr class="hover:bg-stone-50/50 transition-colors">
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-stone-100 text-xs font-semibold text-stone-600">{{ $item->urutan }}</span>
                        </td>
                        <td class="px-5 py-4 text-sm font-medium text-stone-900 max-w-xs truncate">{{ $item->pertanyaan }}</td>
                        <td class="px-5 py-4 text-sm text-stone-500 max-w-sm truncate">{{ $item->jawaban }}</td>
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium {{ $item->aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/50' : 'bg-stone-100 text-stone-500 border border-stone-200/50' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $item->aktif ? 'bg-emerald-500' : 'bg-stone-400' }}"></span>
                                {{ $item->aktif ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button @click="openModal({{ $item->toJson() }})"
                                        class="p-2 rounded-lg text-stone-400 hover:text-amber-600 hover:bg-amber-50 transition-all">
                                    <i class="fas fa-pen text-sm"></i>
                                </button>
                                <form method="POST" action="{{ route('admin.faq.destroy', $item->id) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="button"
                                            @click.prevent="confirm.message = 'Hapus FAQ ini?'; confirm.action = () => $el.closest('form').submit(); confirm.show = true"
                                            class="p-2 rounded-lg text-stone-400 hover:text-rose-600 hover:bg-rose-50 transition-all">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-5 py-16 text-center text-stone-400">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-stone-100 mb-4">
                                <i class="fas fa-question-circle text-2xl text-stone-300"></i>
                            </div>
                            <p class="text-sm font-medium text-stone-600">Belum ada FAQ</p>
                            <p class="text-xs text-stone-400 mt-1">Klik "Tambah FAQ" untuk menambahkan pertanyaan baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($faqs->hasPages())
    <div class="mt-4">{{ $faqs->links() }}</div>
    @endif

    <!-- Modal -->
    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4"
         @click.away="open = false">
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 lg:p-8 border border-stone-200/60 overflow-y-auto max-h-[85vh]">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-900 font-display" x-text="editId ? 'Edit FAQ' : 'Tambah FAQ'"></h3>
                </div>
                <button @click="open = false" class="text-stone-400 hover:text-stone-600 p-1">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form :action="editId ? '{{ url('admin/faq') }}/' + editId : '{{ route('admin.faq.store') }}'" method="POST">
                @csrf
                <template x-if="editId">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Pertanyaan <span class="text-rose-500">*</span></label>
                        <input type="text" x-model="form.pertanyaan" name="pertanyaan" required
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Jawaban <span class="text-rose-500">*</span></label>
                        <textarea x-model="form.jawaban" name="jawaban" rows="5" required
                                  class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Urutan</label>
                            <input type="number" x-model="form.urutan" name="urutan" min="0"
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                        </div>
                        <div>
                            <label class="flex items-center gap-3 pt-6 cursor-pointer">
                                <input type="checkbox" x-model="form.aktif" name="aktif" value="1"
                                       class="w-4 h-4 rounded border-stone-300 text-amber-500 focus:ring-amber-500/30">
                                <span class="text-sm text-stone-700 font-medium">Aktif</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-6 pt-4 border-t border-stone-100">
                    <button type="submit"
                            class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                    <button type="button" @click="open = false" class="text-sm text-stone-500 hover:text-stone-700 px-4 py-2.5">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function faqModal() {
    return {
        open: false,
        editId: null,
        form: { pertanyaan: '', jawaban: '', urutan: 0, aktif: true },
        openModal(data = null) {
            if (data) {
                this.editId = data.id;
                this.form = { pertanyaan: data.pertanyaan || '', jawaban: data.jawaban || '', urutan: data.urutan || 0, aktif: data.aktif };
            } else {
                this.editId = null;
                this.form = { pertanyaan: '', jawaban: '', urutan: 0, aktif: true };
            }
            this.open = true;
        }
    }
}
</script>
</div>
@endsection