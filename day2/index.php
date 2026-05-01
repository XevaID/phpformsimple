<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-flood">
        <div class="container-main">
            <input type="text" placeholder="username" class="username" id="username">
            <input type="password" placeholder="password"  id="password" class="password">
            <input type="number" placeholder="Umur"  id="age" class="age">
            <input type="text" placeholder="Judul"  id="title" class="title">
            <input type="text" placeholder="Deskripsi" class="desk" id="desk"></input>
            <button type="button" onclick="save_data()"> Tekan</button>
        </div>
    </div>
    <div id="status_pesan">
        
    </div>
    <script src="module.js"></script>
</body>
</html>