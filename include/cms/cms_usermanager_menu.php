<?php
$array = $_SESSION['rights'];
//print_r($array);
$have_right_cms_usermanager = array_search('cms_usermanager', $array);
if($have_right_cms_usermanager < 1){
	echo '<meta http-equiv="refresh" content="10; URL=./">';
	exit;
}

$abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."login");

while($row = mysql_fetch_object($abfrage)) {
	?>
	<a href="?site=usermanager&uid=<?php print "$row->id";?>" class="cms_usermanager_menuentry"><?php print "$row->first_name $row->last_name"; ?></a>
	<?php
}
?>