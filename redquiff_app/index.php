<?php
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedQuiff</title>
    <link href="app.css">

</head>

<body>

    <input type="text" placeholder="Isi nama anda" id="raw_nama">
    <input type="text" placeholder="Password" id="raw_password">
    <input type="text" placeholder="Email" id="raw_email">
    <button onclick="sub()">Kirim</button>
    <div id="display">

    </div>

    <div id="output_hasil" class="output_hasil">

    </div>

    <p id="khususout"></p>

    <script src="apik.js" defer></script>
    <!-- app javascript api -->

</body>

</html>