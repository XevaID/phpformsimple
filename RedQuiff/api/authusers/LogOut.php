<?php
//session dimulai dan dihancurkan kemudian memberikan pesan dan diterima oleh app.js
session_start();
session_destroy();
echo json_encode([
    "status" => "success",
    "message" => "Logout berhasil"
]);

?>