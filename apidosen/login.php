<?php
    $con = mysqli_connect("localhost", "root", "", "absensi");
    
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    
    $statement = mysqli_prepare($con, "SELECT * FROM tbl_admin WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $email, $password);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $nid, $nama, $email, $password, $url);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
	$response["nid"] = $nid;
        $response["nama"] = $nama;
        $response["email"] = $email;
        $response["password"] = $password;
	$response["url"] = $url;
    }

    echo json_encode($response);
?>