<?php
$user_id = $_SESSION['user_id'];


if ($_POST['act'] == "add") {

	$status = "1";
	$level_id = $_POST['level_id'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password_read = $_POST['password'];
	$password = md5($_POST['password']);
	$i = mysql_query("INSERT INTO user (
											level_id,
											name,
											username,
											password,
											password_read,
											status
											)
									VALUES (
											'$level_id',
											'$name',
											'$username',
											'$password',
											'$password_read',
											'$status'
											)
									") or die (mysql_error());

	echo "<script>alert('Berhasil Menambahkan Data');
			window.location.href='?route=".md5('user')."';</script>";

} else if ($_POST['act'] == "edit") {

	$id = $_POST['id'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password_read = $_POST['password'];
	$password = md5($_POST['password']);
	$u = mysql_query("UPDATE user SET
						name = '$name',
						username = '$username',
						password = '$password',
						password_read = '$password_read'
						WHERE
						id = '$id'
						") or die (mysql_error());

	echo "<script>alert('Berhasil Mengubah Data');
			window.location.href='?route=".md5('user')."';</script>";

} else if (base64_decode($_GET['act']) == "delete") {

	$id = base64_decode($_GET['p']);
	$name = base64_decode($_GET['q']);
	$u = mysql_query("DELETE FROM user
						WHERE
						id = '$id'
						") or die (mysql_error());

	echo "<script>alert('Berhasil Menghapus Data');
			window.location.href='?route=".md5('user')."';</script>";

}
?>