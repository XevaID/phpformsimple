<?php
// Pastikan tidak ada spasi/enter di baris paling atas!
require_once "conn.php";
header("Content-Type: application/json");

// Matikan laporan error visual agar tidak merusak JSON, kirim ke log saja

$json_input = file_get_contents("php://input");
$json_data = json_decode($json_input);

$name = $json_data->nama ?? "";
$password = $json_data->password ?? "";
$email = $json_data->email ?? "";

if (empty($name) || empty($password) || empty($email)) {
    echo json_encode(["status" => "gagal", "pesan" => "Input tidak boleh kosong"]);
    exit;
}

// Cek Username
$checkname = $kont->prepare("SELECT Username FROM users WHERE Username = ?");
$checkname->bind_param("s", $name);
$checkname->execute();
if ($checkname->get_result()->num_rows > 0) {
    echo json_encode(["status" => "gagal", "pesan" => "Username sudah digunakan"]);
    exit;
}

// Validasi Email & Insert
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => "gagal", "pesan" => "Format email tidak valid"]);
    exit;
}else{
    $cekEmail = $kont->prepare("SELECT Email FROM users WHERE Email = ?");
    $cekEmail->bind_param("s", $email);
    $cekEmail->execute();
    $resultEmail = $cekEmail->get_result();
    if ($resultEmail->num_rows > 0) {
        echo json_encode(["status" => "gagal", "pesan" => "Email sudah digunakan"]);
        exit;
    }else {

    $insert = $kont->prepare("INSERT INTO users (Username, Password, Email) VALUES (?, ?, ?)");
    $insert->bind_param("sss", $name, $password, $email);
    $insert->execute()
        echo json_encode(["status" => "berhasil", "pesan" => "Data berhasil masuk"]);
    
    
}
}