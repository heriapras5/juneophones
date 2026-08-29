<?php $__env->startSection('title', 'Hero'); ?>
<?php $__env->startSection('subtitle', 'Kelola slide hero'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto">
<div x-data="heroModal()">
    <!-- Header + Search/Filter -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <p class="text-sm text-stone-500">Total: <span class="font-semibold text-stone-900"><?php echo e($heroes->total()); ?></span> slide</p>
        <button @click="openModal()"
                class="btn-primary text-sm py-2.5 px-5 shadow-lg shadow-amber-500/25">
            <i class="fas fa-plus mr-2"></i> Tambah Slide
        </button>
    </div>

    <form method="GET" action="<?php echo e(route('admin.hero.index')); ?>" class="flex flex-wrap items-center gap-3 mb-6">
        <div class="relative flex-1 min-w-[200px]">
            <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-stone-400 text-xs"></i>
            <input type="text" name="search" placeholder="Cari judul, subjudul..." value="<?php echo e(request('search')); ?>"
                   class="w-full pl-9 pr-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
        </div>
        <select name="status" class="px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
            <option value="">Semua Status</option>
            <option value="1" <?php echo e(request('status') === '1' ? 'selected' : ''); ?>>Aktif</option>
            <option value="0" <?php echo e(request('status') === '0' ? 'selected' : ''); ?>>Nonaktif</option>
        </select>
        <button type="submit" class="btn-primary text-sm py-2.5 px-5 shadow-lg shadow-amber-500/25">
            <i class="fas fa-search mr-2"></i> Cari
        </button>
        <?php if(request('search') || request('status') !== null): ?>
        <a href="<?php echo e(route('admin.hero.index')); ?>" class="text-sm text-stone-500 hover:text-stone-700 px-4 py-2.5 transition-colors">
            <i class="fas fa-undo mr-1"></i> Reset
        </a>
        <?php endif; ?>
    </form>

    <!-- Table -->
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-stone-50">
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Urutan</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Gambar</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Badge</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Judul</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Subjudul</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Tagline</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-left">Status</th>
                        <th class="px-5 py-3.5 text-xs font-semibold text-stone-500 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    <?php $__empty_1 = true; $__currentLoopData = $heroes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-stone-50/50 transition-colors">
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-stone-100 text-xs font-semibold text-stone-600"><?php echo e($item->urutan); ?></span>
                        </td>
                        <td class="px-5 py-4">
                            <?php if($item->gambar_bg): ?>
                            <div class="w-16 h-10 rounded-lg overflow-hidden border border-stone-200 shadow-sm">
                                <img src="<?php echo e(asset('storage/' . $item->gambar_bg)); ?>" class="w-full h-full object-cover">
                            </div>
                            <?php else: ?>
                            <div class="w-16 h-10 rounded-lg bg-stone-100 flex items-center justify-center text-stone-300">
                                <i class="fas fa-image text-sm"></i>
                            </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-5 py-4">
                            <span class="inline-flex px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 text-[10px] font-medium border border-amber-200/50"><?php echo e($item->badge ?? '-'); ?></span>
                        </td>
                        <td class="px-5 py-4 text-sm font-medium text-stone-900 max-w-xs truncate"><?php echo e($item->judul); ?></td>
                        <td class="px-5 py-4 text-sm text-stone-500 max-w-xs truncate"><?php echo e($item->subjudul ?? '-'); ?></td>
                        <td class="px-5 py-4 text-sm text-stone-500 max-w-xs truncate"><?php echo e($item->tagline ?? '-'); ?></td>
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium <?php echo e($item->aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/50' : 'bg-stone-100 text-stone-500 border border-stone-200/50'); ?>">
                                <span class="w-1.5 h-1.5 rounded-full <?php echo e($item->aktif ? 'bg-emerald-500' : 'bg-stone-400'); ?>"></span>
                                <?php echo e($item->aktif ? 'Aktif' : 'Nonaktif'); ?>

                            </span>
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button @click="openModal(<?php echo e($item->toJson()); ?>)"
                                        class="p-2 rounded-lg text-stone-400 hover:text-amber-600 hover:bg-amber-50 transition-all">
                                    <i class="fas fa-pen text-sm"></i>
                                </button>
                                <form method="POST" action="<?php echo e(route('admin.hero.destroy', $item->id)); ?>" class="inline">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="button"
                                            @click.prevent="confirm.message = 'Hapus slide hero ini?'; confirm.action = () => $el.closest('form').submit(); confirm.show = true"
                                            class="p-2 rounded-lg text-stone-400 hover:text-rose-600 hover:bg-rose-50 transition-all">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="px-5 py-16 text-center text-stone-400">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-stone-100 mb-4">
                                <i class="fas fa-image text-2xl text-stone-300"></i>
                            </div>
                            <p class="text-sm font-medium text-stone-600">Belum ada slide hero</p>
                            <p class="text-xs text-stone-400 mt-1">Klik "Tambah Slide" untuk menambahkan slide baru.</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if($heroes->hasPages()): ?>
    <div class="mt-4"><?php echo e($heroes->links()); ?></div>
    <?php endif; ?>

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
                        <i class="fas fa-image"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-900 font-display" x-text="editId ? 'Edit Slide' : 'Tambah Slide'"></h3>
                </div>
                <button @click="open = false" class="text-stone-400 hover:text-stone-600 p-1">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form :action="editId ? '<?php echo e(url('admin/hero')); ?>/' + editId : '<?php echo e(route('admin.hero.store')); ?>'" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <template x-if="editId">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Judul <span class="text-rose-500">*</span></label>
                        <input type="text" x-model="form.judul" name="judul" required max="255"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Subjudul</label>
                        <input type="text" x-model="form.subjudul" name="subjudul" max="255"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Tagline</label>
                        <input type="text" x-model="form.tagline" name="tagline" max="255"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Teks Badge</label>
                        <input type="text" x-model="form.badge" name="badge" max="100" placeholder="Service HP"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Background Image</label>
                        <template x-if="previewUrl">
                        <div class="mb-3">
                            <div class="relative inline-block">
                                <img :src="previewUrl" class="h-32 w-full object-cover rounded-xl border border-stone-200 shadow-sm">
                                <button type="button" @click="previewUrl = null; showClose = false" class="absolute top-2 right-2 w-7 h-7 rounded-full bg-black/50 text-white hover:bg-black/70 flex items-center justify-center text-xs transition-all"><i class="fas fa-times"></i></button>
                            </div>
                            <input type="hidden" name="delete_foto" x-model="deleteFoto">
                        </div>
                        </template>
                        <input type="file" name="gambar_bg" accept="image/jpg,image/jpeg,image/png" @change="handleFileSelect($event)"
                               class="w-full text-sm text-stone-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 transition-colors file:cursor-pointer cursor-pointer">
                        <p class="text-xs text-stone-400 mt-1.5">Format: JPG/PNG. Maks 2MB</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">CTA Text</label>
                            <input type="text" x-model="form.cta_text" name="cta_text" max="100"
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">CTA Link</label>
                            <input type="text" x-model="form.cta_link" name="cta_link" max="255"
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                        </div>
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
function heroModal() {
    return {
        open: false,
        editId: null,
        previewUrl: null,
        showClose: false,
        deleteFoto: '',
        form: { judul: '', subjudul: '', tagline: '', badge: '', cta_text: '', cta_link: '', urutan: 0, aktif: true },
        handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => { this.previewUrl = e.target.result; this.deleteFoto = ''; };
                reader.readAsDataURL(file);
            }
        },
        openModal(data = null) {
            if (data) {
                this.editId = data.id;
                this.previewUrl = data.gambar_bg ? '<?php echo e(asset('storage/')); ?>/' + data.gambar_bg : null;
                this.showClose = !!data.gambar_bg;
                this.deleteFoto = '';
                this.form = {
                    judul: data.judul || '', subjudul: data.subjudul || '', tagline: data.tagline || '',
                    badge: data.badge || '', cta_text: data.cta_text || '', cta_link: data.cta_link || '',
                    urutan: data.urutan || 0, aktif: data.aktif
                };
            } else {
                this.editId = null;
                this.previewUrl = null;
                this.showClose = false;
                this.deleteFoto = '';
                this.form = { judul: '', subjudul: '', tagline: '', badge: '', cta_text: '', cta_link: '', urutan: 0, aktif: true };
            }
            this.open = true;
        }
    }
}
</script>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\admin\hero.blade.php ENDPATH**/ ?>