<?php
session_start();

require '../strings.php';
require '../config.php';
require '../connect.php';
	
if(!isset($_SESSION['id'])) {
	echo '<meta http-equiv="refresh" content="0; URL=../../login/?error=3">';
	break;
}

$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
//echo $id1;
//echo $id2;

$update1 = mysql_query("UPDATE ".$config_db_prefix."menu SET id = '0' WHERE id = '$id1'");

$update2 = mysql_query("UPDATE ".$config_db_prefix."menu SET id = '$id1' WHERE id = '$id2'");

$update3 = mysql_query("UPDATE ".$config_db_prefix."menu SET id = '$id2' WHERE id = '0'");


echo '<meta http-equiv="refresh" content="0; URL=../../cms/?site=contentmanager">';
?>