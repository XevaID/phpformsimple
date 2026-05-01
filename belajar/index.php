<?php
// for ($a=0; $a < 10; $a++ ) { 
//     echo "sintaks for <br>";
// }

// $b = 0;
// while ($b < 20) {
//     echo "ini WHILE sebanyak 20 <br>";
// $b++;
// }


// $c = 0;
// do {
//     echo "Ini menggunakan do dan while <br>";
// $c++;
// } while ( $c < 5 );


// for ($t = 1; $t <= 10; $t++) {
//     echo "Inilah dia <br>";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" cellpadding="4">
        <?php for ($f = 1; $f <= 10; $f++) : ?>
        <tr>
            <?php for ($r = 1; $r <= 5; $r++): ?>
            <td>
                <?php echo "$f, $r"; ?>
            </td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>

    <div>
        Ini untuk logika if else
        <?php 
        
            $yuhu = 5;
            if ($yuhu == 10){
                echo "benar 10";
            }
            elseif ($yuhu < 10){
                echo "serah kaulah";
            }
            else {
                echo "goblok";
            }

            echo "<br>";
            echo "<br>";
            $data = file_get_contents('datas.json');

            $decode = json_decode($data, true); ?>

        <table border="1">

            <tr>
                <th>Nama</th>
                <th>Password</th>
                <th>Umur</th>
                <th>enc</th>
                <th>title</th>
                <th>desk</th>
                <th>like</th>
                <th>komen</th>
                <th>Share</th>
            </tr>

            <?php foreach ($decode as $kur) : ?>
            <tr>
                <td>
                    <?php echo  $kur['nama-user']?>
                </td>
                <td>
                    <?php echo $kur['password-user']; ?>
                </td>
                <td>
                    <?php echo  $kur['umur-user']; ?>
                </td>
                <td>
                    <?php echo  $kur['enc-post']; ?>
                </td>
                <td>
                    <?php echo $kur['title']; ?>
                </td>
                <td>
                    <?php echo  $kur['desk']; ?>
                </td>
                <td>
                    <?php echo  $kur['stat'][0]; ?>
                </td>
                <td>
                    <?php echo  $kur['stat'][1]; ?>
                </td>
                <td>
                    <?php echo  $kur['stat'][2]; ?>
                </td>
            </tr>
            <?php endforeach; ?>






        </table>


    </div>
</body>

</html>


<?php

echo password_hash('fandhi123', PASSWORD_DEFAULT); 
$cekusername = $konta->prepare("SELECT * FROM users WHERE username = ?");


?>