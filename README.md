# Inventory Management System

## Ringkasan Aplikasi
Aplikasi ini adalah sistem manajemen inventaris yang dibangun menggunakan Laravel 11. Aplikasi ini memiliki fitur-fitur seperti login, melihat data barang, menambah barang, mengedit barang, menghapus barang, mengelola relasi antara tabel barang dan klasifikasi, halaman utama, dan profil pengguna yang login.

## Fitur
1. **Login**
   - Pengguna dapat masuk ke dalam aplikasi menggunakan email dan password yang telah terdaftar.

2. **Halaman Utama**
   - Pengguna akan diarahkan ke halaman utama setelah login, yang menampilkan Selamat datang ke pengguna yang login dan menu sidebar.

3. **Profil Pengguna**
   - Pengguna dapat melihat dan mengedit profil mereka sendiri.

4. **Manajemen Data Barang**
   - **Melihat Data Barang**: Pengguna dapat melihat daftar barang yang tersedia.
   - **Tambah Barang**: Pengguna dapat menambahkan data barang baru ke dalam sistem.
   - **Edit Barang**: Pengguna dapat mengedit data barang yang sudah ada.
   - **Hapus Barang**: Pengguna dapat menghapus data barang yang tidak lagi diperlukan.

5. **Manajemen Data Klasifikasi**
   - **Melihat Data Klasifikasi**: Pengguna dapat melihat daftar klasifikasi barang.
   - **Tambah Klasifikasi**: Pengguna dapat menambahkan data klasifikasi baru ke dalam sistem.
   - **Edit Klasifikasi**: Pengguna dapat mengedit data klasifikasi yang sudah ada.
   - **Hapus Klasifikasi**: Pengguna dapat menghapus data klasifikasi yang tidak lagi diperlukan.

## Relasi Tabel
Aplikasi ini menggunakan dua tabel utama dalam database:
1. **Barang**: Tabel ini menyimpan data barang.
2. **Klasifikasi**: Tabel ini menyimpan data klasifikasi barang.

Relasi antara tabel `barang` dan `klasifikasi` adalah relasi satu ke banyak (one-to-many). Setiap barang dapat memiliki satu klasifikasi, tetapi satu klasifikasi dapat dimiliki oleh banyak barang.
