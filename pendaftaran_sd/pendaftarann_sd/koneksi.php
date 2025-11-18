<?php
// 1. Definisikan variabel koneksi
$server = "localhost:3306"; // Biasanya 'localhost' untuk server lokal
$user = "root";        // Nama pengguna database (default XAMPP/WAMP)
$password = "";        // Kata sandi database (default XAMPP/WAMP, biasanya kosong)
$database = "pendaftarann_sd"; // GANTI dengan nama database Anda

// 2. Buat koneksi ke database
$koneksi = mysqli_connect($server, $user, $password, $database);

// 3. Periksa koneksi
if (!$koneksi) {
    // Jika koneksi gagal, tampilkan pesan error dan hentikan script
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo"koneksi berhasil";
}

// Opsional: Baris ini bisa dihapus, hanya untuk memastikan koneksi berhasil saat pertama kali diuji
// echo "Koneksi ke database berhasil!"; 
?>