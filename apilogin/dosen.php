<?php
require_once 'include/DB_Dosen.php';
$db = new DB_Dosen();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['email']) && isset($_POST['password'])) {
 
    // menerima parameter POST ( email dan password )
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $user = $db->getUserByEmailAndPassword($email, $password);
 
    if ($user != false) {
        // user ditemukan
        $response["error"] = FALSE;
	$response["user"]["nama_dosen"] = $user["nama_dosen"];
        $response["user"]["qrcode"] = $user["qrcode"];
        $response["user"]["email"] = $user["email"];
        echo json_encode($response);
    } else {
        // user tidak ditemukan password/email salah
        $response["error"] = TRUE;
        $response["error_msg"] = "Login gagal. Password/Email salah";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Parameter (email atau password) ada yang kurang";
    echo json_encode($response);
}
?>