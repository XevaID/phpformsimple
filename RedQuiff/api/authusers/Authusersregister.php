<?php
session_start();
require_once __DIR__ . "/../../sysconnection/connection.php";
header("Content-Type: application/json");
$file_type = file_get_contents("php://input");
$dataRAW = json_decode($file_type);

$regusername = $dataRAW->regusername;
$regemail = $dataRAW->regemail;
$regpassowrd = $dataRAW->regpassword;
$confirmregpassword = $dataRAW->confirmregpassword;

$cekusername = $konta->prepare("SELECT * FROM users WHERE username = ?");
$cekusername->bind_param("s", $regusername);
$cekusername->execute();
$resultcekusername = $cekusername->get_result();

if($resultcekusername->num_rows > 0){
    echo json_encode([
        "status" => "errorinfo",
        "message" => "Username sudah digunakan"
    ]);
    exit();    
}

$cekEmail = $konta->prepare("SELECT * FROM users WHERE email = ?");
$cekEmail->bind_param("s", $regemail);
$cekEmail->execute();
$resultcekEmail = $cekEmail->get_result();
if(!filter_var($regemail, FILTER_VALIDATE_EMAIL)){
    echo json_encode([
        "status" => "errorinfo",
        "message" => "Email tidak valid"
    ]);
    exit();
}elseif($resultcekEmail->num_rows > 0){
    echo json_encode([
        "status" => "errorinfo",
        "message" => "Email sudah digunakan"
    ]);
    exit();
}
else {
    if ($regpassowrd !== $confirmregpassword) {
        echo json_encode([
            "status" => "errorinfo",
            "message" => "Password dan Confirm Password tidak cocok"
        ]);
        exit();
    } else {
        $hashedPassword = password_hash($regpassowrd, PASSWORD_DEFAULT);
        $insertUser = $konta->prepare("INSERT INTO users (username, email, pass) VALUES (?, ?, ?)");
        $insertUser->bind_param("sss", $regusername, $regemail, $hashedPassword);
        if ($insertUser->execute()) {

            $_SESSION['idAuth'] = $konta->insert_id;
            echo json_encode([
                "status" => "successCreate",
                "message" => "Registrasi berhasil"
            ]);
            exit();
        } else {
            echo json_encode([
                "status" => "errorinfo",
                "message" => "Terjadi kesalahan saat registrasi"
            ]);
            exit();
        }
    }
}

?>