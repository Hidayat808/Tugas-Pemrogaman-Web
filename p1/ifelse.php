<?php
$x = 12;
$y = '12';

echo "\$x = $x (tipe integer) <BR>";
echo "\$y = $y (tipe string) <BR>";

// Menggunakan operator perbandingan longgar (==)
if ($x == $y)
{
    echo 'Nilai $x SAMA dengan $y (perbandingan longgar/loose ==)';
}
else
{
    echo 'Nilai $x TIDAK SAMA dengan $y';
}

echo "<BR>";

// Contoh tambahan: Menggunakan operator perbandingan ketat (===)
echo "<BR>--- Perbandingan Ketat (===) ---<BR>";

if ($x === $y)
{
    echo 'TIPE dan Nilai $x SAMA dengan $y';
}
else
{
    echo 'TIPE dan Nilai $x TIDAK SAMA dengan $y';
}

?>