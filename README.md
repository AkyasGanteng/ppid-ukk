# 📋 Aplikasi Website PPID

Aplikasi web pengelolaan **PPID (Pejabat Pengelola Informasi dan Dokumentasi)** dengan fitur manajemen konten, galeri, berita, dan sistem hak akses admin.

## ✨ Fitur Utama

- 🖼️ **Manajemen Galeri** - Upload, edit, dan hapus foto dengan informasi kegiatan
- 📰 **Berita & Artikel** - CRUD berita dengan sistem komentar
- 📄 **Dasar Hukum** - Penyimpanan dokumen regulasi dan undang-undang
- 📋 **SOP PPID** - Dokumentasi Standard Operating Procedures
- 🔐 **Sistem Autentikasi** - Role-based access control (Admin & User)
- 📱 **Responsive Design** - Interface modern dengan Bootstrap
- 💾 **File Management** - Penyimpanan aman di storage/public

## 🛠️ Stack Teknologi

- **Backend**: Laravel 11 (PHP)
- **Frontend**: Blade Templates + Bootstrap 5
- **Database**: MySQL
- **Build Tool**: Vite (Asset bundling)
- **Package Manager**: Composer, npm

## 📋 Persyaratan Sistem

- Windows 10/11
- XAMPP (Apache + MySQL 5.7+)
- PHP 8.2+
- Composer
- Node.js & npm (opsional, untuk asset compilation)
- Git

## 🚀 Cara Instalasi

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

# Install package JavaScript (opsional)
npm install
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

### 7. Build Assets (Opsional)
```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Jalankan Aplikasi
```bash
# Opsi 1: Menggunakan Artisan Server
php artisan serve
# Akses: http://localhost:8000

# Opsi 2: Menggunakan XAMPP
# Akses: http://localhost/ppid-main/public
```

## 👤 Membuat Akun Admin

### Menggunakan Seeder
```bash
php artisan db:seed --class=AdminUserSeeder
```

### Menggunakan Tinker
```bash
php artisan tinker

# Copy-paste kode berikut:
\App\Models\User::create([
    'name' => 'Administrator',
    'email' => 'admin@ppid.local',
    'password' => bcrypt('password123'),
    'role' => 'admin'
]);

exit
```

**Default Login**: 
- Email: `admin@ppid.local`
- Password: `password123`

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
│   ├── views/               # Blade template (UI)
│   ├── css/                 # Stylesheet
│   └── js/                  # JavaScript
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

## 🔧 Troubleshooting

### Folder storage tidak bisa diakses
```bash
# Re-run storage:link
php artisan storage:link
```

### Database error
- Pastikan MySQL berjalan di XAMPP
- Cek konfigurasi DB_* di file `.env`
- Jalankan: `php artisan migrate --fresh`

### Permission denied di folder storage
```bash
# Windows (Jalankan cmd as Administrator)
icacls "storage" /grant Everyone:F /T
```

## 📝 Lisensi

Proyek ini menggunakan Laravel Framework yang dilisensikan di bawah MIT License.

## 👨‍💻 Kontribusi

Untuk berkontribusi:
1. Buat branch baru (`git checkout -b feature/fitur-baru`)
2. Commit perubahan (`git commit -m 'Tambah fitur'`)
3. Push ke branch (`git push origin feature/fitur-baru`)
4. Buat Pull Request

## 📞 Support & Kontak

Untuk bantuan atau pertanyaan, silakan hubungi tim development.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
