<?php
session_start();
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