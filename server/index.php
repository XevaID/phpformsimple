<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        <h1>Halo namaku <?php echo "Farrel Putra Andhika"; ?></h1>
        <h1>Umurku <?php print_r(22); ?> tahun</h1>
        <h1>Aku suka <?php var_dump("Diva") ?> tahun</h1>
        <h1>Apakah <?php var_dump(1 < 6) ?> </h1>
        <h1>Apakah <?php var_dump("DIvA" === "DIvA") ?> </h1>
        <h1>Apakah <?php var_dump(4 === 4) ?> </h1>
    </body>
</html>

<?php

$test = "Halo";
echo $test; 
?>
<br>
<?php
$nama_depan = "Farrel";
$nama_tengah = "Putra";
$nama_belakang = "Andhika";
$a = 4;
$b = 5;

echo 5+5;
echo "<br>";
echo $a + $b;
echo "<br>";
echo $a - $b;
echo "<br>";
echo $a / $b;
echo "<br>";
echo $a * $b;
echo "<br>";
echo $a % $b;

echo "<br>";
echo $nama_depan.$nama_tengah.$nama_belakang;

$c = 40;
echo "<br>";
var_dump($c % 3 == 0);






?>