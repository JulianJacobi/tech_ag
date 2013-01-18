<link type="text/css" href="../css/cms/cms_contentmanager_menu.css" rel="stylesheet" />
<?php
$abfrage_toppoints = mysql_query("SELECT * FROM ".$config_db_prefix."menu WHERE type = 'toppoint' ORDER BY id");
$tmp_abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."menu WHERE type = 'toppoint' ORDER BY id");
$toppoint_array = array();
$i = 1;
while($tmp_row = mysql_fetch_object($tmp_abfrage)) {
	$toppoint_array[$i] = "$tmp_row->id";
	$i++;
}
$i = 1;
while($row = mysql_fetch_object($abfrage_toppoints)) {
	$abfrage_subpoints = mysql_query("SELECT * FROM ".$config_db_prefix."menu WHERE type = 'subpoint' AND toppoint_link = '$row->id' ORDER BY id");
	$tmp_abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."menu WHERE type = 'subpoint' AND toppoint_link = '$row->id' ORDER BY id");
	$abfrage_title = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE id = '$row->content_id'");
	$abfrage_title_row = mysql_fetch_object($abfrage_title);
	$side_id = "$abfrage_title_row->site_id";
	?>
<ul>
	<li>
		<menu type="context" id="<?php print "$row->id"; ?>_link">
			<menuitem label="<?php print $string_cms_contentmanager_dellink; ?>" icon="../img/png/Button Delete.png" onclick="javascript:delLink(<?php print "$row->id"; ?>)"></menuitem>
			<?php
			if(isset($toppoint_array[$i+1])) {
			?>
				<menuitem label="<?php print $string_cms_contentmanager_linkleft; ?>" icon="../img/png/Arrow Left 3.png" onclick="javascript:changeLink('<?php print "$row->id"; ?>', '<?php print $toppoint_array[$i+1]; ?>')"></menuitem>
			<?php
			}
		
			if(isset($toppoint_array[$i-1])) {
			?>
			<menuitem label="<?php print $string_cms_contentmanager_linkright; ?>" icon="../img/png/Arrow Right 3.png" onclick="javascript:changeLink('<?php print "$row->id"; ?>', '<?php print $toppoint_array[$i-1]; ?>')"></menuitem>
			<?php
			}
			?>
		</menu>
		<a href="?site=contentmanager&id=<?php print($side_id); ?>" class="toplink" contextmenu="<?php print "$row->id"; ?>_link" ><?php print("$row->name"); ?></a>
		<ul>
	<?php
	$subpoint_array = array();
	$j = 1;
	while($tmp_row = mysql_fetch_object($tmp_abfrage)) {
		$subpoint_array[$j] = "$tmp_row->id";
		$j++;
	}
	//print_r($subpoint_array);
	$j = 1;
	while($row2 = mysql_fetch_object($abfrage_subpoints)) {
		$abfrage_title = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE id = '$row2->content_id'");
		$abfrage_title_row = mysql_fetch_object($abfrage_title);
		$side2_id = "$abfrage_title_row->site_id";
		?>
		<menu type="context" id="<?php print "$row2->id"; ?>_link">
			<menuitem label="<?php print $string_cms_contentmanager_dellink; ?>" icon="../img/png/Button Delete.png" onclick="javascript:delLink(<?php print "$row2->id"; ?>)"></menuitem>
			<?php
			if(isset($subpoint_array[$j-1])) {
			?>
			<menuitem label="<?php print $string_cms_contentmanager_linkup; ?>" icon="../img/png/Arrow Up 3.png" onclick="javascript:changeLink('<?php print "$row2->id"; ?>', '<?php print $subpoint_array[$j-1]; ?>')"></menuitem>
			<?php
			}
			
			if(isset($subpoint_array[$j+1])) {
			?>
			<menuitem label="<?php print $string_cms_contentmanager_linkdown; ?>" icon="../img/png/Arrow Down 3.png" onclick="javascript:changeLink('<?php print "$row2->id"; ?>', '<?php print $subpoint_array[$j+1]; ?>')"></menuitem>
			<?php
			}
			?>
		</menu>
			<li><a href="?site=contentmanager&id=<?php print($side2_id); ?>" class="sublink" contextmenu="<?php print "$row2->id"; ?>_link"><?php print("$row2->name"); ?></a></li>
		<?php
		$j++;
	}
	?>
			<li>
				<form action="" method="post" class="cms_menu_add_sublink">
					<a href="#" onclick="javascript:addSublink(<?php print("$row->id"); ?>)" class="sublink"><img src="../img/png/Button Add.png" class="cms_menu_add_sublink"></a>
				</form>
			</li>
		</ul>
	</li>
</ul>

	<?php
	$i++;
}
?>
<ul>
	<li>
		<form action="" method="post" class="cms_menu_add_toplink">
			<a href="#" onclick="javascript:addToplink()" class="toplink"><img src="../img/png/Button Add.png" class="cms_menu_add_toplink"></a>
		</form>
	</li>
</ul>

<a href="#" onclick="javascript:minimize()"><img class="menubar" src="../img/png/Arrow Up 4.png" id="minimizeIcon"/></a>
