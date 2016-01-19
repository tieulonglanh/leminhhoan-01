<?php 
include_once('../Config/database.php');
$database = new DATABASE_CONFIG;
$database = $database->default;print_r($database); die;
mysql_connect($database['host'], $database['login'], $database['password']) or die('khong the ket noi den co so du lieu');
mysql_select_db($database['database']) or die('khong select dc co so du lieu');

?>