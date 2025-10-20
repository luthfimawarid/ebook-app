# EbookApp 📚
Aplikasi web untuk membaca Ebook secara aman tanpa bisa di-download dan di-copy.

## Fitur
- Login & Register dengan session
- Dashboard dengan upload dan list Ebook
- Proteksi PDF (tidak bisa di-download/copy)
- Warning popup saat pindah tab

## Teknologi
- Laravel 11
- Bootstrap 5

## Cara Jalankan
1. `composer install`
2. `cp .env.example .env`
3. `php artisan key:generate`
4. `php artisan migrate`
5. `php artisan serve`
