<?php
// Konfigurasi Database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "pagination";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    // Jika gagal, hentikan script dan tampilkan error
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Opsional: Set charset ke UTF-8 agar karakter khusus terbaca dengan baik
mysqli_set_charset($conn, "utf8");
?>