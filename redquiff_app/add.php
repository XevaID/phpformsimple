<?php
include "conn.php";

$ambildata = $kont->query("SELECT id, Username, Password, Email FROM users ORDER BY id DESC");

$datamentah = [];
while ($row = $ambildata->fetch_assoc()) {
    $datamentah[] = $row;
}

echo json_encode($datamentah);
