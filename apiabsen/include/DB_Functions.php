<?php
 
class DB_Functions {
 
    private $conn;
 
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // koneksi ke database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    public function simpanUser($tanggal, $name, $nim) {
    
        $stmt = $this->conn->prepare("INSERT INTO tb_absen_ai (tanggal, name, nim) VALUES (NOW(), '$name', '$nim')");
        $stmt->bind_param("sss", $tanggal, $name, $nim);
        $result = $stmt->execute();
        $stmt->close();
 
        // cek jika sudah sukses
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tb_absen_ai WHERE tanggal = '$tanggal'");
            $stmt->bind_param("s", $tanggal);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            return $user;
        } else {
            return false;
        }
    }
 
    /*
    public function getUserBynimAndPassword($waktu) {
 
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE waktu = ?");
 
        $stmt->bind_param("s", $nim);
 
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
 
            // verifikasi password user
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // cek password jika sesuai
            if ($encrypted_password == $hash) {
                // autentikasi user berhasil
                return $user;
            }
        } else {
            return null;
        }
    }
 
     */
    public function isUserExisted($tanggal) {
        $stmt = $this->conn->prepare("SELECT * FROM tb_absen_ai WHERE tanggal = '$tanggal' ");
 
        $stmt->bind_param("s", $tanggal);
 
        $stmt->execute();
 
        $stmt->store_result();
 
        if ($stmt->num_rows > 0) {
            
            $stmt->close();
            return true;
        } else {
            
            $stmt->close();
            return false;
        }
    }
 
    /*
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     
    public function hashSSHA($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
 
    
     * Decrypting password
     * @param salt, password
     * returns hash string
     
    public function checkhashSSHA($salt, $password) {
 
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
        return $hash;
    }
    */
 
}
 
?>