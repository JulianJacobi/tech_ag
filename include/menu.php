<link type="text/css" href="css/menu.css" rel="stylesheet" />

<?php
$abfrage_toppoints = mysql_query("SELECT * FROM ".$config_db_prefix."menu WHERE type = 'toppoint' ORDER BY id");
while($row = mysql_fetch_object($abfrage_toppoints)) {
	$abfrage_subpoints = mysql_query("SELECT * FROM ".$config_db_prefix."menu WHERE type = 'subpoint' AND toppoint_link = '$row->id' ORDER BY id");
	$abfrage_title = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE id = '$row->content_id'");
	$abfrage_title_row = mysql_fetch_object($abfrage_title);
	$side_id = "$abfrage_title_row->site_id";
	?>
<ul>
	<li>
		<a href="?id=<?php print($side_id); ?>" class="toplink"><?php print("$row->name"); ?></a>
		<ul>
	<?php
	while($row2 = mysql_fetch_object($abfrage_subpoints)) {
		$abfrage_title = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE id = '$row2->content_id'");
		$abfrage_title_row = mysql_fetch_object($abfrage_title);
		$side2_id = "$abfrage_title_row->site_id";
		?>
			<li><a href="?id=<?php print($side2_id); ?>" class="sublink"><?php print("$row2->name"); ?></a></li>
		<?php
	}
	?>
		</ul>
	</li>
</ul>

	<?php
}
?>

<a href="#" onclick="javascript:minimize()"><img class="menubar" src="img/png/Arrow Up 4.png" id="minimizeIcon"/></a>