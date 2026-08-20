# Profil Company

Website Company Profile berbasis **Laravel 12**, dengan sistem login gabungan Admin & User, 
manajemen Layanan, Paket Berlangganan (Metro FTTH SIDNet & Pengembangan Web), bukti pemesanan 
PDF otomatis, dan Pesan Masuk — semuanya dapat dikelola langsung dari Dashboard Admin.

## Fitur

### Halaman Publik
- Beranda — hero section, ringkasan layanan
- Tentang Kami — profil perusahaan, visi & misi, Mitra Kami
- Layanan — daftar layanan (Paket Metro FTTH SIDNet & Pengembangan Web), dipisah per kategori dengan pilihan paket masing-masing
- Kontak — form kontak (tersimpan ke database)
- Login & Register (gabungan Admin/User dalam satu form, dengan proteksi lockout otomatis)
- **Bukti pemesanan otomatis** — setelah berlangganan paket, pelanggan mendapat halaman konfirmasi dan bisa mengunduh bukti dalam format PDF

### Dashboard Admin
- Statistik ringkas (jumlah Layanan, Paket, Pesan Masuk, Pesanan Baru)
- Kelola Layanan (CRUD)
- Kelola Paket per Layanan (CRUD)
- Kelola Pesanan Paket masuk (ubah status: baru → diproses → selesai/batal, unduh bukti PDF pelanggan)
- Kelola Pesan Masuk dari form Kontak

### Keamanan
- Password ter-enkripsi (bcrypt)
- Lockout otomatis setelah 3x percobaan login gagal (durasi 60 detik, dengan countdown live)
- Proteksi CSRF pada seluruh form
- Middleware khusus melindungi seluruh route `/admin`

---

## Requirement

| Komponen | Versi Minimum |
|---|---|
| PHP | 8.2 |
| Composer | Terbaru |
| MySQL | 5.7+ / MariaDB 10.3+ |
| Web server lokal | Laragon |

---

## Cara Clone & Instalasi

### 1. Clone repository

```bash
cd C:\laragon\www
git clone https://github.com/FathirAja/PT.-ForIT-Asta-Solusindo.git
cd PT.-ForIT-Asta-Solusindo
```
### 2. Install dependency PHP

```bash
composer install
```

### 3. Setup file environment

```bash
copy .env.example .env
php artisan key:generate
```

### 4. Buat database

Buka `http://localhost/phpmyadmin`, buat database baru dengan nama: profil_company

Biarkan kosong (tanpa tabel) — struktur tabel akan dibuat otomatis lewat migration.

### 5. Konfigurasi koneksi database di `.env`

Buka file `.env`, sesuaikan bagian ini:

```env
APP_NAME="PT. ForIT Asta Solusindo"
APP_URL=http://profil-company.test
APP_TIMEZONE=Asia/Jakarta

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=profil_company
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan migration & seeder

```bash
php artisan migrate --seed
```

Perintah ini otomatis membuat:
- Seluruh struktur tabel database
- 1 akun Admin default
- 6 data Layanan contoh

### 7. Jalankan server

```bash
php artisan serve
```
Buka browser: `http://127.0.0.1:8000`

## Password Admin

Akun Admin default dibuat otomatis lewat perintah `php artisan migrate --seed`

Email : admin@foritasta.co.id
Password : admin123