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
$title = $_GET['title'];

$abfrage_content = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE site_id = '$id'");
$rows_content = mysql_num_rows($abfrage_content);
if($rows_content == 1) {
	$row_content = mysql_fetch_object($abfrage_content);
	$content_id = "$row_content->id";
	echo $content_id;
}
else {
	$eintrag_contents = mysql_query("INSERT INTO ".$config_db_prefix."contents (site_id, title, content) VALUES ('$id', '$title', 'Zur Zeit ist noch kein Inhalt für diese Seite eingefügt.')");
	$abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE site_id = '$id' AND title = '$title'");
	$row = mysql_fetch_object($abfrage);
	$content_id = "$row->id";
}
$eintrag_menu = mysql_query("INSERT INTO ".$config_db_prefix."menu (type, name, content_id) VALUES ('toppoint', '$title', '$content_id')");

if ($eintrag_menu == false) {
	echo "menu error";
}

echo '<meta http-equiv="refresh" content="0; URL=../../cms/?site=contentmanager&id='.$id.'">';

?>