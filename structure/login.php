<?php
session_start();
include "../lib/koneksi.php";

$username = $_POST["username"];
$password = md5($_POST["password"]);

$LoginRS__query 	= mysql_query("SELECT 
																	*
																	FROM 
																	user 
																	WHERE 
																	username = '$username' 
																	AND password = '$password'
																	AND status = '1'
																	") or die (mysql_error());
$rLogin = mysql_fetch_array($LoginRS__query);
$jumuser = mysql_num_rows($LoginRS__query);

if ($jumuser > 0) {

	$random = rand(111111, 999999);
	$rand_date = date("YmdHis");
	$token = md5($random.$rand_date);
	$u_token = mysql_query("UPDATE user SET token = '$token' WHERE id = '$rLogin[id]'") or die (mysql_error());

	$_SESSION["token"] = $token;
	$_SESSION["name"] = $rLogin["name"];
	$_SESSION["username"] = $rLogin["username"];
	$_SESSION["password"] = $password;
	$_SESSION["user_id"] = $rLogin["id"];
	$_SESSION["level_id"] = $rLogin["level_id"];
	header("location:../");

} else {

	echo"<script>alert('Username atau Password yang Anda Input Salah');window.location.href='../index.php';</script>";

}

?>