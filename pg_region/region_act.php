<?php
include "master/function/func_randcode.php";
$user_id = $_SESSION['user_id'];
$post_time = date("Y-m-d H:i:s");

if ($_POST['act'] == "add") {
	$name = $_POST['name'];
	$description = $_POST['description'];
	if ($_FILES['upload_url']['name'] != '') {
		$code = createRandomCode();
		$urlRare = $code.$_FILES['upload_url']['name'];
		$url = str_replace(' ', '_', $urlRare);
		$move = move_uploaded_file($_FILES['upload_url']['tmp_name'], 'upload/region/'.$url);
	}
	$i = mysql_query("INSERT INTO region (
											name,
											url,
											description,
											upload_by,
											post_time
											)
									VALUES (
											'$name',
											'$url',
											'$description',
											'$user_id',
											'$post_time'
											)
									") or die (mysql_error());


	echo "<script>alert('Berhasil Menambahkan Data');
			window.location.href='?route=".md5('region')."';</script>";

} else if ($_POST['act'] == "add_point") {

	$region_id = $_POST['region_id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$i = mysql_query("INSERT INTO point (
											region_id,
											name,
											description,
											latitude,
											longitude
											)
									VALUES (
											'$region_id',
											'$name',
											'$description',
											'$latitude',
											'$longitude'
											)
									") or die (mysql_error());

	$p = base64_encode($region_id);

	echo "<script>alert('Berhasil Menambahkan Data');
			window.location.href='?route=".md5('region_detail')."&p=$p';</script>";

} else if ($_POST['act'] == "edit") {

	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	if ($_FILES['upload_url']['name'] != '') {
		$code = createRandomCode();
		$urlRare = $code.$_FILES['upload_url']['name'];
		$url = str_replace(' ', '_', $urlRare);
		$move = move_uploaded_file($_FILES['upload_url']['tmp_name'], 'upload/region/'.$url);
	} else {
		$url = $_POST['url_lama'];
	}
	$u = mysql_query("UPDATE region SET
						name = '$name',
						url = '$url',
						description = '$description'
						WHERE
						id = '$id'
						") or die (mysql_error());

	echo "<script>alert('Berhasil Mengubah Data');
			window.location.href='?route=".md5('region')."';</script>";

} else if (base64_decode($_GET['act']) == "delete") {

	$id = base64_decode($_GET['p']);
	$title = base64_decode($_GET['q']);
	$u = mysql_query("DELETE FROM region
						WHERE
						id = '$id'
						") or die (mysql_error());

	echo "<script>alert('Berhasil Menghapus Data');
			window.location.href='?route=".md5('region')."';</script>";

} else if (base64_decode($_GET['act']) == "delete_point") {

	$p = $_GET['p'];
	$id = base64_decode($_GET['q']);
	$u = mysql_query("DELETE FROM point
						WHERE
						id = '$id'
						") or die (mysql_error());

	echo "<script>alert('Berhasil Menghapus Data');
			window.location.href='?route=".md5('region_detail')."&p=$p';</script>";

}
?>