<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link type="text/css" href="../css/cms/cms_usermanager_main.css" rel="stylesheet" />
	<link type="text/css" href="../css/cms/cms_usermanager_menu.css" rel="stylesheet" />
	<link type="text/css" href="../css/cms/cms_usermanager_content.css" rel="stylesheet" />
	<?php
	$array = $_SESSION['rights'];
	$have_right_cms_usermanager = array_search('cms_usermanager', $array);
	if($have_right_cms_usermanager < 1){
		echo '<meta http-equiv="refresh" content="0; URL=./">';
		exit;
	}
	?>
</head>
<body>
	<p id="cms_usermanager_headline"><?php print $string_cms_usermanager_headline; ?></p>
	<div id="cms_usermanager_menu">
		<?php include "../include/cms/cms_usermanager_menu.php"; ?>
	</div>
	<div id="cms_usermanager_content">
		<?php include "../include/cms/cms_usermanager_content.php"; ?>
	</div>
</body>	
</html>