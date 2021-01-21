<?php
    $connect = mysqli_connect("localhost", "root", "", "absensifixed");
    
    $tanggal = $_POST["tanggal"];
    $name = $_POST["name"];
    $nim = $_POST["nim"];
    $waktu = $_POST["waktu"];
    
     function registerUser() {
        global $connect, $tanggal, $name, $nim, $waktu;
        $statement = mysqli_prepare($connect, "INSERT INTO absen_rlistrik (tanggal, name, nim, waktu) VALUES (NOW(), '$name', '$nim', NOW() )");
        mysqli_stmt_bind_param($statement, "ssss", $tanggal, $name, $nim, $waktu);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);     
    }

    function usernameAvailable() {
        global $connect, $nim;
        $statement = mysqli_prepare($connect, "SELECT * FROM krs_rlistrik WHERE nim = '$nim'"); 
        mysqli_stmt_bind_param($statement, "s", $nim);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count == 0){
            return false; 
        }else {
            return true; 
        }
    }

    $response = array();
    $response["sukses"] = false;  

    if (usernameAvailable()){
        registerUser();
        $response["sukses"] = false;  
    }
    
    echo json_encode($response);
?>
