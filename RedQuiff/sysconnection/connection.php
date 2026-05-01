<?php
$hostname = "127.0.0.1";
$userdatabase = "root";
$password = "";
$name_database = "datase";

$konta = mysqli_connect($hostname, $userdatabase, $password, $name_database);

if (!$konta) {
    header("Content-Type: application/json");
    echo json_encode([
        "status" => "error",
        "message" => "Gagal terhubung ke database: " . mysqli_connect_error()
    ]);
}