<?php
session_start();

if(!isset($_SESSION['id'])) {
	echo '<meta http-equiv="refresh" content="0; URL=./?error=3">';
	break;
}

require '../strings.php';
require '../config.php';
require '../connect.php';

$site_id = $_POST['site_id'];
$headline = $_POST['headline'];
$content = $_POST['content'];

$eintragen = mysql_query("UPDATE ".$config_db_prefix."contents SET title = '$headline', content = '$content' WHERE site_id = '$site_id'");

if($eintragen == false) {
	echo "error";
}

echo '<meta http-equiv="refresh" content="0; URL=../../cms/?site=contentmanager&id='.$site_id.'">';
?>