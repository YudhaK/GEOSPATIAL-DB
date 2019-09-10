<?php 
$response = array();
$_POST = json_decode(file_get_contents('php://input'),true); 
date_default_timezone_set("Asia/Jakarta");
include "../lib/koneksi.php";
include "constants.php";
$post_time = date("Y-m-d H:i:s");

$nama = $_POST['nama'];
$nik = $_POST['nik'];
$content = $_POST['content'];
$base = $_POST["image"];

$waktu = date("h:i:sa"); 
$acak = rand(1,99);
$image_name = $id.'.'.$waktu.$acak.'.png';
$path = $imageFolder.$image_name; // path of saved image 
// base64 encoded utf-8 string
$binary = base64_decode($base);
// binary, utf-8 bytes
header("Content-Type: bitmap; charset=utf-8");
$file = fopen("../upload/image//". $image_name, "wb"); // 
$filepath = $image_name; 
fwrite($file, $binary);
fclose($file);    

$laporanSave = mysql_query("INSERT INTO laporan (nama, nik, content, image, post_time) 
  VALUES ('$nama','$nik','$content','$image_name','$post_time')");

if ($laporanSave) {
  $response["isSuccess"] = 1;
  echo json_encode($response);
} else {
  $response["isSuccess"] = 0;
  $response["message"] = "Not found";
  echo json_encode($response);
}
?>