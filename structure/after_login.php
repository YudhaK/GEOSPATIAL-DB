<?php include"structure/library_head.php";?>
<?php include"structure/header.php";?>
<?php include"structure/menu.php";?>

<?php
switch ($_GET['route']) {

 	default;
	include"structure/dashboard.php";
	break;

	//user
	case md5("user");
	include"master/pg_user/user_list.php";
	break;
	case md5("user_act");
	include"master/pg_user/user_act.php";
	break;

	//info
	case md5("info");
	include"master/pg_info/info_list.php";
	break;
	case md5("info_act");
	include"master/pg_info/info_act.php";
	break;
	
	//region
	case md5("region");
	include"master/pg_region/region_list.php";
	break;
	case md5("region_detail");
	include"master/pg_region/region_detail.php";
	break;
	case md5("region_act");
	include"master/pg_region/region_act.php";
	break;
	
	//laporan
	case md5("laporan");
	include"master/pg_laporan/laporan_list.php";
	break;
	case md5("laporan_detail");
	include"master/pg_laporan/laporan_detail.php";
	break;
	
}
?>

<?php include"structure/footer.php";?>
<?php include"structure/library_foot.php";?>