# Sistem Manajemen Produk

Aplikasi berbasis web untuk mengelola data produk menggunakan Laravel. Proyek ini mendukung operasi CRUD (Create, Read, Update, Delete) dengan desain antarmuka modern menggunakan Tailwind CSS.

---

## ✨ Fitur Utama

- ✅ Tambah produk
- ✅ Lihat daftar produk
- ✅ Edit informasi produk
- ✅ Hapus produk
- ✅ Upload dan tampilkan gambar produk
- ✅ Tampilan responsive berbasis grid

---

## 🛠️ Tech Stack

- **Backend:** Laravel 10
- **Database:** MySQL
- **Frontend:** Tailwind CSS + Flowbite (CDN)

---

## ⚙️ Instalasi

Pastikan kamu sudah menginstal PHP, Composer, Node.js, dan MySQL.

1. **Clone repositori:**

   ```bash
   git clone https://github.com/username-kamu/nama-repo-kamu.git
   cd nama-repo-kamu
   ```

2. **Install dependensi Laravel:**

   ```bash
   composer install
   ```

3. **Salin file `.env` dan sesuaikan konfigurasi database:**

   ```bash
   cp .env.example .env
   ```

4. **Generate key dan migrate database:**

   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. **Jalankan server:**

   ```bash
   php artisan serve
   ```