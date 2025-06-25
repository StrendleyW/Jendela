# Jendela - Portal Berita dan Cek Fakta dengan Laravel & Filament Admin Panel
Jendela adalah sebuah aplikasi portal berita dan cek fakta yang dibangun menggunakan framework Laravel 11. Aplikasi ini dilengkapi dengan panel admin yang canggih dan responsif berkat Filament, memungkinkan manajemen konten yang mudah dan efisien.

## 🌟 Tentang Proyek
Proyek ini bertujuan untuk menyediakan platform portal berita yang cepat, aman, dan mudah digunakan, baik dari sisi pembaca maupun dari sisi administrator. Proyek ini menyediakan wadah untuk portal berita artikel biasa dan juga artikel cek fakta. Proyek ini dilengkapi dengan berbagai fitur seperti sortir berita, search berita, bahkan pemberian tag kategori ke setiap berita yang diupload. Pembaca dapat dengan nyaman menjelajahi berita terbaru, melihat detail artikel, dan memberikan komentar. Sementara itu, admin memiliki kontrol penuh atas seluruh konten melalui dasbor admin yang intuitif.

### Dibangun Dengan
-   [**Laravel 11**](https://laravel.com/) - Framework PHP yang elegan dan ekspresif.
-   [**Filament 3**](https://filamentphp.com/) - Admin panel yang powerful untuk Laravel TALL Stack.
-   **Livewire** - Framework full-stack untuk membangun antarmuka dinamis.
-   **Disquss** - Layanan hosting komentar untuk pengguna menambahkan komentar di website.
-   **Alpine.JS** - Framework JavaScript minimalis.
-   **SQLlite** - Sistem manajemen basis data relasional.

## ✨ Fitur Utama
-   **Tampilan Publik**: Halaman depan yang bersih untuk menampilkan berita kepada pembaca.
-   **Halaman Detail Berita**: Setiap berita memiliki halaman khususnya sendiri.
-   **Sistem Komentar**: Pengguna dapat mendaftar, login, dan berpartisipasi dalam diskusi di setiap berita menggunakan pihak ke tiga (Disquss).
-   **Halaman Cek Fakta**: Halaman untuk pengguna mengecek fakta/hoax nya sebuah artikel.
-   **Panel Admin Canggih**:
    -   Manajemen Berita dan Cek Fakta (CRUD - Create, Read, Update, Delete).
    -   Manajemen Pengguna (Admin & Tamu).
-   **Fitur Pencarian**: Memudahkan pembaca mencari berita berdasarkan kata kunci.
-   **Top Picks**: Menampilkan berita yang sedang populer.
-   **Sortir**: Menyortir berita berdasarkan kategori dan tanggal upload.

## 🚀 Instalasi & Konfigurasi
Untuk menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut.

### Prasyarat
Pastikan server lokal Anda (seperti XAMPP, Laragon, atau Valet) memenuhi persyaratan berikut:
-   PHP 8.3 atau lebih tinggi
-   Composer
-   Node.js & NPM

### Langkah-langkah Instalasi
1.  **Clone Repository**
    ```bash
    git clone [https://github.com/syahbagus/winninews.git](https://github.com/syahbagus/winninews.git)
    cd winninews
    ```
2.  **Install Dependensi PHP & JavaScript**
    ```bash
    composer install
    npm install
    ```
3.  **Buat & Konfigurasi File Environment**
    Salin file `.env.example`, lalu generate kunci aplikasi.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    Buka file `.env` dan sesuaikan konfigurasi database Anda.
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=root
    DB_PASSWORD=
    ```
4.  **Jalankan Migrasi & Seeder Database**
    ```bash
    php artisan migrate --seed
    ```

5.  **Buat Symbolic Link untuk Storage**
    ```bash
    php artisan storage:link
    ```

6.  **Jalankan Aplikasi**
    Buka **dua terminal terpisah**:

    -   Terminal 1 (Vite):
        ```bash
        npm run dev
        ```
    -   Terminal 2 (Laravel):
        ```bash
        php artisan serve
        ```

### Akses Aplikasi
7.  **Akses Aplikasi**

-   **Halaman Publik**: [http://127.0.0.1:8000](http://127.0.0.1:8000)
-   **Panel Admin**: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

8. **Gunakan kredensial berikut untuk login sebagai admin di panel admin**

-   **Email:** `admin12345@gmail.com`
-   **Password:** `admin12345`

---
