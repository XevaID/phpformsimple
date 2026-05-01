<?php session_start();//mengambil sesi ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Halo ini index</h1>
    <!-- FungsinLogout -->
    <button onclick="logout()">Logout</button>
    <script src="/kode/RedQuiff/app/app.js" defer></script>
</body>


<?php echo $_SESSION['idAuth']; ?>

</html>