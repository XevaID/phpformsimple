<?php
session_start();
//jika user tidak memiliki SESSION maka alihkan user ke halaman userin menggunakan array status sebagai penanda
if (!isset($_SESSION['idAuth'])) {
    echo json_encode([
        "status" => "ralat"
    ]);
    exit();
} else {
    echo json_encode([
        "status" => "success"
    ]);
    exit();
}