
# 🌐 Website Simpul Pemuda

Website resmi komunitas Simpul Pemuda untuk menampilkan informasi profil, press release, kegiatan, serta menerima dan menampilkan data donasi manual. Dibangun dengan Laravel dan Filament Admin Panel.

## 🚀 Fitur Utama

### 🔓 Halaman Publik
- **Landing Page**
  - Hero, deskripsi singkat komunitas, visi-misi
  - Press-release terbaru
  - Event highlight
  - Informasi donasi
  - Kontak & media sosial

- **News (Press-release / Artikel)**
  - List berita terbaru
  - Filter berdasarkan kategori dan pencarian
  - Detail tampilan berita (dengan gambar dan konten rich text)

- **Events**
  - Menampilkan kegiatan yang akan/sedang/telah berlangsung
  - Filter berdasarkan status

- **Donasi**
  - Informasi rekening donasi
  - Histori donasi yang masuk (tanpa payment gateway)

- **Kontak**
  - Info kontak komunitas (WhatsApp, Instagram, Email, dll)
  - Formulir kirim pesan langsung ke email admin



### 🔐 Admin Panel (Filament)
- **Dashboard**
- **Manajemen Profil Komunitas**
- **Manajemen News (CRUD)**
- **Manajemen Events (CRUD)**
- **Manajemen Donasi Masuk (Manual)**
- **Manajemen Informasi Rekening Donasi**
- **Manajemen Kontak & Media Sosial**
- **Manajemen Gambar (via FileUpload)**



## 🛠 Tech Stack

| Komponen       | Teknologi               |
|-|--|
| Backend        | Laravel 10+              |
| Admin Panel    | Filament 3               |
| Frontend       | Blade + Bootstrap 5      |
| JS Tools       | Alpine.js                |
| Database       | MySQL                    |
| Markdown/Editor| RichEditor (Filament 3)  |
| Storage        | Laravel Filesystem (`storage/app/public`) |



## 🧑‍💻 Instalasi & Setup

```bash
git clone https://github.com/your-user/komunitas-website.git
cd komunitas-website

composer install
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate --seed

# Buat symbolic link untuk storage
php artisan storage:link

# Jalankan server
php artisan serve
````



## 🧪 Dummy Data

Untuk keperluan testing, sistem menyediakan `Factory` untuk:

* News
* Events
* Donations
* Contacts
* Community info (hanya 1 record)

Lihat dan sesuaikan file `DatabaseSeeder.php`.



## 📂 Struktur Folder Tambahan

* `public/storage` → link ke `storage/app/public` untuk file upload
* `resources/views/news/`, `events/`, `donation/` → halaman publik
* `app/Filament/Resources/` → semua resource admin panel
* `app/Models/Community.php` → profil komunitas (single record)



## 📮 Kontak

Silakan kirim saran atau pertanyaan ke:

* Email: `admin@yourdomain.com`
* Instagram: `@yourcommunity`
* WhatsApp: `+628xxxxxxxxxx`



## 📝 Lisensi

Proyek ini bersifat open-source. Gunakan, modifikasi, dan kontribusikan sesuai kebutuhan komunitas Anda ❤️