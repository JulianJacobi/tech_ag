<?php
session_start();
$array = $_SESSION['rights'];
$have_right_cms_usermanager = array_search('cms_usermanager', $array);
if($have_right_cms_usermanager < 1){
	echo '<meta http-equiv="refresh" content="0; URL=./">';
	exit;
}
require '../strings.php';
require '../config.php';
require '../connect.php';
	
if(!isset($_SESSION['id'])) {
	echo '<meta http-equiv="refresh" content="0; URL=../../login/?error=3">';
	break;
}

$uid = $_POST['uid'];

$rechte_abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."rights");
while($rechte_row = mysql_fetch_object($rechte_abfrage)) {
	if($_POST["$rechte_row->multiplier"] == "on") {
		$rights_binary = $rights_binary."1";
	}
	else {
		$rights_binary = $rights_binary."0";
	}
	//echo $rights_binary."<br>";
}
$rights_binary = strrev($rights_binary);
$rights_decimal = bindec($rights_binary);
//echo $rights_decimal;

$rechte_eintragen = mysql_query("UPDATE ".$config_db_prefix."login SET rights = '$rights_decimal' WHERE id = '$uid'");

echo '<meta http-equiv="refresh" content="0; URL=../../cms/?site=usermanager&uid='.$uid.'">';
?>