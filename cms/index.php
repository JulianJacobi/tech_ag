<?php session_start(); ?>
<html>
<head>
	<link type="text/css" href="../css/cms/cms_main.css" rel="stylesheet" />
	<?php
	require '../include/strings.php';
	require '../include/config.php';
	require '../include/connect.php';
	
	if(!isset($_SESSION['id'])) {
		echo '<meta http-equiv="refresh" content="0; URL=../login/?error=3">';
		exit;
	}
	$array = $_SESSION['rights'];
	//print_r($array);
	//print_r($_SESSION['rights']);
	$have_right_cms = array_search('cms', $array);
	if($have_right_cms < 1){
		echo '<meta http-equiv="refresh" content="0; URL=./">';
		exit;
	}
	?>
	<title><?php print $string_cms_title ?></title>
</head>
<body>
	<div id="cms_head">
		<?php include("../include/cms/cms_head.php"); ?>
	</div>
	<div id="content">
		<?php
		if(isset($_GET['site'])){
			$site = $_GET['site'];
			include("../include/cms/cms_".$site.".php");
		}
		?>
	</div>
</body>
</html>