<?php

include "conn.php";

header ("Content-Type: application/json");
$file_type = file_get_contents("php://input");
$data = json_decode($file_type);

$cekIDAPI = $kont->prepare("SELECT * FROM users WHERE id = ?");
$cekIDAPI->bind_param("i", $data->idapi);
$cekIDAPI->execute();
$result_cekIDAPI = $cekIDAPI->get_result();

if($result_cekIDAPI->num_rows == 0){
    echo json_encode([
        "status" => "gagal",
        "pesan" => "ID tidak ditemukan"
    ]);
    exit;
}else {

    $hapus = $kont->prepare("DELETE FROM users WHERE id = ?");
    $hapus->bind_param("i", $data->idapi);
    $hapus->execute();
    echo json_encode([
        "status" => "terhapus",
        "pesan" => "Data berhasil dihapus"
    ]);

    exit;

}




?>