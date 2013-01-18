<?php
session_start();

require '../strings.php';
require '../config.php';
require '../connect.php';
	
if(!isset($_SESSION['id'])) {
	echo '<meta http-equiv="refresh" content="0; URL=../../login/?error=3">';
	break;
}

$id = $_GET['id'];

$delete = mysql_query("DELETE FROM ".$config_db_prefix."menu WHERE id = '$id'");

echo '<meta http-equiv="refresh" content="0; URL=../../cms/?site=contentmanager">';
?>