<?php
$k = 0;

echo "Mencetak bilangan genap sampai kurang dari 10 <br>";
echo "Perulangan akan berhenti saat \$k mencapai 8 <br>";
echo "<br>";

while ($k <= 10) {
    $k++; // Naikkan nilai $k
    
    // Periksa apakah $k adalah bilangan ganjil.
    // Jika ganjil (sisa pembagiannya bukan 0), kita lewati (continue)
    if ($k % 2 != 0) { 
        continue;
    }
    
    // Jika $k mencapai 8, hentikan perulangan (break)
    if ($k == 8) {
        echo "Berhenti di \$k = $k <BR>";
        break; 
    }
    
    // Tampilkan nilai (hanya bilangan genap yang sampai di sini)
    echo "\$k = $k <BR>";
}
?>