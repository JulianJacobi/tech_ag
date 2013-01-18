<html>
<head>
	<meta name="content" content="Webseite der Technik AG des CJD Braunschweig" />
	<meta name="author" content="Julian Jacobi" />
	<meta name="keywords" lang="de" content="CJD, Braunschweig, Technik" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link type="text/css" href="css/main.css" rel="stylesheet" />
	<script src="include/js/header.js" type="text/javascript"></script>
	<?php
	require 'include/strings.php';
	require 'include/config.php';
	require 'include/connect.php';
	
	if(isset($_GET['id'])) {
		$site_id = $_GET['id'];
	}
	else {
		$site_id = "home";
	}
	?>
	<title><?php print $string_site_title ?></title>
</head>
<body>
	<div id="head">
		<?php include 'include/head.php'; ?>
	</div>
	<div id="menu">
		<?php include 'include/menu.php'; ?>
	</div>
	<div id="content">
		<?php
		$abfrage_content = mysql_query("SELECT * FROM ".$config_db_prefix."contents WHERE site_id = '$site_id'");
		$row_content = mysql_fetch_object($abfrage_content);
		?>
		<p class="content_headline"><?php print("$row_content->title"); ?></p>
		
		<div id="content_content">
			<?php print("$row_content->content"); ?>
		</div>
	</div>
	<?php
	if(isset($_COOKIE['head'])){
	?>
		<script type="text/javascript" language="JavaScript">
			
			document.getElementById('minimizeIcon').src = 'img/png/Arrow Down 4.png';
			document.getElementById('head').style.height = "100px";
		</script>
	<?php
	}
	?>
	<div id="footer">
		<?php
		include "include/footer.php";
		?>
	</div>
</body>
</html>