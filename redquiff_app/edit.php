<?php
header("Content-Type: application/json");
include "conn.php";
$type_file = file_get_contents("php://input");
$data_json = json_decode($type_file);


$raw_json_id = $data_json->idupdate;
$raw_json_nama = $data_json->nama_baru;
$raw_json_password = $data_json->password_baru;
$raw_json_email = $data_json->email_baru;


$checkID = $kont->prepare("SELECT * FROM users WHERE id = ?");
$checkID->bind_param("i", $raw_json_id);
$checkID->execute();
$result_id = $checkID->get_result();

$checknameuser = $kont->prepare("SELECT * FROM users WHERE Username = ?");
$checknameuser->bind_param("s", $raw_json_nama);
$checknameuser->execute();
$result_name = $checknameuser->get_result();

if ($result_id->num_rows == 0) {
    echo json_encode(["status" => "gagal", "pesan" => "ID tidak ditemukan"]);
    exit;
} else if ($result_name->num_rows > 0) {
    echo json_encode(["status" => "gagalcek", "pesan" => "Username sudah digunakan"]);
    exit;
} else {
    $updatedata = $kont->prepare("UPDATE users SET Username = ?, Password = ?, Email = ? WHERE id = ?");
    $updatedata->bind_param("sssi", $raw_json_nama, $raw_json_password, $raw_json_email, $raw_json_id);
    if ($updatedata->execute()) {
        echo json_encode(["status" => "sukses", "pesan" => "Data berhasil diperbarui"]);
        exit;
    } else {
        echo json_encode(["status" => "gagal", "pesan" => "Gagal memperbarui data"]);
        exit;
    }
}
