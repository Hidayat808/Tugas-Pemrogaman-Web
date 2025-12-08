<?php
// Menghubungkan file koneksi
include 'koneksi.php';

if ($conn) {
    echo "<h1>✅ Koneksi Berhasil!</h1>";
    echo "Terhubung ke database: <strong>" . $database . "</strong>";
    echo "<br>Status Host: " . mysqli_get_host_info($conn);
} else {
    echo "<h1>❌ Koneksi Gagal!</h1>";
}
?>