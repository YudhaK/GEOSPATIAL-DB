<?php
$user_id = $_SESSION['user_id'];

if ($_POST['act'] == "add") {

} else if ($_POST['act'] == "edit") {
	$id = $_POST['id'];
	$content = $_POST['content'];
	$u = mysql_query("UPDATE info SET
						content = '$content'
						WHERE
						info_key = '$id'
						") or die (mysql_error());
	echo "<script>alert('Berhasil Mengubah Data');
			window.location.href='?route=".md5('info')."';</script>";
} else if (base64_decode($_GET['act']) == "delete") {

}
?>