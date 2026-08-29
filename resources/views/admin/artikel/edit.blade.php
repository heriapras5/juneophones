@extends('layouts.admin')

@section('title', 'Edit Artikel')
@section('subtitle', 'Edit artikel blog')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-pen"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Edit Artikel</h3>
                <p class="text-xs text-stone-400">Perbarui konten artikel</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.artikel.update', $artikel->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Judul Artikel <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" required max="255"
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                </div>

                <div class="grid sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Kategori</label>
                        <input type="text" name="kategori" value="{{ old('kategori', $artikel->kategori) }}" max="100"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Penulis</label>
                        <input type="text" name="penulis" value="{{ old('penulis', $artikel->penulis) }}" max="100"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Tanggal Publikasi</label>
                        <input type="date" name="tgl_publikasi" value="{{ old('tgl_publikasi', $artikel->tgl_publikasi ?? date('Y-m-d')) }}"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Thumbnail / Foto</label>
                        <div id="artikelEditPreviewContainer" class="mb-3 {{ $artikel->foto ? '' : 'hidden' }}">
                            <div class="relative inline-block">
                                <img id="artikelEditPreview" src="{{ $artikel->foto ? asset('storage/' . $artikel->foto) : '' }}" class="h-24 w-auto rounded-xl object-contain border border-stone-200 bg-stone-50 p-1 shadow-sm">
                                <button type="button" onclick="document.getElementById('artikelEditPreviewContainer').classList.add('hidden'); document.getElementById('delete_foto').value='1'" class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-black/50 text-white hover:bg-black/70 flex items-center justify-center text-[10px] transition-all"><i class="fas fa-times"></i></button>
                            </div>
                            <input type="hidden" name="delete_foto" id="delete_foto" value="">
                        </div>
                        <input type="file" name="foto" accept="image/jpg,image/jpeg,image/png,image/webp" onchange="previewEdit(event)"
                               class="w-full text-sm text-stone-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 transition-colors file:cursor-pointer cursor-pointer">
                        <p class="text-xs text-stone-400 mt-1.5">Format: JPG/PNG/WEBP. Maks 2MB</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Status</label>
                        <div class="flex items-center gap-6 pt-2">
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="status" value="draft" {{ $artikel->status == 'draft' ? 'checked' : '' }}
                                       class="w-4 h-4 border-stone-300 text-stone-500 focus:ring-stone-500/30">
                                <span class="text-sm text-stone-700">Draft</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer">
                                <input type="radio" name="status" value="publish" {{ $artikel->status == 'publish' ? 'checked' : '' }}
                                       class="w-4 h-4 border-stone-300 text-amber-500 focus:ring-amber-500/30">
                                <span class="text-sm text-stone-700">Publish</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Konten <span class="text-rose-500">*</span></label>
                    <textarea name="konten" id="summernote" rows="16" required
                              class="w-full px-4 py-3 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all font-mono leading-relaxed">{{ old('konten', $artikel->konten) }}</textarea>
                </div>

                <div class="flex items-center gap-6 pt-2">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="aktif" value="1" {{ $artikel->aktif ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-stone-300 text-amber-500 focus:ring-amber-500/30">
                        <span class="text-sm text-stone-700 font-medium">Aktif</span>
                    </label>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <button type="submit"
                            class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.artikel.index') }}" class="text-sm text-stone-500 hover:text-stone-700 transition-colors px-4 py-2.5">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
function previewEdit(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('artikelEditPreview').src = ev.target.result;
            document.getElementById('artikelEditPreviewContainer').classList.remove('hidden');
            document.getElementById('delete_foto').value = '';
        };
        reader.readAsDataURL(file);
    }
}
</script>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#summernote').summernote({
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['codeview', 'help']]
        ]
    });
});
</script>
@endpush
@endsection