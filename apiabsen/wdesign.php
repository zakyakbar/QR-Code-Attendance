<?php
    
    $connect= mysqli_connect("localhost", "root", "", "absensi");
    
    $name = $_POST["name"];
    $nim = $_POST["nim"];

     function registerUser() {
        global $connect, $name, $nim;
        $statement = mysqli_prepare($connect, "INSERT INTO absen_wdesign (name, nim) VALUES (?, ?)");
    	mysqli_stmt_bind_param($statement, "si", $name, $nim);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);     
    }

    function usernameAvailable() {
        global $connect, $nim;
        $statement = mysqli_prepare($connect, "SELECT * FROM krs_wdesign WHERE nim = ?"); 
        mysqli_stmt_bind_param($statement, "s", $nim);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count == 1){
            return true; 
        }else {
            return false; 
        }
    }

    $response = array();
    $response["success"] = false;  

    if (usernameAvailable()){
        registerUser();
        $response["success"] = true;  
    }
    
    echo json_encode($response);
?>
