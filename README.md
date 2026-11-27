# Aplikasi Pendataan Anggota

Aplikasi web sederhana untuk mengelola data anggota, dibuat sebagai latihan PHP dan MySQL.

## Fitur
- Login dan logout
- Tambah, lihat, ubah, dan hapus data
- Pencarian berdasarkan nama atau alamat

## Teknologi
PHP, MySQL (MariaDB), HTML, CSS, XAMPP

## Cara Menjalankan
1. Pasang XAMPP, lalu jalankan Apache dan MySQL.
2. Salin folder proyek ke `C:\xampp\htdocs\pendataan`.
3. Buka `http://localhost/phpmyadmin`, lalu jalankan isi `database.sql` di tab SQL.
4. Buat kode password lewat Command Prompt:
   ```
   C:\xampp\php\php.exe -r "echo password_hash('GantiPasswordIni', PASSWORD_DEFAULT);"
   ```
5. Di phpMyAdmin, pilih database `pendataan`, lalu jalankan (tempel kode hasil langkah 4):
   ```sql
   INSERT INTO pengguna (username, password) VALUES ('admin', 'TEMPEL_KODE_DI_SINI');
   ```
6. Buka `http://localhost/pendataan/` dan login.

## Catatan
Proyek ini untuk latihan. Formulir data sudah dilengkapi token CSRF.

## Pembuat
Muh. Marsuq Saputra