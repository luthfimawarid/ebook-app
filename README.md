# 📚 EbookApp  
Aplikasi web untuk membaca Ebook secara aman tanpa bisa diunduh atau disalin teksnya, serta menampilkan peringatan (popup) jika pengguna berpindah tab saat membaca.  

---

## 🚀 Fitur Utama
- 🔐 **Login & Register** menggunakan session Laravel.
- 🏠 **Dashboard** dengan tabel daftar Ebook.
- 📤 **Upload Ebook (PDF)** melalui form, tersimpan di database dan storage.
- 📖 **View PDF** langsung di halaman yang sama (tidak membuka tab baru).
- ⛔ **Proteksi PDF** — tidak bisa diunduh atau di-copy tulisannya.
- ⚠️ **Warning Tab Change** — muncul popup jika user berpindah tab saat membaca.
- 🚪 **Logout** session dengan aman.

---

## 🧰 Teknologi yang Digunakan
- **Laravel 12** (PHP Framework)
- **Bootstrap 5.3** (Frontend UI)
- **MySQL / MariaDB** (Database)
- **JavaScript (Native)** — untuk proteksi dan event warning

---

## ⚙️ Persiapan Awal
Pastikan sudah terpasang:
- PHP ≥ 8.2
- Composer
- MySQL / MariaDB
- Git (opsional)
- Node.js (opsional, jika ingin compile asset frontend)

---

## 💡 Langkah Instalasi
### 1️⃣ Clone Repository
```bash
git clone https://github.com/username/ebook-app.git
cd ebook-app
```

### 2️⃣ **Install Dependency**
```bash
composer install
```

### 3️⃣ Konfigurasi Environment
```bash
Salin file .env.example menjadi .env:

Buka file .env dan ubah pengaturan database sesuai dengan lokal kamu, contoh:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ebookapp
DB_USERNAME=root
DB_PASSWORD=
```

4️⃣ Generate Application Key
```bash
php artisan key:generate
```

5️⃣ Migrasi Database
```bash
php artisan migrate
```

6️⃣ (Opsional) Buat Storage Link

Jika ingin menyimpan PDF di folder storage/app/public:
```bash
php artisan storage:link
```

7️⃣ Jalankan Server Lokal
```bash
php artisan serve
```

Lalu buka di browser:

```bash
http://127.0.0.1:8000
```
