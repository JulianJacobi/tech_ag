<!--Headfile für das CMS-->
<link type="text/css" href="../css/cms/cms_head.css" rel="stylesheet" />
<?php
$array = $_SESSION['rights'];

//print_r($array);

$have_right_cms_contentmanager = array_search('cms_contentmanager', $array);
if($have_right_cms_contentmanager !== false){
	?>
	<a href="?site=contentmanager" class="cms_head_link"><?php print $string_cms_head_contentmanager; ?></a>
	<?php
}

$have_right_cms_filemanager = array_search('cms_filemanager', $array);
if($have_right_cms_filemanager !== false){
	?>
	<a href="?site=filemanager" class="cms_head_link"><?php print $string_cms_head_filemanager; ?></a>
	<?php
}

$have_right_cms_usermanager = array_search('cms_usermanager', $array);
if($have_right_cms_usermanager !== false){
	?>
	<a href="?site=usermanager" class="cms_head_link"><?php print $string_cms_head_usermanager; ?></a>
	<?php
}
?>
<a href="../login/logout.php" class="cms_head_link"><?php print $string_cms_head_logout; ?></a>