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



exit
```

**Default Login**: 
- Email: `admin1@ppidgarut.com`
- Password: `admin123`

## 📁 Struktur Folder Penting

```
ppid-main/
├── app/
│   ├── Http/Controllers/    # Kontroller aplikasi
│   └── Models/              # Model database (Berita, Galeri, etc)
├── database/
│   ├── migrations/          # File migrasi database
│   └── seeders/             # File seeder data
├── resources/
│   ── views/               # Blade template (UI),Style
├── routes/
│   └── web.php              # Route web aplikasi
└── storage/
    └── app/public/          # File upload (foto galeri, dokumen)
```

## 🔑 Akses Fitur Berdasarkan Role

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
