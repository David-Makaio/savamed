# Savamed - Sistem Manajemen Inventaris Apotek

Sistem Manajemen Inventaris Apotek (PharmaCare) adalah aplikasi berbasis web modern yang dirancang untuk membantu petugas apotek mengelola stok obat dengan efisien, aman, dan transparan. Proyek ini dibangun sebagai bagian dari tugas seleksi magang dengan fokus pada performa dan integrasi database yang kuat.

## ✨ Fitur Unggulan

- **Landing Page & Dashboard:** Antarmuka modern dengan statistik ringkas.
- **Autentikasi User:** Sistem Login dan Register yang aman untuk petugas resmi.
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
1. **`kategori`**: Menyimpan nama kategori terapi (contoh: *Antibiotics*, *Dermatology*).
2. **`barang`**: Menyimpan data obat seperti nama, harga, stok, dan tanggal kedaluwarsa. Memiliki relasi `kategori_id` ke tabel kategori.
3. **`histori`**: Menyimpan log aktivitas: siapa yang mengubah data, kapan, dan berapa perubahan stoknya.

## 🚀 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

1. **Clone Repositori**
   ```
   git clone [https://github.com/username/phamacare-inventory.git](https://github.com/username/phamacare-inventory.git)
   cd phamacare-inventory

2. Install Dependency
   ```
   composer install
   npm install && npm run build

3. Konfigurasi Environment
   ```
   cp .env.example .env
   php artisan key:generate

4. Migrasi Database dan Seeding
   ```
   php artisan migrate:fresh --seed

5. Jalankan Aplikasi
   ```
   php artisan serve


## Contoh Data
Untuk memudahkan anda mengetes fitur fitur dalam website ini, saya memberikan contoh data yang dapat digunakan untuk mengisi form form pada website saya, filenya terletak di folder examples/
