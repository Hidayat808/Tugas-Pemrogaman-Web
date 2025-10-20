<?php
$j = 0;

echo "Mencetak angka 1 sampai 10, kecuali 5 <br>";

while ($j < 10) {
    $j++; // Naikkan nilai $j sebelum pemeriksaan
    
    // Jika $j adalah 5, lewati (continue) sisa iterasi
    if ($j == 5) {
        echo "Nilai 5 dilewati! <br>";
        continue; 
    }
    
    // Tampilkan nilai jika tidak dilewati
    echo "\$j = $j <BR>";
}
?>