# SISFO Akademik – Laravel (Blade + Middleware + MySQL)

## Cara pasang
1. `composer create-project laravel/laravel sisfo && cd sisfo`
2. Salin SEMUA isi folder ini ke dalam project (timpa `routes/web.php` & `database/seeders/DatabaseSeeder.php`).
3. Buat database MySQL `sisfo`, lalu edit `.env`:
   DB_CONNECTION=mysql  DB_HOST=127.0.0.1  DB_PORT=3306  DB_DATABASE=sisfo  DB_USERNAME=root  DB_PASSWORD=
4. `php artisan migrate --seed`
5. `php artisan serve` → buka http://127.0.0.1:8000
   Login: admin@sisfo.test / password

Template SB Admin 2 sudah ada di `public/sb-admin-2/`.
Middleware: `app/Http/Middleware/AdminOnly.php` (dipakai langsung di routes/web.php, tidak perlu daftar alias).
