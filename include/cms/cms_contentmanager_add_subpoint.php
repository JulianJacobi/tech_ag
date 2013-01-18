<?php
session_start();

require '../strings.php';
require '../config.php';
require '../connect.php';
	
if(!isset($_SESSION['id'])) {
	echo '<meta http-equiv="refresh" content="0; URL=./?error=3">';
	break;
}

$id = $_GET['id'];
$title = $_GET['title'];
$toppoint_link = $_GET['toppoint_link'];

$abfrage_content = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE site_id = '$id'");
$rows_content = mysql_num_rows($abfrage_content);
if($rows_content == 1) {
	$row_content = mysql_fetch_object($abfrage_content);
	$content_id = "$row_content->id";
}
else {
	$eintrag_contents = mysql_query("INSERT INTO ".$config_db_prefix."contents (site_id, title, content) VALUES ('$id', '$title', 'Zur Zeit ist noch kein Inhalt für diese Seite eingefügt.')");
	$abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE site_id = '$id' AND title = '$title'");
	$row = mysql_fetch_object($abfrage);
	$content_id = "$row->id";
}

$eintrag_menu = mysql_query("INSERT INTO ".$config_db_prefix."menu (type, name, toppoint_link, content_id) VALUES ('subpoint', '$title', '$toppoint_link', '$content_id')");

if ($eintrag_contents == false) {
	echo "contents error <br>";
}

if ($eintrag_menu == false) {
	echo "menu error";
}

echo '<meta http-equiv="refresh" content="0; URL=../../cms/?site=contentmanager&id='.$id.'">';

?>