# Savamed - Sistem Manajemen Inventaris Apotek

Sistem Manajemen Inventaris Apotek (Savaned) adalah aplikasi berbasis web modern yang dirancang untuk membantu petugas apotek mengelola stok obat dengan efisien, aman, dan transparan. Proyek ini dibangun sebagai bagian dari tugas seleksi magang dengan fokus pada performa dan integrasi database yang kuat.

## ✨ Fitur Unggulan

- **Multi-tenancy Data Isolation:** - Barang yang ditampilkan difilter secara otomatis berdasarkan `id_apotek` pengguna yang sedang login.
    - Data antar apotek terisolasi sepenuhnya (Apotek A tidak bisa melihat data Apotek B).
- **Sistem Registrasi Terintegrasi:**
    - Pendaftaran akun sekaligus mendaftarkan profil Apotek baru.
    - User pendaftar pertama otomatis mendapatkan role **Admin** disimpan dalam tabel users.
- **Manajemen Inventaris Lengkap (CRUD):**
    - **Join Query:** Menampilkan data obat yang dihubungkan dengan kategori terapi secara relasional.
    - **Pencarian Real-time:** Fitur cari obat instan menggunakan `wire:model.live` tanpa refresh halaman.
    - **Dynamic Dropdown:** Input kategori obat yang sinkron otomatis dengan data di database.
- **Audit Trail (History Log):** Sistem pencatatan otomatis setiap kali ada penambahan atau perubahan stok menggunakan *Laravel Observers*.
- **Soft Deletes:** Fitur penghapusan aman untuk menjaga integritas data medis; data yang "dihapus" tetap tersimpan di database namun disembunyikan dari daftar aktif.
- **Dark Mode Support:** Tampilan yang nyaman di mata dengan dukungan tema gelap dan terang.

## 🛠️ Tech Stack

- **Framework:** [Laravel 13](https://laravel.com)
- **Frontend:** [Livewire Volt + Livewire](https://livewire.laravel.com/docs/volt) (Functional API)
- **Styling:** [Tailwind CSS](https://tailwindcss.com)
- **Database:** MySQL / MariaDB
- **Icons:** Google Material Design Icons

## 📋 Struktur Database

Proyek ini menggunakan skema relasional yang dioptimalkan:
1. **`apotek`**: Menyimpan profil utama apotek.
2. **`users`**: Terikat pada `id_apotek`. Memiliki role (Admin/Staff).
3. **`kategori`**: Menyimpan nama kategori terapi (contoh: *Antibiotics*, *Dermatology*).
4.  **`barang`**: Menyimpan data obat seperti nama, harga, stok, dan tanggal kedaluwarsa. Memiliki relasi `kategori_id` ke tabel kategori.
5. **`histori`**: Menyimpan log aktivitas: siapa yang mengubah data, kapan, dan berapa perubahan stoknya.

## 🚀 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

1. **Clone Repositori**
   ```
   git clone [https://github.com/David-Makaio/savamed]
   cd savamed
   ```

2. Install Dependency
   ```
   composer install
   npm install && npm run build
   ```

4. Konfigurasi Environment
   ```
   cp .env.example .env
   php artisan key:generate
   ```

5. Migrasi Database dan Seeding
   ```
   php artisan migrate:fresh --seed
   ```

6. Jalankan Aplikasi
   ```
   php artisan serve
   ```


## Contoh Data
Untuk memudahkan anda mengetes fitur fitur dalam website ini, saya memberikan contoh data yang dapat digunakan untuk mengisi form form pada website saya, filenya terletak di folder examples/
