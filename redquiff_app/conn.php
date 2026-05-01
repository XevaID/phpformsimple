<?php
$host = "127.0.0.1";
$host_user = "root";
$host_pw = "";
$host_data_name = "data-be"; // Make sure to define your database name
$kont = mysqli_connect($host, $host_user, $host_pw, $host_data_name);
if (!$kont) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
