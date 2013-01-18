<?php
session_start();

require '../strings.php';
require '../config.php';
require '../connect.php';
	
if(!isset($_SESSION['id'])) {
	echo '<meta http-equiv="refresh" content="0; URL=../../login/?error=3">';
	break;
}

//echo $_FILES['datei']['name'];

move_uploaded_file($_FILES['datei']['tmp_name'], "../../data/upload/".$_FILES['datei']['name']);

echo '<meta http-equiv="refresh" content="0; URL=../../cms/?site=filemanager">';
?>