<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/kode/RedQuiff/assets/src/style/userin.css">
</head>

<body>
    <div id="loginForm">
        <input type="text" placeholder="Username" id="inputusername">
        <input type="text" placeholder="Password" id="inputpassword">
        <button onclick="login()">Login</button>
        <p> Belum punya akun? <span onclick="toRegister()">Register</span></p>

    </div>

    <div id="registerForm">
        <input type="text" placeholder="Username" id="regUsername">
        <input type="text" placeholder="Email" id="regEmail">
        <input type="text" placeholder="Password" id="regPassword">
        <input type="text" placeholder="Confirm Password" id="confirmregPassword">
        <button onclick="register()">Register</button>
        <p> Sudah punya akun? <span onclick="toLogin()">Login</span></p>
    </div>

    <p id="outputtext"></p>


    <script src="/kode/RedQuiff/pages/app/appuser.js"></script>

</body>

</html>