<?php

include "koneksi.php";

$json_data_input = file_get_contents("php://input");
$json_decode_data = json_decode($json_data_input, true);



if(isset($json_decode_data["raw_id_data_nama"]) || isset($json_decode_data["raw_id_data_password"]) || isset($json_decode_data["raw_id_data_umur"]) || isset($json_decode_data["raw_id_data_title"]) || isset($json_decode_data["raw_id_data_desk"])  ) {


    $legit_username = $kont->prepare("SELECT * FROM users WHERE Username = ?");
    // $legit_username->bind_param("s", $isse_nama_test);
    $isse_nama_test = $json_decode_data['raw_id_data_nama'];
    $legit_username->execute($isse_nama_test);
    $output_legit = $output_legit->fetchColumn();
    
    //  if($output_legit > 0){
    
        $isse_nama = $json_decode_data['raw_id_data_nama'];
        $isse_password = password_hash($json_decode_data['raw_id_data_password'], PASSWORD_DEFAULT);
        $isse_umur = $json_decode_data['raw_id_data_umur'];
        $isse_title = $json_decode_data['raw_id_data_title'];
        $isse_desk = $json_decode_data['raw_id_data_desk'];
    
        $statementplace = $kont->prepare("INSERT INTO users (Username, pw, Age, Title, Desk) VALUES (?, ?, ?, ?, ?)");
    
        $statementplace->bind_param("ssiss", $isse_nama, $isse_password, $isse_umur, $isse_title, $isse_desk);
    
        if($statementplace->execute()){
            echo json_encode(["Status" => "Berhasil", "pesan" => $isse_nama . " masuk"]);
            echo "berhasil";
            }
        else{
            echo json_encode(["Status" => "Gagal"]);
            echo "gagal";
        }
    
        $statementplace->close();
    // }
    // else {
    //     echo "Username sudah ada";
    //     $legit_username->close();
    // }

}
else {
    echo "Mohon datanya diisi semua";
}

$kont->close();

?>