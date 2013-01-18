<?php
$array = $_SESSION['rights'];
//print_r($array);
$have_right_cms_usermanager = array_search('cms_usermanager', $array);
if($have_right_cms_usermanager < 1){
	echo '<meta http-equiv="refresh" content="10; URL=./">';
	exit;
}

$uid = $_GET['uid'];

if(!isset($uid)) {
	?>
	<p id="cms_usermanager_content_headline"><?php print $string_cms_usermanager_select_user; ?></p>
	<hr class="cms_usermanager_content_line">
	<?php
	exit;
}

$user_abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."login WHERE id = '$uid'");
$user_row = mysql_fetch_object($user_abfrage);
?>
<p id="cms_usermanager_content_headline"><?php print "$user_row->first_name $user_row->last_name" ?></p>
<hr class="cms_usermanager_content_line">

<p class="cms_usermanager_content_headline_2"><?php print $string_cms_usermanager_rights; ?></p>
<hr class="cms_usermanager_content_line cms_usermanager_content_subline">
<form action="../include/cms/cms_usermanager_change_rights.php" method="post">
	<input type="hidden" name="uid" value="<?php print $uid; ?>">
	<?php
	$rechte_abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."rights");
	
	$rights2 = "$user_row->rights";
	$rights2 = decbin($rights2);
	$rights2 = strrev($rights2);
	$length = strlen($rights2);
	$rechte = array();
	for($i = 0; $i < $length; $i++) {
		if($rights2[$i] == 1) {
			$tmp = pow(2, $i);
			$recht_abfrage = mysql_query("SELECT * FROM ".$config_db_prefix."rights WHERE multiplier = '$tmp'");
			$recht_row = mysql_fetch_object($recht_abfrage);
			$tmp2 = "$recht_row->value";
			$rechte[$tmp] = $tmp2;
			$rights2[$i] = 0;
		}
	}
	//print_r($rechte);
	while($rechte_row = mysql_fetch_object($rechte_abfrage)) {
		
		$have_right = array_search("$rechte_row->value", $rechte);
		if($have_right === false) {
			$checked = false;
		}
		else {
			$checked = true;
		}
		?>
		<input type="checkbox" name="<?php print "$rechte_row->multiplier" ?>" class="cms_usermanager_checkbox" <?php if($checked === true)print "checked"; ?>><p class="cms_usermanager_label"><?php print "$rechte_row->value"; ?></p>
		<?php
	}

	?>
	<input type="submit" value="<?php print $string_cms_usermanager_save; ?>">
</form>