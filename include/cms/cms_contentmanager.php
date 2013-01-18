<html>
<head>
	<meta name="content" content="Webseite der Technik AG des CJD Braunschweig" />
	<meta name="author" content="Julian Jacobi" />
	<meta name="keywords" lang="de" content="CJD, Braunschweig, Technik" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link type="text/css" href="../css/cms/cms_contentmanager_main.css" rel="stylesheet" />
	<script src="../include/js/cms/cms_contentmanager_header.js" type="text/javascript"></script>
	<script src="../include/js/cms/cms_contentmanager_add_toplink.js" type="text/javascript"></script>
	<script src="../include/js/cms/cms_contentmanager_preview.js" type="text/javascript"></script>
	<script src="../include/js/cms/cms_contentmanager_kontextmenu.js" type="text/javascript"></script>
	<?php
	require '../include/strings.php';
	require '../include/config.php';
	require '../include/connect.php';
	
	$array = $_SESSION['rights'];
	$have_right_cms_usermanager = array_search('cms_contentmanager', $array);
	if($have_right_cms_usermanager < 1){
		echo '<meta http-equiv="refresh" content="0; URL=./">';
		exit;
	}
	
	if(isset($_GET['id'])) {
		$site_id = $_GET['id'];
	}
	else {
		$site_id = "home";
	}
	
	
	?>
	<title><?php print $string_site_title ?></title>
</head>
<body onload="javascript:openPreview()">
	<div id="head">
		<?php include '../include/cms/cms_contentmanager_head.php'; ?>
	</div>
	<div id="menu">
		<?php include '../include/cms/cms_contentmanager_menu.php'; ?>
	</div>
	<div id="cms_content">
		<?php
		$abfrage_content = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE site_id = '$site_id'");
		$row_content = mysql_fetch_object($abfrage_content);
		$headline = "$row_content->title";
		$content = "$row_content->content";
		?>
		<form action="../include/cms/cms_contentmanager_update_content.php" method="post" name="cms_content_form">
			<p class="cms_content_description"><?php print($string_cms_contentmanager_headline); ?></p>
			<input type="text" name="headline" id="cms_content_headline" value="<?php print($headline) ?>" id="cms_content_hedline" />
			<input type="submit" value="<?php print($string_cms_contentmanager_save); ?>" class="cms_content_submit" />
			<a href="javascript:openPreview()"><button type="button" class="cms_content_submit"><?php print($string_cms_contentmanager_preview); ?></button></a>
			<p class="cms_content_description"><?php print($string_cms_contentmanager_content); ?></p>
			<textarea name="content" cols="80" rows="30" class="cms_content_content"  id="cms_content_content"><?php print($content); ?></textarea>
			<input type="hidden" name="site_id" value="<?php print($site_id); ?>">
		</form>
		
		<iframe name="preview" id="cms_content_preview">
		</iframe>
	</div>
	<?php
	if(isset($_COOKIE['head'])){
	?>
		<script type="text/javascript" language="JavaScript">
			
			document.getElementById('minimizeIcon').src = '../img/png/Arrow Down 4.png';
			document.getElementById('head').style.height = "100px";
		</script>
	<?php
	}
	?>
</body>
</html>