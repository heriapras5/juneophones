<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\Artikel;
use App\Models\Galeri;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@juneophone.com'],
            [
                'name' => 'Admin Juneo',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );

        // Heroes (multi-slide carousel — without gambar_bg)
        Hero::updateOrCreate(['urutan' => 1], [
            'badge' => 'Service HP',
            'judul' => 'Juneo Phone',
            'subjudul' => 'Service Hp Android & iPhone',
            'tagline' => 'Ahlinya service handphone — cepat, bergaransi, dan harga bersahabat.',
            'cta_text' => 'Hubungi Kami via WhatsApp',
            'cta_link' => 'https://wa.me/6281234567890',
            'aktif' => true,
        ]);
        Hero::updateOrCreate(['urutan' => 2], [
            'badge' => 'Service HP',
            'judul' => 'Sparepart Original',
            'subjudul' => 'Ganti LCD & Baterai Berkualitas',
            'tagline' => 'Garansi 1 bulan untuk setiap penggantian sparepart.',
            'cta_text' => 'Cek Harga Sekarang',
            'cta_link' => 'https://wa.me/6281234567890?text=Halo%20Juneo%20Phone%2C%20saya%20mau%20tanya%20harga%20LCD',
            'aktif' => true,
        ]);

        About::updateOrCreate(['id' => 1], [
            'judul' => 'Tentang Kami',
            'deskripsi' => 'Juneo Phone Service adalah toko service HP Android & iPhone yang telah berpengalaman bertahun-tahun. Kami berkomitmen memberikan layanan terbaik dengan harga terjangkau dan kualitas terjamin. Ditangani oleh teknisi profesional dan berpengalaman di bidangnya.',
            'visi' => 'Menjadi pusat service HP terpercaya dan terdepan di Indonesia.',
            'misi' => 'Memberikan layanan service berkualitas dengan harga bersahabat dan teknologi terkini.',
            'aktif' => true,
        ]);

        // Services
        $services = [
            ['nama' => 'Service HP Android', 'icon' => 'fas fa-mobile-alt', 'deskripsi' => 'Perbaikan HP Android semua merek. Termasuk bootloop, mati total, dan kerusakan software.', 'urutan' => 1],
            ['nama' => 'Service iPhone', 'icon' => 'fab fa-apple', 'deskripsi' => 'Service iPhone mulai dari iPhone 6 hingga terbaru. Tangani oleh teknisi khusus Apple.', 'urutan' => 2],
            ['nama' => 'Ganti LCD', 'icon' => 'fas fa-tv', 'deskripsi' => 'Ganti LCD retak/pecah dengan kualitas terbaik. Tersedia untuk berbagai tipe HP.', 'urutan' => 3],
            ['nama' => 'Ganti Baterai', 'icon' => 'fas fa-battery-full', 'deskripsi' => 'Ganti baterai soak/ngembang dengan baterai original berkualitas.', 'urutan' => 4],
            ['nama' => 'Software & Flashing', 'icon' => 'fas fa-code', 'deskripsi' => 'Install ulang OS, upgrade firmware, unlock pattern/FRP, dan perbaikan software lainnya.', 'urutan' => 5],
            ['nama' => 'Service Lainnya', 'icon' => 'fas fa-microchip', 'deskripsi' => 'Servis komponen lain seperti IC charging, flexsibel, konektor, dan sparepart lainnya.', 'urutan' => 6],
        ];
        foreach ($services as $s) {
            Service::updateOrCreate(['urutan' => $s['urutan']], $s);
        }

        // Testimonials
        $testimonials = [
            ['nama' => 'Rina Wijaya', 'jabatan' => 'Pelanggan Setia', 'kutipan' => 'Pelayanannya cepat dan ramah. HP saya yang mati total bisa hidup lagi. Terima kasih Juneo Phone!', 'urutan' => 1],
            ['nama' => 'Bambang Sutrisno', 'jabatan' => 'Pelanggan', 'kutipan' => 'Harga terjangkau dan kualitas terjamin. LCD HP saya diganti dengan rapi. Recommended!', 'urutan' => 2],
            ['nama' => 'Sari Dewi', 'jabatan' => 'Pelanggan Setia', 'kutipan' => 'Sudah berkali-kali servis di sini. Teknisinya profesional dan selalu jujur soal kerusakan.', 'urutan' => 3],
        ];
        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['urutan' => $t['urutan']], $t);
        }

        // FAQs (pertanyaan penting, tanpa biaya)
        $faqs = [
            ['pertanyaan' => 'Berapa lama waktu service HP?', 'jawaban' => 'Tergantung jenis kerusakan. Untuk service ringan seperti ganti baterai atau LCD, biasanya 30–60 menit. Untuk kerusakan software atau komponen, bisa 1–2 hari.', 'urutan' => 1],
            ['pertanyaan' => 'Apakah menggunakan sparepart original?', 'jawaban' => 'Kami menyediakan sparepart original dan berkualitas tinggi. Kami akan menjelaskan pilihan sparepart yang tersedia beserta harganya sebelum melakukan perbaikan.', 'urutan' => 2],
            ['pertanyaan' => 'Ada garansi untuk service?', 'jawaban' => 'Ya, setiap service kami berikan garansi. Untuk ganti LCD dan baterai garansi 1 bulan. Untuk service software garansi 1 minggu. Syarat dan ketentuan berlaku.', 'urutan' => 3],
            ['pertanyaan' => 'Apakah bisa service iPhone?', 'jawaban' => 'Tentu! Kami memiliki teknisi khusus yang berpengalaman menangani service iPhone dari seri 6 hingga seri terbaru.', 'urutan' => 4],
            ['pertanyaan' => 'Bagaimana cara konsultasi?', 'jawaban' => 'Anda bisa menghubungi kami via WhatsApp atau datang langsung ke toko. Konsultasi awal gratis tanpa biaya.', 'urutan' => 5],
            ['pertanyaan' => 'Apakah HP yang terkena air masih bisa diperbaiki?', 'jawaban' => 'Sangat mungkin, tergantung seberapa parah kerusakannya. Segera matikan HP, jangan dicharge, dan bawa ke toko kami secepat mungkin. Semakin cepat ditangani, semakin besar peluang selamat.', 'urutan' => 6],
            ['pertanyaan' => 'Apakah ada layanan antar jemput?', 'jawaban' => 'Ya, kami melayani antar jemput HP untuk wilayah sekitar. Silakan hubungi kami via WhatsApp untuk koordinasi lebih lanjut.', 'urutan' => 7],
            ['pertanyaan' => 'Apakah service bisa sambil ditunggu?', 'jawaban' => 'Untuk kerusakan ringan seperti ganti baterai, charging port, atau software, biasanya bisa sambil ditunggu (15–30 menit). Untuk kerusakan berat yang butuh sparepart, HP perlu diopname.', 'urutan' => 8],
            ['pertanyaan' => 'Apakah teknisi Juneo Phone sudah bersertifikasi?', 'jawaban' => 'Teknisi kami berpengalaman bertahun-tahun dan selalu mengikuti perkembangan teknologi terbaru. Setiap teknisi memiliki keahlian khusus di bidangnya masing-masing.', 'urutan' => 9],
            ['pertanyaan' => 'Apakah menerima service semua merk HP?', 'jawaban' => 'Kami menerima service semua merk HP Android dan iPhone. Dari Samsung, Xiaomi, Oppo, Vivo, Realme, ASUS, Nokia, hingga berbagai merk lainnya.', 'urutan' => 10],
        ];
        foreach ($faqs as $f) {
            Faq::updateOrCreate(['urutan' => $f['urutan']], $f);
        }

        // Blog articles
        $artikels = [
            [
                'judul' => 'Penyebab HP Android Cepat Panas dan Cara Mengatasinya',
                'slug' => 'penyebab-hp-android-cepat-panas',
                'konten' => '<p>HP Android yang cepat panas sering kali membuat pengguna khawatir. Berikut adalah beberapa penyebab umum dan solusinya:</p><h3>1. Banyak Aplikasi Berjalan di Latar Belakang</h3><p>Aplikasi yang terus berjalan di latar belakang membebani prosesor dan membuat HP cepat panas. Solusinya: tutup aplikasi yang tidak digunakan dan nonaktifkan aplikasi yang jarang dipakai.</p><h3>2. Pengisian Daya Sambil Bermain HP</h3><p>Mengisi daya sambil bermain game atau menonton video membuat suhu baterai naik drastis. Sebaiknya istirahatkan HP saat di-charge.</p><h3>3. Sirkulasi Udara Terganggu</h3><p>Menggunakan casing yang terlalu tebal atau menaruh HP di atas permukaan yang lembut seperti bantal dapat menghambat pembuangan panas.</p><p>Jika HP Anda sering panas berlebihan, segera bawa ke <strong>Juneo Phone</strong> untuk diperiksa lebih lanjut.</p>',
                'kategori' => 'Tips & Trik',
                'penulis' => 'Tim Juneo Phone',
                'foto' => 'artikels/hp-panas.jpg',
                'tgl_publikasi' => '2026-06-01',
                'status' => 'publish',
                'aktif' => true,
            ],
            [
                'judul' => 'Ciri-ciri Baterai HP yang Harus Segera Diganti',
                'slug' => 'ciri-ciri-baterai-hp-harus-diganti',
                'konten' => '<p>Baterai adalah komponen vital pada HP. Jika sudah bermasalah, sebaiknya segera diganti untuk menghindari risiko yang lebih serius.</p><h3>Tanda-tanda Baterai Harus Diganti:</h3><ul><li><strong>Cepat habis</strong> — Daya tahan baterai turun drastis dari biasanya</li><li><strong>Menggembung</strong> — Bodi HP terlihat membengkak atau sulit diletakkan rata di meja</li><li><strong>HP mati mendadak</strong> — Padahal indikator baterai masih menunjukkan angka 20-30%</li><li><strong>Pengisian lambat</strong> — Waktu charge lebih lama dari sebelumnya</li><li><strong>HP panas berlebihan</strong> — Terutama saat mengisi daya</li></ul><p>Jangan tunda penggantian baterai jika sudah menunjukkan gejala di atas. Segera kunjungi <strong>Juneo Phone</strong> untuk konsultasi gratis.</p>',
                'kategori' => 'Perawatan',
                'penulis' => 'Tim Juneo Phone',
                'foto' => 'artikels/baterai-hp.jpg',
                'tgl_publikasi' => '2026-05-25',
                'status' => 'publish',
                'aktif' => true,
            ],
            [
                'judul' => 'Bedah Tuntas: Service iPhone vs Android, Apa Bedanya?',
                'slug' => 'perbedaan-service-iphone-dan-android',
                'konten' => '<p>Banyak yang bertanya, apakah service iPhone dan Android sama? Jawabannya: tidak sepenuhnya. Berikut perbedaan utamanya:</p><h3>Ketersediaan Sparepart</h3><p>Sparepart iPhone cenderung lebih terbatas dan harganya lebih mahal dibanding Android. Namun di Juneo Phone, kami menyediakan sparepart original untuk kedua platform.</p><h3>Kompleksitas Perbaikan</h3><p>iPhone memiliki konstruksi yang lebih rumit dengan banyak komponen yang disolder atau direkatkan. Android umumnya lebih modular sehingga lebih mudah dibongkar pasang.</p><h3>Biaya Service</h3><p>Biaya service iPhone umumnya lebih tinggi karena harga komponen dan tingkat kesulitan yang lebih besar. Kami selalu memberikan estimasi biaya sebelum melakukan perbaikan.</p><p>Apapun HP Anda, <strong>Juneo Phone</strong> siap membantu dengan teknisi profesional di bidangnya masing-masing.</p>',
                'kategori' => 'Info Service',
                'penulis' => 'Tim Juneo Phone',
                'foto' => 'artikels/iphone-android.jpg',
                'tgl_publikasi' => '2026-05-15',
                'status' => 'publish',
                'aktif' => true,
            ],
        ];
        foreach ($artikels as $a) {
            Artikel::updateOrCreate(['slug' => $a['slug']], $a);
        }

        // Gallery
        $galeris = [
            ['judul' => 'Toko Juneo Phone', 'deskripsi' => 'Tampak depan toko Juneo Phone', 'kategori' => 'Toko', 'foto' => 'galeris/toko.jpg', 'urutan' => 1],
            ['judul' => 'Ruang Service', 'deskripsi' => 'Ruang kerja teknisi yang rapi dan bersih', 'kategori' => 'Toko', 'foto' => 'galeris/ruang-service.jpg', 'urutan' => 2],
            ['judul' => 'Teknisi Sedang Bekerja', 'deskripsi' => 'Teknisi Juneo Phone sedang memperbaiki HP', 'kategori' => 'Kegiatan', 'foto' => 'galeris/teknisi.jpg', 'urutan' => 3],
            ['judul' => 'Sparepart Original', 'deskripsi' => 'Koleksi sparepart original yang tersedia', 'kategori' => 'Produk', 'foto' => 'galeris/sparepart.jpg', 'urutan' => 4],
            ['judul' => 'Alat-alat Service', 'deskripsi' => 'Peralatan service modern dan lengkap', 'kategori' => 'Toko', 'foto' => 'galeris/alat-service.jpg', 'urutan' => 5],
            ['judul' => 'Pelanggan Senang', 'deskripsi' => 'Momen setelah HP berhasil diservis', 'kategori' => 'Kegiatan', 'foto' => 'galeris/pelanggan.jpg', 'urutan' => 6],
        ];
        foreach ($galeris as $g) {
            Galeri::updateOrCreate(['urutan' => $g['urutan']], $g);
        }

        // Settings
        $settings = [
            ['key' => 'alamat', 'value' => 'Jl. Jepara – Bangsari KM 2, Kec. Batealit, Kab. Jepara, Jawa Tengah'],
            ['key' => 'telepon', 'value' => '(0291) 1234567'],
            ['key' => 'whatsapp', 'value' => '6281234567890'],
            ['key' => 'email', 'value' => 'info@juneophone.com'],
            ['key' => 'jam_operasional', 'value' => 'Sen–Kam: 09:00–18:00, Jum: Libur, Sab: 09:00–16:00'],
            ['key' => 'maps_embed', 'value' => 'https://www.google.com/maps?q=-6.5316387,110.7200355&output=embed'],
            ['key' => 'maps_coords', 'value' => '-6.5316387,110.7200355'],
            ['key' => 'maps_link', 'value' => 'https://maps.app.goo.gl/k5xpHUk7M55ssUto7'],
            ['key' => 'sosial_media', 'value' => json_encode([
                ['icon' => 'fab fa-instagram', 'url' => 'https://instagram.com/juneophone'],
                ['icon' => 'fab fa-facebook', 'url' => 'https://facebook.com/juneophone'],
                ['icon' => 'fab fa-whatsapp', 'url' => 'https://wa.me/6281234567890'],
            ])],
            ['key' => 'keunggulan', 'value' => json_encode([
                ['icon' => 'fas fa-clock', 'label' => 'Cepat & Tepat', 'deskripsi' => '15–30 menit untuk service ringan'],
                ['icon' => 'fas fa-shield-alt', 'label' => 'Bergaransi', 'deskripsi' => 'Setiap service gratis garansi 1 bulan'],
                ['icon' => 'fas fa-hand-holding-usd', 'label' => 'Harga Bersahabat', 'deskripsi' => 'Biaya service terjangkau tanpa biaya tersembunyi'],
                ['icon' => 'fas fa-user-tie', 'label' => 'Teknisi Profesional', 'deskripsi' => 'Berpengalaman & selalu update ilmu terbaru'],
            ])],
        ];
        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
