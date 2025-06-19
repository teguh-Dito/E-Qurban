# 🕌 E-Qurban - Sistem Manajemen Qurban Terintegrasi

**E-Qurban** adalah aplikasi web lengkap yang dibangun menggunakan **CodeIgniter 4** untuk mengelola seluruh proses qurban, mulai dari pendaftaran peserta, pencatatan keuangan, hingga distribusi daging yang adil dan dapat dilacak menggunakan QR Code. Aplikasi ini dirancang untuk memudahkan panitia dalam mengelola data secara efisien dan memberikan transparansi kepada para peserta qurban dan warga.

Status Proyek: 
🚧 **Belym Selesai Dikembangkan**
**Bermasalah di chillerlan/php-qrcode**

---

## 🚀 Teknologi yang Digunakan

* **Framework**: CodeIgniter 4
* **Autentikasi**: Myth:Auth
* **Frontend**: Bootstrap 4 (SB Admin 2 Template)
* **Database**: MySQL/MariaDB
* **QR Code Library**: `chillerlan/php-qrcode`

---

## ✨ Fitur Utama

Aplikasi ini memiliki serangkaian fitur yang dirancang untuk berbagai peran pengguna, memastikan alur kerja yang terorganisir.

### 1. Manajemen Pengguna (Khusus Admin)
* **CRUD Pengguna**: Admin dapat melihat daftar lengkap pengguna, mencari, dan memfilter berdasarkan peran (admin, panitia, pekurban, warga).
* **Detail Pengguna**: Menampilkan informasi detail setiap pengguna, termasuk nama, email, foto profil, dan tanggal terdaftar.
* **Manajemen Peran (Roles)**: Admin memiliki hak penuh untuk menetapkan atau mengubah peran (seperti menjadikan warga sebagai panitia) langsung dari halaman detail pengguna.

### 2. Pendataan Peserta Qurban (Admin & Panitia)
* **Pendaftaran Manual**: Panitia dapat menambahkan peserta qurban secara manual, baik untuk kambing maupun sapi.
* **Validasi Unik**: Sistem memastikan setiap hewan kambing memiliki *tag* unik untuk pelacakan yang akurat.
* **Manajemen Grup Sapi**: Untuk qurban sapi, sistem secara otomatis membuat dan mengelola grup (misal: Sapi A, Sapi B) dan memastikan satu grup tidak melebihi 7 peserta.
* **Verifikasi Pembayaran**: Panitia dapat mengubah status pembayaran peserta dari "unpaid" menjadi "paid" (lunas) dengan satu klik.
* **Rekap Dana Qurban**: Dashboard menampilkan total dana qurban yang terkumpul dari peserta yang telah lunas.

### 3. Manajemen Keuangan (Admin & Panitia)
* **Pencatatan Pengeluaran**: Panitia dapat mencatat semua biaya operasional, seperti pembelian kantong plastik, tali, pisau, dan lain-lain.
* **Rekap Keuangan Otomatis**: Sistem secara otomatis menampilkan:
    * Total dana administrasi yang masuk (dari biaya admin pendaftaran qurban).
    * Total semua pengeluaran yang telah dicatat.
    * Sisa saldo dana administrasi.

### 4. Manajemen Distribusi Daging (Admin & Panitia)
* **Alokasi Daging Otomatis**:
    * Panitia cukup memasukkan total berat bersih daging (untuk kambing atau sapi).
    * Sistem akan secara otomatis membagi daging berdasarkan syariat: **1/3** untuk pekurban dan **2/3** untuk dibagikan kepada warga dan panitia.
* **Pembuatan QR Code**: Setiap alokasi daging secara otomatis menghasilkan **QR Code unik** yang berfungsi sebagai kupon digital.
* **Pelacakan Real-time**: Dashboard distribusi menampilkan daftar penerima, jatah berat, dan status pengambilan (`pending` atau `distributed`).
* **Verifikasi via Scan**: Panitia dapat menggunakan halaman pemindai untuk memverifikasi QR Code saat warga mengambil jatah daging.
* **Aksi Massal**: Untuk efisiensi, panitia dapat menandai semua jatah sebagai "sudah diambil" atau me-reset semua status kembali ke "pending" dengan satu klik.

### 5. Fitur Pengguna (Warga & Pekurban)
* **Pendaftaran Qurban Mandiri**: Warga dapat mendaftar qurban secara mandiri melalui profil mereka, memilih jenis hewan dan jumlah bagian (untuk sapi).
* **Profil Pengguna**: Setiap pengguna memiliki halaman profil yang menampilkan riwayat qurban dan riwayat penerimaan daging.
* **Kartu Daging Digital (QR Code)**: Jika pengguna berhak menerima daging, kartu digital berisi QR Code akan tersedia di profil mereka untuk ditunjukkan kepada panitia atau diunduh.

---

## 🔄 Alur Kerja Aplikasi

1.  **Inisiasi**: Admin mendaftarkan semua akun untuk warga dan panitia melalui sistem.
2.  **Pendaftaran Qurban**:
    * **Online**: Warga login dan mendaftar qurban melalui menu profil. Status pembayaran otomatis "unpaid".
    * **Offline**: Panitia mendaftarkan peserta yang membayar tunai melalui menu "Data Peserta Qurban".
3.  **Pembayaran**: Panitia melakukan konfirmasi pembayaran di menu "Data Peserta Qurban" untuk mengubah status menjadi "paid".
4.  **Pencatatan Biaya**: Selama persiapan, panitia mencatat semua pengeluaran di menu "Keuangan & Barang".
5.  **Hari H - Penimbangan & Alokasi**:
    * Setelah penyembelihan, panitia menimbang total berat bersih daging per jenis hewan (kambing dan sapi).
    * Panitia memasukkan total berat tersebut ke menu "Pembagian Daging". Sistem secara otomatis menghitung jatah per orang dan menghasilkan QR Code.
6.  **Distribusi**:
    * Warga dan pekurban melihat jatah daging dan QR Code mereka di halaman profil.
    * Saat pengambilan, warga menunjukkan QR Code (dari HP atau cetak) kepada panitia.
    * Panitia menggunakan fitur "Scan QR Code" untuk verifikasi. Jika valid, status pengambilan otomatis berubah menjadi "distributed".

---

## ⚙️ Instalasi & Konfigurasi

Untuk menjalankan proyek ini di lingkungan lokal, ikuti langkah-langkah berikut:

1.  **Prasyarat**:
    * PHP 8.1 atau lebih tinggi
    * Composer
    * Web Server (XAMPP, dll.)
    * Database (MySQL/MariaDB)

2.  **Langkah-langkah Instalasi**:
    * *Clone* repositori ini.
    * Jalankan `composer install` di direktori proyek untuk mengunduh semua dependensi.
    * Buat database baru di phpMyAdmin dengan nama `ci4login`.
    * Impor file `ci4login.sql` ke dalam database yang baru dibuat. File ini berisi semua tabel yang dibutuhkan beserta data pengguna default.
    * Salin file `env` menjadi `.env` dan sesuaikan konfigurasi berikut:
        ```env
        CI_ENVIRONMENT = development

        # Atur base URL sesuai dengan server lokal Anda
        app.baseURL = 'http://localhost:8080/'

        # Konfigurasi koneksi database
        database.default.hostname = localhost
        database.default.database = ci4login
        database.default.username = root
        database.default.password = 
        database.default.DBDriver = MySQLi
        ```
       
    * Buka file `app/Config/App.php` dan pastikan `sessionSavePath` sesuai dengan konfigurasi XAMPP Anda.
        ```php
        public string $sessionSavePath = 'C:\\xampp\\tmp';
        ```
       
    * Jalankan server pengembangan CodeIgniter melalui terminal:
        ```bash
        php spark serve
        ```
    * Aplikasi sekarang dapat diakses di `http://localhost:8080`.

---

## 👥 Data Pengguna Default

Total **60 pengguna** telah disiapkan, terbagi menjadi beberapa peran.

* **Admin (1 Orang)**
    * **Email**: `admin1@gmail.com`
    * **Username**: `admin1`
    * **Password**: `fullakses1`

* **Pekurban (9 Orang)**: Pengguna yang sudah terdaftar sebagai peserta qurban.
    * **Username**: `warga01` hingga `warga09`
    * **Email**: `warga01@gmail.com` hingga `warga09@gmail.com`
    * **Password**: `MasyarakatRT01` hingga `MasyarakatRT09`

* **Panitia (15 Orang)**: Memiliki akses ke manajemen qurban, keuangan, dan distribusi.
    * **Username**: `warga10` hingga `warga24`
    * **Email**: `warga10@gmail.com` hingga `warga24@gmail.com`
    * **Password**: `MasyarakatRT10` hingga `MasyarakatRT24`

* **Warga Biasa (36 Orang)**: Pengguna reguler yang dapat mendaftar qurban dan menerima daging.
    * **Username**: `warga25` hingga `warga60`
    * **Email**: `warga25@gmail.com` hingga `warga60@gmail.com`
    * **Password**: `MasyarakatRT25` hingga `MasyarakatRT60`

---

## 🏛️ Struktur Database

Berikut adalah tabel-tabel utama dalam database aplikasi ini:

* `users`: Menyimpan data semua pengguna (dikelola oleh Myth:Auth).
* `auth_groups`: Menyimpan definisi peran (`admin`, `panitia`, `berqurban`, `user`).
* `auth_groups_users`: Menghubungkan pengguna dengan perannya.
* `qurban_participants`: Tabel inti yang mencatat setiap partisipasi qurban, termasuk jenis hewan, status pembayaran, dan nominal yang dibayarkan.
* `transactions`: Mencatat semua transaksi pengeluaran untuk keperluan operasional qurban.
* `meat_distribution_kambing`: Tabel alokasi untuk setiap penerima daging kambing, lengkap dengan berat dan QR code unik.
* `meat_distribution_sapi`: Tabel alokasi untuk setiap penerima daging sapi, lengkap dengan berat dan QR code unik.