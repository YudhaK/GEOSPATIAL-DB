<?php 
$response = array();
$_POST = json_decode(file_get_contents('php://input'),true); 
include "../lib/koneksi.php";
include "constants.php";
$regions = mysql_query("SELECT 
                    *
                    FROM
                    region
                    ORDER BY region.id DESC
                    ") or die (mysql_error());
if (mysql_num_rows($regions) > 0) {
  $response["region"] = array();
  while ($region = mysql_fetch_array($regions)) {
    $task = array();
    $task["name"] = $region["name"];
    $task["url"] = $regionFolder.$region['url'];
    $task["description"] = $region["description"];
    $task["points"] = array();
    $points = mysql_query("SELECT * FROM point WHERE region_id = '$region[id]'") or die (mysql_error());
    while ($point = mysql_fetch_array($points)) {
      $taskPoints = array();
      $taskPoints['name'] = $point['name'];
      $taskPoints['description'] = $point['description'];
      $taskPoints['latitude'] = $point['latitude'];
      $taskPoints['longitude'] = $point['longitude'];
      array_push($task["points"], $taskPoints);
    }
    array_push($response["region"], $task);
  }
  $info = mysql_fetch_array(mysql_query("SELECT * FROM info WHERE info_key = 'info'"));
  $tutorial = mysql_fetch_array(mysql_query("SELECT * FROM info WHERE info_key = 'tutorial'"));
  $response["info"] = $info['content'];
  $response["tutorial"] = $tutorial['content'];
  $response["isSuccess"] = 1;
  echo json_encode($response);
} else {
  $response["isSuccess"] = 0;
  $response["message"] = "Not found";
  echo json_encode($response);
}
?>