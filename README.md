
# Sistem Pengajuan Pembelian Kendaraan dengan Laravel 10
## Deskripsi Proyek
Proyek ini merupakan implementasi sistem pengajuan pembelian kendaraan menggunakan framework Laravel versi 10. Sistem ini dirancang untuk memudahkan proses pengajuan pembelian kendaraan, mulai dari pengajuan permintaan hingga persetujuan final.

### Fitur Utama
1. Manajemen Pengajuan: Seluruh user dapat melihat, mengubah, dan menghapus data pengajuan.
2. Approval Pengajuan: Hanya atasan yang dapat melakukan approval.

### Teknologi yang Digunakan
1. Laravel 10: Menggunakan versi terbaru dari Laravel sebagai framework utama.
2. Database MySQL: Menyimpan data pengajuan dan informasi kendaraan.
3. Bootstrap: Meningkatkan antarmuka pengguna dengan desain responsif.


### Panduan Instalasi
Pastikan sudah terinstal Composer dan PHP.
Clone repositori ini ke dalam direktori lokal Anda.

```
git clone https://github.com/nama_pengguna/repo.git
```
Pindah ke direktori proyek.

```
cd nama_repo
```
Salin file .env.example menjadi .env dan konfigurasikan database.

```
cp .env.example .env
```

Instal dependencies menggunakan Composer.

```
composer install
```
Generate key aplikasi.
```
php artisan key:generate
```
Migrasikan database.
```
php artisan migrate
```
Jalankan server pengembangan.
```
php artisan serve

```