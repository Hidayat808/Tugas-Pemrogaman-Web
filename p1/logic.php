<?php
// Tentukan nilai awal untuk $b dan $c
// $b = (4 != 4) -> 4 tidak sama dengan 4 -> FALSE
$b = 4!=4; 

// $c = (3 + 7 == 10) -> 10 sama dengan 10 -> TRUE
$c = 3+7 == 10; 

// $a = ($b and $c) -> (FALSE and TRUE) -> FALSE. Tidak ada output.
$a = ($b and $c);
echo "\$a=$a <br>";

// $a = ($b or $c) -> (FALSE or TRUE) -> TRUE. Output: 1.
$a = ($b or $c);
echo "\$a=$a <br>";

// $a = ($b xor $c) -> (FALSE xor TRUE) -> TRUE. Output: 1.
$a = ($b xor $c);
echo "\$a=$a <br>";

// $a = (!$b or $c) -> (!FALSE or TRUE) -> (TRUE or TRUE) -> TRUE. Output: 1.
$a = (!$b or $c);
echo "\$a=$a <br>";

// $a = $b && $c -> (FALSE && TRUE) -> FALSE. Tidak ada output.
$a = $b && $c;
echo "\$a=$a <br>";

// $a = $b || $c -> (FALSE || TRUE) -> TRUE. Output: 1.
$a = $b || $c;
echo "\$a=$a <br>";
?>