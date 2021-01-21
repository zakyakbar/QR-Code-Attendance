<?php 
require __DIR__ . '/vendor/autoload.php';
require 'libs/NotORM.php'; 

use \Slim\App;

$app = new App();

$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'absensifixed';
$dbmethod = 'mysql:dbname=';

$dsn = $dbmethod.$dbname;
$pdo = new PDO($dsn, $dbuser, $dbpass);
$db  = new NotORM($pdo);

$app-> get('/', function(){
    echo "API Mahasiswa";
});

$app ->get('/semuadosen', function() use($app, $db){
	$dosen["error"] = false;
	$dosen["message"] = "Berhasil mendapatkan data dosen";
    foreach($db->tb_dosen() as $data){
        $dosen['semuadosen'][] = array(
            'id' => $data['id'],
            'nip' => $data['nip'],
            'nama_dosen' => $data['nama_dosen'],
            'email' => $data['email'],
            'kontak_dosen' => $data['kontak_dosen'],
            'alamat' => $data['alamat']
            );
    }
    echo json_encode($dosen);
});

$app ->get('/dosen/{nama_dosen}', function($request, $response, $args) use($app, $db){
    $dosen = $db->tb_dosen()->where('nama_dosen',$args['nama_dosen']);
    $dosendetail = $dosen->fetch();

    if ($dosen->count() == 0) {
        $responseJson["error"] = true;
        $responseJson["message"] = "Nama dosen belum tersedia di database";
        $responseJson["id"] = null;
        $responseJson["nip"] = null;
        $responseJson["nama_dosen"] = null;
        $responseJson["email"] = null;
        $responseJson["kontak_dosen"] = null;
        $responseJson["alamat"] = null;
    } else {
        $responseJson["error"] = false;
        $responseJson["message"] = "Berhasil mengambil data";
        $responseJson["id"] = $dosendetail['id'];
        $responseJson["nip"] = $dosendetail['nip'];
        $responseJson["nama_dosen"] = $dosendetail['nama_dosen'];
        $responseJson["email"] = $dosendetail['email'];
        $responseJson["kontak_dosen"] = $dosendetail['kontak_dosen'];
        $responseJson["alamat"] = $dosendetail['alamat'];
    }

    echo json_encode($responseJson); 
});

$app ->get('/matkul', function() use($app, $db){
    if ($db->tb_matkul()->count() == 0) {
        $responseJson["error"] = true;
        $responseJson["message"] = "Belum mengambil mata kuliah";
    } else {
        $responseJson["error"] = false;
        $responseJson["message"] = "Berhasil mendapatkan data mata kuliah";
        foreach($db->tb_matkul() as $data){
        $responseJson['semuamatkul'][] = array(
            'id_mk' => $data['id_mk'],
            'nama_matkul' => $data['nama_matkul'],
            'nama_dosen' => $data['id'],
            'semester' => $data['semester'],
            );
        }
    }
    echo json_encode($responseJson);
});

$app->post('/matkul', function($request, $response, $args) use($app, $db){
    $matkul = $request->getParams();
    $result = $db->tb_matkul->insert($matkul);

    $responseJson["error"] = false;
    $responseJson["message"] = "Berhasil menambahkan ke database";
    echo json_encode($responseJson);
});

$app->delete('/matkul/{id}', function($request, $response, $args) use($app, $db){
    $matkul = $db->tb_matkul()->where('id', $args);
    if($matkul->fetch()){
        $result = $matkul->delete();
        echo json_encode(array(
            "error" => false,
            "message" => "Matkul berhasil dihapus"));
    }
    else{
        echo json_encode(array(
            "error" => true,
            "message" => "Matkul ID tersebut tidak ada"));
    }
});

$app->run();