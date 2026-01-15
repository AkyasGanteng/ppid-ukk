# Aplikasi Website PPID

Aplikasi web pengelolaan **PPID (Pejabat Pengelola Informasi dan Dokumentasi)** dengan fitur manajemen konten, galeri, berita, dan sistem hak akses admin.

## Fitur Utama

- **Manajemen Galeri** - Upload, edit, dan hapus foto dengan informasi kegiatan
- **Berita & Artikel** - CRUD berita dengan sistem komentar
- **Dasar Hukum** - Penyimpanan dokumen regulasi dan undang-undang
- **SOP PPID** - Dokumentasi Standard Operating Procedures
- **Sistem Autentikasi** - Role-based access control (Admin & User)
- **Responsive Design** - Interface modern dengan Bootstrap


## Stack Teknologi

- **Backend**: Laravel 11 (PHP)
- **Frontend**: Blade Templates
- **Database**: MySQL
- **Build Tool**: CSS,HTML
- **Package Manager**: Composer

## Persyaratan Sistem

- Windows 10/11
- XAMPP (Apache + MySQL 5.7+)
- PHP 8.2+
- Composer
- Git

## Cara Instalasi

### 1. Persiapan Environment
```bash
# Pastikan XAMPP berjalan (Apache & MySQL aktif)
# Navigasi ke folder project
cd c:\xampp\htdocs\ppid-main
```

### 2. Install Dependensi
```bash
# Install package PHP via Composer
composer install

```

### 3. Konfigurasi Environment
```bash
# Salin file .env
copy .env.example .env

# Edit .env untuk konfigurasi database
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=ppid
# DB_USERNAME=root
# DB_PASSWORD=
```

### 4. Generate App Key
```bash
php artisan key:generate
```

### 5. Migrasi & Seed Database
```bash
# Jalankan migrasi
php artisan migrate

# Seed dengan data admin (opsional)
php artisan db:seed
```

### 6. Link Storage
```bash
# Buat symlink untuk akses file public
php artisan storage:link
```


### 7. Jalankan Aplikasi
```bash
# Menggunakan Artisan Server
php artisan serve
# Akses: http://localhost:8000

```

## 👤 Membuat Akun Admin

### Menggunakan Seeder
```bash
php artisan db:seed --class=AdminUserSeeder
```




```

**Default Login**: 
- Email: `admin1@ppidgarut.com`
- Password: `admin123`
```
## 📁 Struktur Folder Penting

```text
ppid-main/
├── app/
│   ├── Http/Controllers/     # Controller aplikasi
│   └── Models/               # Model database (Berita, Galeri, dll)
├── database/
│   ├── migrations/           # File migrasi database
│   └── seeders/              # File seeder data
├── resources/
│   └── views/                # Blade template (UI & Style)
├── routes/
│   └── web.php               # Route web aplikasi
└── storage/
    └── app/public/           # File upload (foto galeri, dokumen)


## Akses Fitur Berdasarkan Role

| Fitur | Admin | User |
|-------|-------|------|
| Lihat Galeri | ✅ | ✅ |
| Tambah Galeri | ✅ | ❌ |
| Edit Galeri | ✅ | ❌ |
| Hapus Galeri | ✅ | ❌ |
| Baca Berita | ✅ | ✅ |
| Komentar Berita | ✅ | ✅ |

## Troubleshooting

### Folder storage tidak bisa diakses
```bash
# Re-run storage:link
php artisan storage:link
```

### Database error
- Pastikan MySQL berjalan di XAMPP
- Cek konfigurasi DB_* di file `.env`
- Jalankan: `php artisan migrate --fresh`




## Kontribusi

Untuk berkontribusi:
1. Buat branch baru (`git checkout -b feature/fitur-baru`)
2. Commit perubahan (`git commit -m 'Tambah fitur'`)
3. Push ke branch (`git push origin feature/fitur-baru`)
4. Buat Pull Request



## Entity Relationship Diagram (ERD)

<img width="1366" height="768" alt="Screenshot (7)" src="https://github.com/user-attachments/assets/8d648545-832d-4650-97c2-90735511f1f4" />

## Use Cases dan Alur Sistem
### Diagram Sistem
<img width="4096" height="221" alt="uml2" src="https://github.com/user-attachments/assets/dba6f2a2-4720-4757-9ffe-3cfd768ac6a0" />

# PPID Main — Aplikasi Website PPID

## Deskripsi Singkat
Aplikasi website pengelolaan PPID (Pejabat Pengelola Informasi dan Dokumentasi) dengan fitur galeri, manajemen konten, dan hak akses berbasis role (admin vs publik).

## Fitur Utama
- 📰 CRUD Berita/Artikel dengan gambar
- 💬 Sistem Komentar pada berita
- 🖼️ Manajemen Galeri Foto kegiatan
- 📋 Penyimpanan Dasar Hukum (regulasi)
- 📑 Penyimpanan SOP PPID
- 👥 Manajemen User dengan role-based access
- 🔐 Autentikasi login & reset password
- 📱 Tampilan responsif (Mobile-friendly)

## Tech Stack
- **Framework:** Laravel 10.x
- **Database:** MySQL
- **Frontend:** Blade Template Engine + Bootstrap 5
- **Server:** Apache (XAMPP)
- **Language:** PHP 8.x

---

## 📊 Use Case & Alur Sistem

### 1️⃣ Alur Pengunjung (User/Guest)

#### Use Case Pengunjung:
```
┌─────────────────────────────────────────┐
│     PENGUNJUNG WEBSITE PPID            │
├─────────────────────────────────────────┤
│ ✓ Lihat Halaman Beranda                │
│ ✓ Membaca Daftar Berita/Artikel        │
│ ✓ Membaca Detail Berita Lengkap        │
│ ✓ Memberikan Komentar (jika login)     │
│ ✓ Lihat Daftar Galeri Foto             │
│ ✓ Lihat Dokumentasi Dasar Hukum        │
│ ✓ Download File Dasar Hukum (PDF)      │
│ ✓ Lihat Dokumentasi SOP PPID           │
│ ✓ Download File SOP PPID (PDF)         │
│ ✓ Login dengan Email & Password        │
│ ✓ Reset Password (Lupa Password)       │
└─────────────────────────────────────────┘
```

#### Alur Pengunjung Browsing Konten:
```
START
  ↓
[Buka Website PPID]
  ↓
[Lihat Halaman Beranda]
  ↓
  ├─→ [Menu BERITA]
  │     ↓
  │   [Lihat Daftar Berita]
  │     ↓
  │   [Pilih & Baca Berita]
  │     ↓
  │   [Lihat Komentar]
  │     ├─→ Ingin Komentar? 
  │     │     ├─ YA  → [Login] → [Tulis Komentar] → [Submit] → DB
  │     │     └─ TIDAK → [Lanjut]
  │     ↓
  │   [Kembali ke Daftar]
  │
  ├─→ [Menu GALERI]
  │     ↓
  │   [Lihat Daftar Galeri Foto]
  │     ↓
  │   [Klik Foto untuk Detail]
  │     ↓
  │   [Lihat Informasi Kegiatan & Tanggal]
  │
  ├─→ [Menu DOKUMEN]
  │     ├─→ [Dasar Hukum]
  │     │     ↓
  │     │   [Lihat Daftar Undang-Undang]
  │     │     ↓
  │     │   [Download File PDF]
  │     │
  │     └─→ [SOP PPID]
  │           ↓
  │         [Lihat Daftar SOP]
  │           ↓
  │         [Download File PDF]
  │
  └─→ [Logout / Tutup]
END
```

#### Alur Login Pengunjung:
```
START
  ↓
[Klik Tombol Login]
  ↓
[Masukkan Email & Password]
  ↓
[Submit Form]
  ↓
[Sistem Verifikasi Kredensial ke Database]
  ↓
Login Berhasil? 
  ├─ YA  → [Generate Session Token] → [Redirect ke Dashboard] ✓
  └─ TIDAK → [Tampilkan Error Message] → [Kembali ke Form Login]
END
```

---

### 2️⃣ Alur Admin (Administrator PPID)

#### Use Case Admin:
```
┌────────────────────────────────────────────────┐
│     ADMIN PPID (All User Permissions +)       │
├────────────────────────────────────────────────┤
│ ✓ Semua akses Pengunjung (lihat konten)       │
│ ✓ Buat Berita/Artikel Baru                    │
│ ✓ Edit Berita yang Sudah Ada                  │
│ ✓ Hapus Berita                                │
│ ✓ Kelola Komentar (Hapus/Moderate)            │
│ ✓ Buat Galeri Baru                            │
│ ✓ Edit Galeri                                 │
│ ✓ Hapus Galeri & Foto                         │
│ ✓ Upload Dasar Hukum (PDF)                    │
│ ✓ Edit/Hapus Dasar Hukum                      │
│ ✓ Upload SOP PPID (PDF)                       │
│ ✓ Edit/Hapus SOP PPID                         │
│ ✓ Lihat Daftar User                           │
│ ✓ Ubah Role User (Admin/User)                 │
│ ✓ Hapus User                                  │
│ ✓ Lihat Dashboard & Statistik                 │
└────────────────────────────────────────────────┘
```

#### Alur Admin - Kelola Berita:
```
START
  ↓
[Admin Login]
  ↓
[Akses Dashboard Admin]
  ↓
[Pilih Menu "Kelola Berita"]
  ↓
[Lihat Daftar Berita]
  ↓
Pilih Aksi:
  │
  ├─→ [BUAT BERITA BARU]
  │     ↓
  │   [Klik Tombol "+ Tambah Berita"]
  │     ↓
  │   [Buka Form Berita]
  │     ↓
  │   [Isi: Judul, Isi/Teks, Penulis, Tanggal]
  │     ↓
  │   [Upload Gambar Berita]
  │     ↓
  │   [Klik Submit]
  │     ↓
  │   [Validasi Form (Server-side)]
  │     ├─ VALID → [Simpan ke Database] → [Tampilkan Success] ✓
  │     └─ ERROR → [Tampilkan Error Message] → [Kembali ke Form]
  │
  ├─→ [EDIT BERITA]
  │     ↓
  │   [Pilih Berita dari Daftar]
  │     ↓
  │   [Klik Tombol "Edit"]
  │     ↓
  │   [Buka Form Edit (Pre-filled Data)]
  │     ↓
  │   [Ubah Data yang Diperlukan]
  │     ↓
  │   [Update Gambar (Opsional)]
  │     ↓
  │   [Klik Submit]
  │     ↓
  │   [Update Database] → [Hapus Gambar Lama] → [Success] ✓
  │
  └─→ [HAPUS BERITA]
        ↓
      [Pilih Berita]
        ↓
      [Klik Tombol "Hapus"]
        ↓
      [Konfirmasi: "Yakin ingin hapus?"]
        ├─ YA  → [Hapus dari Database] → [Hapus File Gambar] → [Success] ✓
        └─ TIDAK → [Batal]
END
```

#### Alur Admin - Kelola Galeri:
```
START
  ↓
[Pilih Menu "Kelola Galeri"]
  ↓
[Lihat Daftar Galeri]
  ↓
Pilih Aksi:
  │
  ├─→ [BUAT GALERI]
  │     ↓
  │   [Form: Judul, Kegiatan, Tanggal, Foto]
  │     ↓
  │   [Upload Foto]
  │     ↓
  │   [Simpan ke Database & Storage]
  │
  ├─→ [EDIT GALERI]
  │     ↓
  │   [Ubah Data & Foto]
  │     ↓
  │   [Update Database]
  │
  └─→ [HAPUS GALERI]
        ↓
      [Hapus dari Database & Storage]
END
```

#### Alur Admin - Kelola User:
```
START
  ↓
[Pilih Menu "Kelola User"]
  ↓
[Lihat Daftar User dengan Role]
  ↓
Pilih Aksi:
  │
  ├─→ [UBAH ROLE USER]
  │     ↓
  │   [Pilih User dari Daftar]
  │     ↓
  │   [Pilih Role: "Admin" atau "User"]
  │     ↓
  │   [Klik Ubah]
  │     ↓
  │   [Update Database] ✓
  │
  └─→ [HAPUS USER]
        ↓
      [Pilih User]
        ↓
      [Konfirmasi Penghapusan]
        ↓
      [Hapus User + Destroy Session] ✓
END
```

---

## 🗄️ Database Schema

```
┌──────────────┐
│    users     │
├──────────────┤
│ id (PK)      │
│ name         │
│ email        │
│ password     │
│ role         │ ← admin / user
│ created_at   │
│ updated_at   │
└──────────────┘
       ↑
       │ (1 admin has many)
       │
   ┌───┴─────────────────┬─────────────────┐
   │                     │                 │
┌──┴──────┐      ┌───────┴───┐      ┌─────┴─────┐
│ beritas  │      │ comments  │      │ sessions  │
├──────────┤      ├───────────┤      ├───────────┤
│ id (PK)  │      │ id (PK)   │      │ id (PK)   │
│ judul    │      │ berita_id │      │ user_id   │
│ foto     │      │ user_id   │      │ payload   │
│ teks     │      │ content   │      │ ip_addr   │
│ penulis  │      │ created_at│      │ last_act  │
│ tanggal  │      │ updated_at│      └───────────┘
│ created  │      └───────────┘
│ updated  │
└──────────┘
     ↑
     └─→ Relationships FK

┌──────────────┐
│   galeris    │
├──────────────┤
│ id (PK)      │
│ judul        │
│ kegiatan     │
│ tanggal      │
│ foto         │
│ created_at   │
│ updated_at   │
└──────────────┘

┌────────────────────┐
│  dasar_hukums      │
├────────────────────┤
│ id (PK)            │
│ title              │
│ file (PDF)         │
│ created_at         │
│ updated_at         │
└────────────────────┘

┌────────────────────┐
│    sop_ppids       │
├────────────────────┤
│ id (PK)            │
│ title              │
│ file (PDF)         │
│ created_at         │
│ updated_at         │
└────────────────────┘
```

---

## 🔐 Kontrol Akses (Role-Based Access Control)

| Fitur | Guest | User | Admin |
|-------|-------|------|-------|
| Lihat Berita | ✓ | ✓ | ✓ |
| Buat Berita | ✗ | ✗ | ✓ |
| Edit Berita | ✗ | ✗ | ✓ |
| Hapus Berita | ✗ | ✗ | ✓ |
| Beri Komentar | ✗ | ✓ | ✓ |
| Kelola Galeri | ✗ | ✗ | ✓ |
| Kelola User | ✗ | ✗ | ✓ |
| Download Dokumen | ✓ | ✓ | ✓ |

---

## 🚀 Instalasi (Windows - XAMPP)

1. **Konfigurasi Awal**
   ```bash
   cd c:\xampp\htdocs\ppid-main
   composer install
   copy .env.example .env
   ```

2. **Setup Database**
   - Edit `.env` → set `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

3. **Jalankan Aplikasi**
   ```bash
   php artisan storage:link
   php artisan serve
   ```
   Akses: `http://localhost:8000`

---

## 👤 Membuat Akun Admin

```bash
php artisan tinker
\App\Models\User::create([
    'name' => 'Admin PPID',
    'email' => 'admin@ppid.com',
    'password' => bcrypt('password123'),
    'role' => 'admin'
]);
exit
```

---

## 📁 Struktur Project

```
ppid-main/
├── app/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Berita.php
│   │   ├── Comment.php
│   │   └── ...
│   └── Http/Controllers/
├── resources/views/
│   ├── layouts/
│   ├── berita/
│   ├── galeri/
│   ├── auth/
│   └── ...
├── routes/
│   └── web.php
├── database/
│   └── migrations/
├── public/
│   └── storage/ → uploads
└── storage/
    └── app/public/
```

---

## 🎯 Fitur Lanjutan

- **Email Verification** → Verifikasi email saat registrasi
- **Password Reset** → Forgot password dengan link email
- **File Upload** → Gambar & PDF ke storage publik
- **Responsive Design** → Mobile, tablet, desktop
- **Session Management** → Auto-logout & remember-me

---

