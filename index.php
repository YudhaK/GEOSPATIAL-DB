<?php
include "lib/koneksi.php";

include "master/config/site_id.php";
include "master/config/timezone.php";
error_reporting(0);
session_start();
ob_start();
if (isset($_SESSION['username']) AND isset($_SESSION['user_id'])) {
  $Auth_token = mysql_query("SELECT id FROM user WHERE token = '$_SESSION[token]' and id = '$_SESSION[user_id]'") or die (mysql_error());
  $Count_Auth = mysql_num_rows($Auth_token);
  if ($Count_Auth > 0) {
    include "structure/after_login.php";
  } else {
    include "structure/before_login.php";
  } 
} else {
  include "structure/before_login.php";
}
?>
