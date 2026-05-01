<?php
session_start();
require_once __DIR__ . "/../../sysconnection/connection.php";
header("Content-Type: application/json");
$file_type = file_get_contents("php://input");
$data = json_decode($file_type);

$checkUser = $data->usernamein;
$checkPass = $data->passwordin;
// jangan suntik value dengan input, rawan sql injection, gunakan bind param dan prepare
$execheckuser = $konta->prepare("SELECT * FROM users WHERE username = ?");
$execheckuser->bind_param("s", $checkUser);
$execheckuser->execute();
$result = $execheckuser->get_result();

if ($result->num_rows === 0) {
    echo json_encode([
        "status" => "errorinfo",
        "message" => "Username tidak ditemukan"
    ]);
    exit();
}else {
    $userDatapass = $result->fetch_object();
    if (password_verify($checkPass, $userDatapass->pass)) {
        
        $_SESSION['idAuth'] = $userDatapass->id;
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil"
        ]);
        exit();
        
    } else {
        echo json_encode([
            "status" => "errorinfo",
            "message" => "Password salah"
        ]);
        exit();
    }
}


?>