<?php $__env->startSection('title', 'Pengaturan'); ?>
<?php $__env->startSection('subtitle', 'Pengaturan website'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Logo & Favicon -->
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-cog"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Pengaturan Website</h3>
                <p class="text-xs text-stone-400">Logo dan favicon website</p>
            </div>
        </div>

        <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Logo Website</label>
                    <div id="logoPreviewContainer" class="mb-3 inline-block <?php echo e($settings['logo'] ? '' : 'hidden'); ?>">
                        <div class="relative">
                            <img id="logoPreview" src="<?php echo e($settings['logo'] ? asset('storage/' . $settings['logo']) : ''); ?>" class="w-20 h-20 rounded-2xl object-contain ring-4 ring-amber-400/20 border border-stone-200 shadow-sm bg-stone-50 p-1">
                            <button type="button" onclick="document.getElementById('logoPreviewContainer').classList.add('hidden'); document.getElementById('delete_logo').value='1'" class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-black/50 text-white hover:bg-black/70 flex items-center justify-center text-[10px] transition-all"><i class="fas fa-times"></i></button>
                        </div>
                        <input type="hidden" name="delete_logo" id="delete_logo" value="">
                    </div>
                    <input type="file" name="logo" accept="image/jpg,image/jpeg,image/png,image/webp" onchange="previewImage(event, 'logoPreview', 'logoPreviewContainer', 'delete_logo')"
                           class="w-full text-sm text-stone-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 transition-colors file:cursor-pointer cursor-pointer">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Favicon</label>
                    <div id="faviconPreviewContainer" class="mb-3 <?php echo e($settings['favicon'] ? '' : 'hidden'); ?>">
                        <div class="relative inline-block">
                            <img id="faviconPreview" src="<?php echo e($settings['favicon'] ? asset('storage/' . $settings['favicon']) : ''); ?>" class="w-10 h-10 rounded-xl border border-stone-200 shadow-sm">
                            <button type="button" onclick="document.getElementById('faviconPreviewContainer').classList.add('hidden'); document.getElementById('delete_favicon').value='1'" class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-black/50 text-white hover:bg-black/70 flex items-center justify-center text-[10px] transition-all"><i class="fas fa-times"></i></button>
                        </div>
                        <input type="hidden" name="delete_favicon" id="delete_favicon" value="">
                    </div>
                    <input type="file" name="favicon" accept="image/ico,image/png,image/jpg,image/jpeg" onchange="previewImage(event, 'faviconPreview', 'faviconPreviewContainer', 'delete_favicon')"
                           class="w-full text-sm text-stone-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 transition-colors file:cursor-pointer cursor-pointer">
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <button type="submit"
                            class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Sosial Media -->
    <div x-data="{
        items: <?php echo e(json_encode($settings['sosial_media'] ?? [['icon' => '', 'url' => '']])); ?>,
        add() { this.items.push({ icon: '', url: '' }) },
        remove(i) { this.items.splice(i, 1) }
    }" class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-share-alt"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Sosial Media</h3>
                <p class="text-xs text-stone-400">Tautan media sosial yang tampil di website</p>
            </div>
        </div>

        <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-3">
                <template x-for="(item, i) in items" :key="i">
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-stone-50 border border-stone-200/60">
                        <div class="flex-1 grid sm:grid-cols-5 gap-2">
                            <div class="sm:col-span-2">
                                <label class="block text-[10px] font-medium text-stone-400 mb-1">Icon</label>
                                <input type="text" x-model="item.icon" :name="'sosial_media['+i+'][icon]'" placeholder="fab fa-instagram"
                                       class="w-full px-3 py-2 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-xs transition-all font-mono">
                            </div>
                            <div class="sm:col-span-3">
                                <label class="block text-[10px] font-medium text-stone-400 mb-1">URL</label>
                                <input type="text" x-model="item.url" :name="'sosial_media['+i+'][url]'" placeholder="https://instagram.com/..."
                                       class="w-full px-3 py-2 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-xs transition-all">
                            </div>
                        </div>
                        <button type="button" @click="remove(i)" class="mt-5 w-8 h-8 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-400 hover:text-rose-600 flex items-center justify-center transition-all shrink-0">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                </template>
            </div>

            <button type="button" @click="add()" class="mt-3 text-xs font-medium text-amber-600 hover:text-amber-700 bg-amber-50 hover:bg-amber-100 px-4 py-2 rounded-xl transition-all">
                <i class="fas fa-plus mr-1"></i> Tambah Sosial Media
            </button>

            <div class="flex items-center gap-3 pt-4 border-t border-stone-100 mt-4">
                <button type="submit"
                        class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                    <i class="fas fa-save mr-2"></i> Simpan Sosial Media
                </button>
            </div>
        </form>
    </div>

    <!-- Keunggulan -->
    <div x-data="{
        items: <?php echo e(json_encode($settings['keunggulan'] ?? [['icon' => '', 'judul' => '', 'deskripsi' => '']])); ?>,
        add() { this.items.push({ icon: '', judul: '', deskripsi: '' }) },
        remove(i) { this.items.splice(i, 1) }
    }" class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-star"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Keunggulan</h3>
                <p class="text-xs text-stone-400">Card keunggulan yang tampil di halaman Tentang</p>
            </div>
        </div>

        <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-3">
                <template x-for="(item, i) in items" :key="i">
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-stone-50 border border-stone-200/60">
                        <div class="flex-1 space-y-3">
                            <div class="grid sm:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-[10px] font-medium text-stone-400 mb-1">Icon</label>
                                    <input type="text" x-model="item.icon" :name="'keunggulan['+i+'][icon]'" placeholder="fas fa-shield-alt"
                                           class="w-full px-3 py-2 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-xs transition-all font-mono">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block text-[10px] font-medium text-stone-400 mb-1">Judul</label>
                                    <input type="text" x-model="item.judul" :name="'keunggulan['+i+'][judul]'" placeholder="Terpercaya"
                                           class="w-full px-3 py-2 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-xs transition-all">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-medium text-stone-400 mb-1">Deskripsi</label>
                                <textarea x-model="item.deskripsi" :name="'keunggulan['+i+'][deskripsi]'" rows="2" placeholder="Ribuan pelanggan membuktikan..."
                                          class="w-full px-3 py-2 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-xs transition-all"></textarea>
                            </div>
                        </div>
                        <button type="button" @click="remove(i)" class="mt-5 w-8 h-8 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-400 hover:text-rose-600 flex items-center justify-center transition-all shrink-0">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>
                </template>
            </div>

            <button type="button" @click="add()" class="mt-3 text-xs font-medium text-amber-600 hover:text-amber-700 bg-amber-50 hover:bg-amber-100 px-4 py-2 rounded-xl transition-all">
                <i class="fas fa-plus mr-1"></i> Tambah Keunggulan
            </button>

            <div class="flex items-center gap-3 pt-4 border-t border-stone-100 mt-4">
                <button type="submit"
                        class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                    <i class="fas fa-save mr-2"></i> Simpan Keunggulan
                </button>
            </div>
        </form>
    </div>

    <!-- Tentang -->
    <?php $about = \App\Models\About::first() ?? new \App\Models\About(); ?>
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-building"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Tentang Kami</h3>
                <p class="text-xs text-stone-400">Informasi tentang perusahaan yang tampil di website</p>
            </div>
        </div>

        <form method="POST" action="<?php echo e(route('admin.about.update')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Judul</label>
                    <input type="text" name="judul" value="<?php echo e(old('judul', $about->judul)); ?>"
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Deskripsi <span class="text-rose-500">*</span></label>
                    <textarea name="deskripsi" rows="5" required
                              class="w-full px-4 py-2.5 bg-white border <?php echo e($errors->has('deskripsi') ? 'border-rose-400' : 'border-stone-200'); ?> rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"><?php echo e(old('deskripsi', $about->deskripsi)); ?></textarea>
                    <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-rose-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Visi</label>
                        <textarea name="visi" rows="4"
                                  class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"><?php echo e(old('visi', $about->visi)); ?></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Misi</label>
                        <textarea name="misi" rows="4"
                                  class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"><?php echo e(old('misi', $about->misi)); ?></textarea>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Foto Toko</label>
                    <div id="aboutPreviewContainer" class="mb-3 <?php echo e($about->foto ? '' : 'hidden'); ?>">
                        <div class="relative inline-block">
                            <img id="aboutPreview" src="<?php echo e($about->foto ? asset('storage/' . $about->foto) : ''); ?>" class="h-52 w-full object-cover rounded-xl border border-stone-200 shadow-sm">
                            <button type="button" onclick="document.getElementById('aboutPreviewContainer').classList.add('hidden'); document.getElementById('delete_foto').value='1'" class="absolute top-2 right-2 w-7 h-7 rounded-full bg-black/50 text-white hover:bg-black/70 flex items-center justify-center text-xs transition-all"><i class="fas fa-times"></i></button>
                        </div>
                        <input type="hidden" name="delete_foto" id="delete_foto" value="">
                    </div>
                    <input type="file" name="foto" accept="image/jpg,image/jpeg,image/png" onchange="previewAbout(event)"
                           class="w-full text-sm text-stone-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 transition-colors file:cursor-pointer cursor-pointer">
                </div>

                <div class="flex items-center gap-3 p-4 rounded-xl bg-stone-50 border border-stone-200/50">
                    <input type="checkbox" name="aktif" value="1" <?php echo e($about->aktif !== false ? 'checked' : ''); ?>

                           class="w-4 h-4 rounded border-stone-300 text-amber-500 focus:ring-amber-500/30">
                    <span class="text-sm text-stone-700 font-medium">Tampilkan section Tentang Kami</span>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <button type="submit"
                            class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                        <i class="fas fa-save mr-2"></i> Simpan Tentang
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Kontak -->
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-address-card"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Informasi Kontak</h3>
                <p class="text-xs text-stone-400">Atur informasi kontak yang tampil di website</p>
            </div>
        </div>

        <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Alamat</label>
                    <textarea name="alamat" rows="3"
                              class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"><?php echo e(old('alamat', $settings['alamat'])); ?></textarea>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Telepon</label>
                        <input type="text" name="telepon" value="<?php echo e(old('telepon', $settings['telepon'])); ?>"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">WhatsApp</label>
                        <input type="text" name="whatsapp" value="<?php echo e(old('whatsapp', $settings['whatsapp'])); ?>" placeholder="6281234567890"
                               class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                        <p class="text-xs text-stone-400 mt-1.5">Format internasional, tanpa +</p>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email', $settings['email'])); ?>"
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Jam Operasional</label>
                    <input type="text" name="jam_operasional" value="<?php echo e(old('jam_operasional', $settings['jam_operasional'])); ?>" placeholder="Sen–Kam: 09:00–18:00, Jumat: Libur, Sab: 09:00–16:00"
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    <p class="text-xs text-stone-400 mt-1.5">Pisahkan dengan koma. Contoh: Sen–Kam: 09:00–18:00, Jumat: Libur</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Link Google Maps</label>
                    <input type="text" name="maps_link" value="<?php echo e(old('maps_link', $settings['maps_link'])); ?>"
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all"
                           placeholder="https://maps.app.goo.gl/...">
                    <p class="text-xs text-stone-400 mt-1.5">Cara: buka <a href="https://maps.google.com" target="_blank" class="text-amber-600 hover:text-amber-700 underline">Google Maps</a>, cari lokasi, klik tombol Bagikan, salin link.</p>
                </div>

                <?php if($settings['maps_embed'] ?? null): ?>
                <div class="rounded-xl overflow-hidden border border-stone-200">
                    <div class="w-full aspect-[16/5] max-sm:aspect-[4/3]">
                        <iframe src="<?php echo e($settings['maps_embed']); ?>" width="100%" height="100%" title="Pratinjau Peta" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="block w-full h-full"></iframe>
                    </div>
                    <div class="flex items-center justify-between px-4 py-2.5 bg-stone-50 border-t border-stone-100">
                        <p class="text-xs text-stone-500"><i class="fas fa-map-pin text-amber-500 mr-1.5"></i>Pratinjau Peta</p>
                        <a href="<?php echo e($settings['maps_link'] ?? $settings['maps_embed']); ?>" target="_blank" class="text-xs font-medium text-amber-600 hover:text-amber-700">Buka Maps <i class="fas fa-external-link-alt ml-1"></i></a>
                    </div>
                </div>
                <?php endif; ?>

                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <button type="submit"
                            class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                        <i class="fas fa-save mr-2"></i> Simpan Kontak
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Page Headers -->
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-heading"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Page Headers</h3>
                <p class="text-xs text-stone-400">Atur judul & deskripsi di header setiap halaman</p>
            </div>
        </div>

        <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <?php
                $defaultHeaders = [
                    'tentang' => ['title' => 'Kenali Juneo Phone', 'subtitle' => 'Ahlinya Service HP Android & iPhone — Berpengalaman, Terpercaya, dan Bergaransi.'],
                    'blog' => ['title' => 'Tips & Edukasi HP', 'subtitle' => 'Dapatkan informasi terbaru seputar perawatan, tips, dan trik HP Android & iPhone.'],
                    'galeri' => ['title' => 'Galeri Foto', 'subtitle' => 'Lihat suasana toko dan proses service HP kami.'],
                    'faq' => ['title' => 'Pertanyaan Umum', 'subtitle' => 'Temukan jawaban untuk pertanyaan yang sering diajukan.'],
                    'kontak' => ['title' => 'Hubungi Kami', 'subtitle' => 'Kami siap membantu Anda. Silakan hubungi melalui form atau kontak di bawah.'],
                ];
                $current = json_decode(\App\Models\Setting::getValue('pageheaders', '{}'), true);
            ?>

            <div class="space-y-6">
                <?php $__currentLoopData = ['tentang' => 'Tentang', 'blog' => 'Blog', 'galeri' => 'Galeri', 'faq' => 'FAQ', 'kontak' => 'Kontak']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $h = array_merge($defaultHeaders[$key], $current[$key] ?? []); ?>
                <div class="p-4 rounded-xl bg-stone-50 border border-stone-200/60">
                    <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider mb-3"><?php echo e($label); ?></p>
                    <div class="grid sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[10px] font-medium text-stone-400 mb-1">Judul</label>
                            <input type="text" name="pageheaders[<?php echo e($key); ?>][title]" value="<?php echo e($h['title']); ?>"
                                   class="w-full px-3 py-2 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-medium text-stone-400 mb-1">Subtitle</label>
                            <input type="text" name="pageheaders[<?php echo e($key); ?>][subtitle]" value="<?php echo e($h['subtitle']); ?>"
                                   class="w-full px-3 py-2 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-stone-100 mt-4">
                <button type="submit"
                        class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                    <i class="fas fa-save mr-2"></i> Simpan Page Headers
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event, imgId, containerId, deleteInputId) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(imgId).src = e.target.result;
            document.getElementById(containerId).classList.remove('hidden');
            document.getElementById(deleteInputId).value = '';
        };
        reader.readAsDataURL(file);
    }
}
function previewAbout(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('aboutPreview').src = ev.target.result;
            document.getElementById('aboutPreviewContainer').classList.remove('hidden');
            document.getElementById('delete_foto').value = '';
        };
        reader.readAsDataURL(file);
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Dataku (H)\Projek Website\juneophone\resources\views\admin\settings.blade.php ENDPATH**/ ?>