<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 

$response = array("sukses" => FALSE);
 
if ( isset($_POST['tanggal']) && isset($_POST['name']) && isset($_POST['nim']) ) {
 
    $tanggal = $_POST["tanggal"];
    $name = $_POST["name"];
    $nim = $_POST["nim"];
 
    if ($db->isUserExisted($tanggal)) {
        // user telah ada
        $response["sukses"] = TRUE;
        $response["error_msg"] = "User Sudah Absen hari ini";
        echo json_encode($response);
    } else {

        $user = $db->simpanUser($tanggal, $name, $nim);
        if ($user) {

            $response["sukses"] = FALSE;
            $response["user"]["tanggal"] = $user["tanggal"];
            $response["user"]["name"] = $user["name"];
            $response["user"]["nim"] = $user["nim"];
            echo json_encode($response);
        } else {
            
            $response["sukses"] = TRUE;
            $response["error_msg"] = "Terjadi kesalahan saat melakukan registrasi";
            echo json_encode($response);
        }
    }
} else {
    $response["sukses"] = TRUE;
    $response["error_msg"] = "Parameter (nama, nim) ada yang kurang";
    echo json_encode($response);
}
?>