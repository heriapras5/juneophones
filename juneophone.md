# CP-JuneoPhone — PRD & Panduan Pembangunan Website Company Profile

> **Project:** Company Profile Website `juneophone.com`
> **Status:** Planning
> **Basis Desain:** SIM-JuneoPhone (konsisten: gold/amber theme, dark sidebar, Tailwind v4, Alpine.js v3, Font Awesome 6)

---

## Daftar Isi

1. [PRD — Product Requirements Document](#1-prd--product-requirements-document)
2. [SRS — Software Requirements Specification](#2-srs--software-requirements-specification)
3. [SDD — System Design Document](#3-sdd--system-design-document)
4. [UI/UX Flow](#4-uiux-flow)
5. [Task Breakdown](#5-task-breakdown)

---

## 1. PRD — Product Requirements Document

### 1.1 Tujuan Produk

Website profil perusahaan untuk **Juneo Phone** — toko service HP Android & iPhone. Bertujuan sebagai:

| Tujuan | Detail |
|--------|--------|
| **Brand Identity** | Menampilkan profil bisnis secara profesional dengan identitas visual konsisten |
| **Informasi Publik** | Menyediakan info lengkap: layanan, lokasi, kontak, jam operasional |
| **Lead Generation** | Memudahkan calon pelanggan menghubungi via WhatsApp/telepon/alamat |
| **Kredibilitas** | Testimoni, statistik, FAQ untuk membangun kepercayaan |

### 1.2 Target User

| User | Kebutuhan |
|------|-----------|
| **Calon Pelanggan** | Mencari info service HP, lokasi toko, nomor kontak |
| **Pelanggan Existing** | Cek alamat, jam buka, kontak darurat, FAQ |
| **Owner/Admin** | Mengelola konten website secara dinamis via admin panel |

### 1.3 Domain & Hosting

| Layanan | Domain | Keterangan |
|---------|--------|------------|
| **Company Profile** | `juneophone.com` | Project Laravel baru |
| **SIM Management** | `sim-juneophone.com` (subdomain) | Project existing |

> **Catatan:** Company Profile menggunakan project Laravel terpisah dengan database sendiri.

### 1.4 Fitur

#### 1.4.1 Halaman Publik (Frontend) — Single Page Scroll

| # | Section | Deskripsi |
|---|---------|-----------|
| 1 | **Navbar** | Fixed di atas, transparan → solid saat scroll, logo + menu smooth scroll |
| 2 | **Hero** | Full-screen, dark gradient + gold radial glow, judul besar, tagline, CTA button |
| 3 | **Tentang Kami** | Visi, misi, sejarah toko — layout 2 kolom dengan icon box gold |
| 4 | **Layanan** | Grid kartu layanan (Service HP, Ganti LCD, Baterai, Software, dll) + icon FA |
| 5 | **Statistik** | Counter animasi: total service, pelanggan puas, tahun pengalaman |
| 6 | **Testimoni** | Karusel/cards kutipan pelanggan dengan foto |
| 7 | **Lokasi & Kontak** | Google Maps embed + info kontak (alamat, telepon, WhatsApp, email) |
| 8 | **FAQ** | Accordion Alpine.js — pertanyaan umum + jawaban |
| 9 | **Footer** | Dark gradient, logo, sosial media, copyright |

#### 1.4.2 Halaman Admin Panel

| # | Halaman | Fitur |
|---|---------|-------|
| 1 | `/admin/login` | Login email + password |
| 2 | `/admin/dashboard` | Overview, link ke tiap section |
| 3 | `/admin/hero` | Edit judul, tagline, background image, CTA (1 record) |
| 4 | `/admin/about` | Edit tentang, visi, misi, foto (1 record) |
| 5 | `/admin/layanan` | CRUD layanan + icon picker + urutan |
| 6 | `/admin/testimoni` | CRUD testimoni + foto upload + urutan |
| 7 | `/admin/faq` | CRUD pertanyaan & jawaban + urutan |
| 8 | `/admin/kontak` | Edit alamat, telepon, WhatsApp, email, Google Maps embed |
| 9 | `/admin/settings` | Logo website, favicon, sosial media links |

### 1.5 Non-Fitur (Tidak Termasuk)

- Login Google / OAuth (cukup login manual admin)
- Export/import Excel atau PDF
- Manajemen data transaksional (service, pelanggan, biaya)
- Multi-bahasa (Indonesia saja)
- API publik

### 1.6 Konsistensi Desain (Dengan SIM-JuneoPhone)

| Elemen | SIM-JuneoPhone | Company Profile |
|--------|----------------|-----------------|
| **Primary Color** | Gold `from-yellow-500 to-amber-500` | **Sama** |
| **Dark Background** | `from-gray-900 via-gray-950 to-black` | **Sama** — hero & footer |
| **Light Background** | `bg-gray-50` | **Sama** — body |
| **Card** | `bg-white border-gray-200 rounded-xl shadow-sm p-5` | **Sama** |
| **Button Primary** | `bg-gradient-to-r from-yellow-500 to-amber-500 text-white font-medium rounded-lg shadow-sm hover:from-yellow-400 hover:to-amber-400 disabled:opacity-50` | **Sama** |
| **Button Secondary** | `bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg` | **Sama** |
| **Button Danger** | `bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg` | **Sama** |
| **Input** | `px-4 py-2.5 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-yellow-500/30 focus:border-yellow-500 text-gray-900 outline-none` | **Sama** |
| **Font Family** | `font-sans` (Instrument Sans / system-ui) | **Sama** |
| **Typography** | `text-sm` body, `text-xs` label, `text-xs font-semibold uppercase tracking-wider` header | **Sama** |
| **Icon** | Font Awesome 6 via CDN | **Sama** |
| **Gold Accent Bar** | `w-1 h-5 bg-yellow-500 rounded-full` sebagai separator | **Sama** |
| **Section Title** | `flex items-center gap-2 mb-4` + `text-xs font-semibold text-gray-500 uppercase tracking-wider` | **Sama** |
| **Logo** | `rounded-full ring-4 ring-yellow-500/30 shadow-2xl shadow-yellow-500/30` + `filter: drop-shadow(...)` | **Sama** (di navbar & footer) |
| **Icon Box** | `w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-50 to-amber-100 flex items-center justify-center text-yellow-600` | **Sama** |
| **Form Error** | `@error('field') border-red-400 @enderror` + `text-red-500 text-xs mt-1` | **Sama** |
| **Modal** | `fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center` + `bg-white rounded-2xl shadow-2xl` | **Sama** |
| **Animasi** | fade-in, slide-up, scale-in, stagger delay via CSS keyframes + Alpine x-transition | **Sama** |
| **Border Radius** | `rounded-xl` (card), `rounded-lg` (button/input), `rounded-full` (logo/avatar) | **Sama** |

---

## 2. SRS — Software Requirements Specification

### 2.1 Lingkungan Teknis

| Komponen | Spesifikasi |
|----------|-------------|
| Backend | Laravel 12 |
| PHP | ^8.2 |
| Database | MySQL 8+ (database terpisah dari SIM) |
| CSS | Tailwind CSS v4 (@tailwindcss/vite) |
| JS | Alpine.js v3 (via npm) |
| Build | Vite 7 + laravel-vite-plugin |
| Icons | Font Awesome 6.5.1 (CDN: `https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css`) |
| Maps | Google Maps Embed API (iframe embed — gratis, tanpa API key opsional) |

### 2.2 Database Schema

#### `users` — Admin login

| Column | Type | Constraint | Notes |
|--------|------|------------|-------|
| id | BIGINT UNSIGNED | PK | |
| name | VARCHAR(255) | NOT NULL | |
| email | VARCHAR(255) | UNIQUE, NOT NULL | |
| password | VARCHAR(255) | NOT NULL | Hashed |
| role | ENUM('admin') | DEFAULT 'admin' | Single admin role |
| created_at / updated_at | TIMESTAMP | | |

#### `heroes` — Hero Section (1 record)

| Column | Type | Constraint | Notes |
|--------|------|------------|-------|
| id | BIGINT UNSIGNED | PK | |
| judul | VARCHAR(255) | NOT NULL | Judul besar di hero |
| tagline | VARCHAR(255) | NULLABLE | Subtitle/tagline |
| gambar_bg | VARCHAR(255) | NULLABLE | Path background image |
| cta_text | VARCHAR(100) | DEFAULT 'Hubungi Kami' | Tombol CTA |
| cta_link | VARCHAR(255) | DEFAULT 'https://wa.me/...' | Link/tujuan CTA |
| aktif | BOOLEAN | DEFAULT true | |
| created_at / updated_at | TIMESTAMP | | |

#### `abouts` — Tentang Kami (1 record)

| Column | Type | Constraint | Notes |
|--------|------|------------|-------|
| id | BIGINT UNSIGNED | PK | |
| judul | VARCHAR(255) | DEFAULT 'Tentang Kami' | |
| deskripsi | TEXT | NOT NULL | Paragraf tentang toko |
| visi | TEXT | NULLABLE | Visi |
| misi | TEXT | NULLABLE | Misi (bisa dipisah baris) |
| foto | VARCHAR(255) | NULLABLE | Foto toko/tim |
| aktif | BOOLEAN | DEFAULT true | |
| created_at / updated_at | TIMESTAMP | | |

#### `services` — Layanan (multi record)

| Column | Type | Constraint | Notes |
|--------|------|------------|-------|
| id | BIGINT UNSIGNED | PK | |
| nama | VARCHAR(255) | NOT NULL | Nama layanan (e.g. "Service HP") |
| icon | VARCHAR(100) | DEFAULT 'fas fa-tools' | Class Font Awesome |
| deskripsi | TEXT | NULLABLE | Penjelasan singkat |
| urutan | INTEGER | DEFAULT 0 | Order sorting |
| aktif | BOOLEAN | DEFAULT true | |
| created_at / updated_at | TIMESTAMP | | |

#### `testimonials` — Testimoni (multi record)

| Column | Type | Constraint | Notes |
|--------|------|------------|-------|
| id | BIGINT UNSIGNED | PK | |
| nama | VARCHAR(255) | NOT NULL | Nama pelanggan |
| jabatan | VARCHAR(255) | NULLABLE | Label (e.g. "Pelanggan Setia") |
| foto | VARCHAR(255) | NULLABLE | Foto orang (nullable → icon default) |
| kutipan | TEXT | NOT NULL | Isi testimoni |
| urutan | INTEGER | DEFAULT 0 | Order sorting |
| aktif | BOOLEAN | DEFAULT true | |
| created_at / updated_at | TIMESTAMP | | |

#### `faqs` — FAQ (multi record)

| Column | Type | Constraint | Notes |
|--------|------|------------|-------|
| id | BIGINT UNSIGNED | PK | |
| pertanyaan | VARCHAR(255) | NOT NULL | |
| jawaban | TEXT | NOT NULL | |
| urutan | INTEGER | DEFAULT 0 | Order sorting |
| aktif | BOOLEAN | DEFAULT true | |
| created_at / updated_at | TIMESTAMP | | |

#### `settings` — Key-Value Store

| Column | Type | Constraint | Notes |
|--------|------|------------|-------|
| id | BIGINT UNSIGNED | PK | |
| key | VARCHAR(255) | UNIQUE, NOT NULL | |
| value | TEXT | NULLABLE | |

**Keys yang dibutuhkan:**

| Key | Default | Kegunaan |
|-----|---------|----------|
| `logo` | null | Path logo website |
| `favicon` | null | Path favicon |
| `alamat` | - | Alamat toko |
| `telepon` | - | Nomor telepon |
| `whatsapp` | - | Nomor WhatsApp (format internasional) |
| `email` | - | Email kontak |
| `jam_operasional` | - | Jam buka (e.g. "Sen–Sab: 09:00–18:00") |
| `maps_embed` | - | Google Maps embed src URL |
| `sosial_media` | JSON | Array link sosial media |
| `stats_service` | 1500+ | Counter service untuk display |
| `stats_pelanggan` | 1000+ | Counter pelanggan |
| `stats_tahun` | 5+ | Counter tahun berjalan |

### 2.3 Route Structure

```php
// === PUBLIC ROUTES ===
GET /              → LandingController@index  (single page)

// === AUTH ROUTES ===
GET /admin/login   → AuthController@showLoginForm
POST /admin/login  → AuthController@login
POST /admin/logout → AuthController@logout

// === ADMIN ROUTES (middleware: auth) ===
GET    /admin/dashboard      → AdminController@dashboard
GET    /admin/hero            → HeroController@edit
PUT    /admin/hero            → HeroController@update
GET    /admin/about           → AboutController@edit
PUT    /admin/about           → AboutController@update
GET    /admin/layanan         → LayananController@index
POST   /admin/layanan         → LayananController@store
PUT    /admin/layanan/{id}    → LayananController@update
DELETE /admin/layanan/{id}    → LayananController@destroy
POST   /admin/layanan/reorder → LayananController@reorder
GET    /admin/testimoni       → TestimoniController@index
POST   /admin/testimoni       → TestimoniController@store
PUT    /admin/testimoni/{id}  → TestimoniController@update
DELETE /admin/testimoni/{id}  → TestimoniController@destroy
POST   /admin/testimoni/reorder → TestimoniController@reorder
GET    /admin/faq             → FaqController@index
POST   /admin/faq             → FaqController@store
PUT    /admin/faq/{id}        → FaqController@update
DELETE /admin/faq/{id}        → FaqController@destroy
POST   /admin/faq/reorder     → FaqController@reorder
GET    /admin/kontak          → KontakController@edit
PUT    /admin/kontak          → KontakController@update
GET    /admin/settings        → SettingController@edit
PUT    /admin/settings        → SettingController@update
```

### 2.4 Validasi & Aturan

| Aturan | Detail |
|--------|--------|
| **Login** | Email valid + password minimal 6 karakter |
| **Gambar** | Format JPG/PNG, maks 2MB, simpan di `storage/app/public/` |
| **Hero** | Hanya 1 record aktif. `judul` max 255 chars |
| **Layanan** | `icon` harus class FA valid. `nama` unique |
| **Testimoni** | `kutipan` minimal 10 karakter |
| **FAQ** | `pertanyaan` dan `jawaban` required |
| **Urutan** | Default 0, ascending order di frontend |
| **Aktif** | Hanya record `aktif = true` yang tampil di publik |

### 2.5 Animasi & Transisi (Sama Dengan SIM)

| Elemen | Animasi |
|--------|---------|
| **Page entrance** | `animate-fadeIn` + `animate-slideUp` (trigger via Alpine `x-intersect` atau class on scroll) |
| **Section muncul saat scroll** | `x-intersect` Alpine.js → tambah class `is-visible` |
| **Kartu layanan** | Stagger delay: `transition-delay: 100ms, 200ms, 300ms...` |
| **Counter statistik** | Animasi count-up via Alpine (`x-text` + interval) |
| **Accordion FAQ** | `x-collapse` + transisi putar icon chevron |
| **Navbar scroll** | `@scroll.window` → toggle class `bg-gray-900/90 backdrop-blur-sm` |
| **Modal admin** | `x-transition` fade + scale (sama dengan SIM) |
| **Tombol** | `active:scale-[0.97] transition-transform duration-150` (sama dengan SIM) |

---

## 3. SDD — System Design Document

### 3.1 Arsitektur

```
┌────────────────────────────────────────────┐
│              Browser                         │
│  Tailwind CSS v4 + Alpine.js v3 + FA6 CDN   │
└────────────────┬───────────────────────────┘
                 │ HTTP
                 ▼
┌────────────────────────────────────────────┐
│          Laravel 12 (MVC)                    │
│                                              │
│  Routes ──► Controllers ──► Models           │
│                │              │               │
│                ▼              ▼               │
│          Blade Views      MySQL Database      │
│          (Public + Admin)  db_juneo_profile   │
│                                              │
│  ┌─────────── Libraries ──────────┐          │
│  │ Vite 7 │ Tailwind CSS v4       │          │
│  │ Alpine.js v3 │ Font Awesome 6  │          │
│  └────────────────────────────────┘          │
└──────────────────────────────────────────────┘
```

### 3.2 Struktur Direktori

```
project-root/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php         # Login
│   │   │   ├── AdminController.php        # Dashboard
│   │   │   ├── LandingController.php      # Halaman publik
│   │   │   ├── HeroController.php         # CRUD hero
│   │   │   ├── AboutController.php        # CRUD tentang
│   │   │   ├── LayananController.php      # CRUD layanan
│   │   │   ├── TestimoniController.php    # CRUD testimoni
│   │   │   ├── FaqController.php          # CRUD FAQ
│   │   │   ├── KontakController.php       # Edit kontak
│   │   │   └── SettingController.php      # Edit settings
│   │   └── Middleware/
│   │       └── AdminMiddleware.php        # Auth filter
│   ├── Models/
│   │   ├── User.php
│   │   ├── Hero.php
│   │   ├── About.php
│   │   ├── Service.php (layanan)
│   │   ├── Testimonial.php
│   │   ├── Faq.php
│   │   └── Setting.php                    # getValue() static
│   └── Providers/
│       └── AppServiceProvider.php
│
├── database/
│   └── migrations/
│       ├── 0001_create_users_table.php
│       ├── 0002_create_heroes_table.php
│       ├── 0003_create_abouts_table.php
│       ├── 0004_create_services_table.php
│       ├── 0005_create_testimonials_table.php
│       ├── 0006_create_faqs_table.php
│       └── 0007_create_settings_table.php
│
├── resources/
│   ├── css/
│   │   └── app.css                       # Tailwind + custom keyframes
│   ├── js/
│   │   └── app.js                        # Alpine.js component
│   └── views/
│       ├── layouts/
│       │   ├── public.blade.php           # Layout publik (navbar + footer)
│       │   └── admin.blade.php            # Layout admin (sidebar + header)
│       ├── public/
│       │   └── index.blade.php            # Landing page (semua section)
│       ├── admin/
│       │   ├── login.blade.php            # Login page
│       │   ├── dashboard.blade.php        # Dashboard
│       │   ├── hero.blade.php             # Edit hero
│       │   ├── about.blade.php            # Edit about
│       │   ├── layanan.blade.php          # CRUD layanan
│       │   ├── testimoni.blade.php        # CRUD testimoni
│       │   ├── faq.blade.php              # CRUD FAQ
│       │   ├── kontak.blade.php           # Edit kontak
│       │   └── settings.blade.php         # Edit settings
│       └── components/
│           ├── hero-section.blade.php
│           ├── about-section.blade.php
│           ├── services-section.blade.php
│           ├── stats-section.blade.php
│           ├── testimonials-section.blade.php
│           ├── contact-section.blade.php
│           ├── faq-section.blade.php
│           └── footer-section.blade.php
│
├── storage/
│   └── app/public/
│       ├── heroes/                        # Hero background images
│       ├── abouts/                        # About photos
│       ├── testimonials/                  # Testimoni photos
│       └── settings/                      # Logo, favicon
│
├── public/
│   └── storage/ → storage/app/public/     # Symlink
│
├── .env
├── package.json
├── vite.config.js
└── tailwind.config.js
```

### 3.3 Model Responsibilities

#### Setting Model
```php
class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    // Static method — panggil di mana saja tanpa instantiate
    public static function getValue($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}
```

#### Hero / About (Single Record)
```php
// Gunakan firstOrCreate + update
// Di controller: Hero::first() ?? new Hero()
```

#### Service / Testimonial / Faq (Multi Record)
```php
// CRUD standar + orderBy('urutan')->where('aktif', true)
// Di controller: paginate(10) untuk admin, all() untuk publik
```

### 3.4 Admin Panel Layout

```
┌─────────────────────────────────────────────┐
│  [Logo]              Admin Panel     [User]  │ ← Header
├──────────┬──────────────────────────────────┤
│ Sidebar  │  Content Area                     │
│ (Dark)   │                                   │
│          │  ┌─ Breadcrumb ────────────────┐  │
│ ● Hero   │  │                             │  │
│ ● About  │  ├─ Card ─────────────────────┤  │
│ ● Layanan│  │                             │  │
│ ● Testi  │  │   Form / Table / Content    │  │
│ ● FAQ    │  │                             │  │
│ ● Kontak │  └─────────────────────────────┘  │
│ ● Set.   │                                   │
│          │                                   │
└──────────┴───────────────────────────────────┘
```

**Styling:**

| Elemen | Class |
|--------|-------|
| **Sidebar** | `bg-gradient-to-b from-gray-900 via-gray-950 to-black w-60 text-white` |
| **Sidebar nav** | Sama pattern SIM: `flex items-center gap-3 px-4 py-2.5 text-sm` |
| **Sidebar active** | `bg-yellow-500/10 text-yellow-400` + `::before` gold accent line |
| **Header** | `bg-white border-b border-gray-200 h-16 px-6` |
| **Card** | `bg-white border border-gray-200 rounded-xl shadow-sm p-5` |
| **Button simpan** | Gold gradient (sama dengan SIM) |
| **Table** | `w-full` + `thead.bg-gray-50` + `tbody.divide-y` (sama dengan SIM) |

### 3.5 Public Page Layout

```
┌──────────────────────────────────────────────┐
│  [Logo]  Tentang  Layanan  Testimoni  Kontak  │ ← Navbar (fixed)
│                (smooth scroll anchors)        │    transparan → solid
├──────────────────────────────────────────────┤
│                                               │
│           HERO SECTION                        │
│   "Service HP Andal & Terpercaya"             │ ← Dark gradient + gold glow
│   "Juneo Phone — Ahlinya Service HP"          │
│          [Hubungi Kami via WhatsApp]          │ ← Gold gradient CTA
│                                               │
├──────────────────────────────────────────────┤
│           TENTANG KAMI                       │
│   [Icon]  [Icon]                             │ ← Card putih 2 kolom
│   Visi     Misi                              │    icon box gold
│   ── deskripsi ──                            │
│                                               │
├──────────────────────────────────────────────┤
│           LAYANAN                            │
│   ┌──────┐ ┌──────┐ ┌──────┐                │
│   │Icon  │ │Icon  │ │Icon  │                │ ← Grid cards
│   │Service│ │Ganti │ │Baterai│               │    FA icon + nama
│   │HP    │ │LCD   │ │       │                │    + deskripsi
│   └──────┘ └──────┘ └──────┘                │
│                                               │
├──────────────────────────────────────────────┤
│           STATISTIK                          │
│  [1500+]    [1000+]      [5+]                │ ← Counter animasi
│  Service    Pelanggan    Tahun                │
│                                               │
├──────────────────────────────────────────────┤
│           TESTIMONI                          │
│   "..."  ★★★★★                              │ ← Karusel/cards
│   — Nama Pelanggan                          │    foto + kutipan
│                                               │
├──────────────────────────────────────────────┤
│           LOKASI & KONTAK                    │
│  ┌──────────────┐  ┌── Info ──────────┐     │
│  │  Google Maps  │  │ 📍 Alamat        │     │
│  │  Embed        │  │ 📞 Telepon       │     │
│  │               │  │ 💬 WhatsApp      │     │
│  └──────────────┘  │ ✉️ Email          │     │
│                     │ 🕐 Jam Operasional│     │
│                     └──────────────────┘     │
├──────────────────────────────────────────────┤
│           FAQ                                │
│  ► Pertanyaan 1?                             │ ← Alpine accordion
│  ► Pertanyaan 2?                             │    x-data + x-collapse
│  ► Pertanyaan 3?                             │
│                                               │
├──────────────────────────────────────────────┤
│  [Logo]  © 2026 Juneo Phone                  │ ← Footer dark gradient
│  Sosial Media: [ig] [fb] [yt]                │
└──────────────────────────────────────────────┘
```

---

## 4. UI/UX Flow

### 4.1 User Flow — Publik

```
Masuk ke juneophone.com
        │
        ▼
    Landing Page (hero + navbar)
        │
        ├──► Klik "Tentang" → smooth scroll ke section tentang
        │
        ├──► Klik "Layanan" → scroll ke grid layanan
        │
        ├──► Klik "Testimoni" → scroll ke karusel testimoni
        │
        ├──► Klik "Kontak" → scroll ke maps + info kontak
        │
        ├──► Klik "FAQ" → scroll ke accordion FAQ
        │
        └──► Klik CTA/WhatsApp → buka wa.me/{nomor} di tab baru
```

### 4.2 User Flow — Admin

```
Login ke juneophone.com/admin/login
        │
        ▼
    Admin Dashboard
        │
        ├──► Hero → Edit judul, tagline, bg image, CTA → Simpan
        │
        ├──► About → Edit teks, visi, misi, foto → Simpan
        │
        ├──► Layanan → Tambah/edit/hapus layanan + icon + urutan
        │
        ├──► Testimoni → Tambah/edit/hapus testimoni + foto + urutan
        │
        ├──► FAQ → Tambah/edit/hapus pertanyaan & jawaban + urutan
        │
        ├──► Kontak → Edit alamat, telepon, WA, email, maps embed
        │
        └──► Settings → Upload logo, favicon, sosial media links
```

### 4.3 Komponen UI — Mapping Lengkap

| Komponen | File View | Di Publik | Di Admin |
|----------|-----------|-----------|----------|
| Navbar publik | `layouts/public.blade.php` | ✅ | ❌ |
| Sidebar admin | `layouts/admin.blade.php` | ❌ | ✅ |
| Hero section | `components/hero-section.blade.php` | ✅ (include di index) | ✅ (form edit) |
| About section | `components/about-section.blade.php` | ✅ | ✅ |
| Layanan cards | `components/services-section.blade.php` | ✅ | ✅ table + modal |
| Statistik | `components/stats-section.blade.php` | ✅ | ❌ (di settings) |
| Testimoni | `components/testimonials-section.blade.php` | ✅ | ✅ table + modal |
| Lokasi & Kontak | `components/contact-section.blade.php` | ✅ | ✅ form edit |
| FAQ accordion | `components/faq-section.blade.php` | ✅ | ✅ table + form |
| Footer | `layouts/public.blade.php` (include footer) | ✅ | ❌ |
| Form input | reusable partial | ❌ | ✅ |
| Modal CRUD | inline di tiap halaman admin | ❌ | ✅ |
| Flash message | reusable partial | ❌ | ✅ |
| Table | reusable partial | ❌ | ✅ |

---

## 5. Task Breakdown

### Tahap 1: Foundation (Setup)

| # | Task | Detail | Jam |
|---|------|--------|-----|
| 1.1 | `composer create-project laravel/laravel` | Project baru `cp-juneo-phone` | 0.5 |
| 1.2 | Konfigurasi `.env` | DB name, APP_URL, timezone Asia/Jakarta | 0.25 |
| 1.3 | Install npm dependencies | `npm install tailwindcss @tailwindcss/vite alpinejs` | 0.25 |
| 1.4 | Setup Tailwind v4 + Vite | `vite.config.js` + `app.css` + `app.js` | 0.5 |
| 1.5 | Install Font Awesome CDN | Tambah `<link>` di layout | 0.1 |
| 1.6 | `php artisan storage:link` | Symlink public/storage | 0.1 |
| 1.7 | Migration users table | email + password + role | 0.25 |

### Tahap 2: Database & Models

| # | Task | Detail | Jam |
|---|------|--------|-----|
| 2.1 | Migration heroes + model | Single record | 0.25 |
| 2.2 | Migration abouts + model | Single record | 0.25 |
| 2.3 | Migration services + model | Multi record, urutan, icon | 0.5 |
| 2.4 | Migration testimonials + model | Multi record, foto, urutan | 0.5 |
| 2.5 | Migration faqs + model | Multi record, urutan | 0.25 |
| 2.6 | Migration settings + model | Key-value, getValue() static | 0.25 |
| 2.7 | Seeder admin user | User default admin | 0.1 |

### Tahap 3: Auth & Admin Panel

| # | Task | Detail | Jam |
|---|------|--------|-----|
| 3.1 | AuthController + login view | Manual login, middleware | 1.5 |
| 3.2 | Admin layout `admin.blade.php` | Sidebar dark, header, content | 2 |
| 3.3 | Admin dashboard view | Overview cards + links | 0.5 |
| 3.4 | Hero admin | Form edit + upload bg image | 1 |
| 3.5 | About admin | Form edit + upload foto | 1 |
| 3.6 | Layanan admin | Table + modal (tambah/edit/hapus) | 2 |
| 3.7 | Testimoni admin | Table + modal + upload foto | 2 |
| 3.8 | FAQ admin | Table + form inline/modal | 1.5 |
| 3.9 | Kontak admin | Form edit key-value | 1 |
| 3.10 | Settings admin | Logo, favicon, sosial media | 1 |
| 3.11 | Flash message component | Sesuaikan dengan gaya SIM (emerald/red/orange) | 0.5 |

### Tahap 4: Public Frontend

| # | Task | Detail | Jam |
|---|------|--------|-----|
| 4.1 | Public layout `public.blade.php` | Navbar + footer + Alpine navigation | 3 |
| 4.2 | Hero section | Dark gradient + gold glow + CTA | 1.5 |
| 4.3 | Tentang section | 2 kolom + icon box | 1 |
| 4.4 | Layanan section | Grid cards + stagger | 1 |
| 4.5 | Statistik section | Counter animasi Alpine | 1.5 |
| 4.6 | Testimoni section | Karusel/cards | 1.5 |
| 4.7 | Lokasi & Kontak section | Maps iframe + info cards | 1 |
| 4.8 | FAQ section | Accordion Alpine `x-data` + `x-collapse` | 1.5 |
| 4.9 | LandingController@index | Load semua data + render | 0.5 |

### Tahap 5: Animasi & Polish

| # | Task | Detail | Jam |
|---|------|--------|-----|
| 5.1 | CSS keyframes | fade-in, slide-up, scale-in (sama SIM) | 0.5 |
| 5.2 | Scroll reveal | `x-intersect` + stagger delay | 1.5 |
| 5.3 | Navbar scroll effect | Transparan→solid on scroll | 1 |
| 5.4 | Responsive mobile | Test all breakpoints | 1.5 |
| 5.5 | Loading states + transisi | Button disabled, modal transition | 0.5 |
| 5.6 | 404 page | Custom error page | 0.25 |

### Tahap 6: Deploy

| # | Task | Detail | Jam |
|---|------|--------|-----|
| 6.1 | Setup hosting + domain | Point domain ke server | 1 |
| 6.2 | Setup database | Create DB + migrate | 0.25 |
| 6.3 | Build production | `npm run build` | 0.25 |
| 6.4 | Upload project ke server | Via git/deploy | 0.5 |
| 6.5 | DNS setup | Domain → server IP | 0.5 |
| 6.6 | Test live | Full test dari publik & admin | 1 |

---

### Total Estimasi: ~30-35 jam

---

## Lampiran

### A. Stack Lengkap

```
Laravel 12   ── Backend
PHP 8.2+     ── Runtime
MySQL 8+     ── Database
Tailwind v4  ── CSS (utility-first)
Alpine.js 3  ── JavaScript (reactive)
Vite 7       ── Build tool
Font Awesome 6 ── Icons (CDN)
Google Maps Embed ── Maps (gratis)
```

### B. Command Penting

```bash
# Setup project
composer create-project laravel/laravel cp-juneo-phone
cd cp-juneo-phone
npm install tailwindcss @tailwindcss/vite alpinejs
php artisan storage:link

# Development
php artisan serve
npm run dev

# Database
php artisan migrate
php artisan db:seed

# Production
npm run build
php artisan optimize
php artisan config:cache
```

### C. Copy dari SIM yang Bisa Di-reuse

| File SIM | Adaptasi untuk Company Profile |
|----------|--------------------------------|
| `layouts/app.blade.php` → `navbar` pattern | `layouts/public.blade.php` — navbar horizontal |
| `layouts/app.blade.php` → `sidebar` pattern | `layouts/admin.blade.php` — sidebar admin |
| `resources/css/app.css` → `keyframes` | `resources/css/app.css` — copy semua keyframes |
| `resources/views/auth/login.blade.php` | `admin/login.blade.php` — login admin |
| `resources/views/settings/profile.blade.php` | Admin profile form |
| `app/Models/Setting.php` | `app/Models/Setting.php` — sama persis |
| `app/Http/Controllers/ProfileController.php` | Admin profile controller |
| Flash message pattern (emerald/red/orange) | Sama |
| Modal pattern (backdrop-blur + rounded-2xl) | Sama |
| Button styling (gold gradient) | Sama |

### D. Kunci Konsistensi (Checklist)

- [ ] Sidebar admin: `from-gray-900 via-gray-950 to-black` + `ring-yellow-500/30` logo
- [ ] Button primary: `bg-gradient-to-r from-yellow-500 to-amber-500`
- [ ] Card: `bg-white border border-gray-200 rounded-xl shadow-sm`
- [ ] Input: `border-gray-200 focus:ring-yellow-500/30 rounded-lg`
- [ ] Input error: `border-red-400` + `text-red-500 text-xs mt-1`
- [ ] Font: `font-sans` (Instrument Sans / system-ui)
- [ ] Icons: Font Awesome 6 (CDN `all.min.css`)
- [ ] Animasi: fadeIn + slideUp + stagger delay
- [ ] Logo: `rounded-full ring-4 ring-yellow-500/30 object-cover`
- [ ] Accent bar: `w-1 h-5 bg-yellow-500 rounded-full`
- [ ] Label section: `text-xs font-semibold text-gray-500 uppercase tracking-wider`
- [ ] Tabel admin: `w-full` + `thead.bg-gray-50` + `divide-y divide-gray-100`
- [ ] Tabel header: `px-5 py-3 text-xs font-semibold text-gray-600 uppercase tracking-wider`
- [ ] SweetAlert2 confirm: `confirmButtonColor: '#EF4444'` + `cancelButtonColor: '#6B7280'` + `reverseButtons: true`
