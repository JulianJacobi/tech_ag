<html>
<head>
	<link type="text/css" href="css/cms/cms_contentmanager_preview.css" rel="stylesheet" />
	<?php
	require 'include/strings.php';
	
	$headline = $_GET['headline'];
	$content = stripslashes($_GET['content']);
	//print("<textarea>".$content."</textarea>");
	?>
</head>
<body id="cms_content_preview_body">
	<h1><?php print($string_cms_preview_headline); ?></h1>
	<p class="cms_preview_headline"><?php print($headline); ?></p>
	<div id="cms_preview_content">
		<?php print($content); ?>
	</div>
</body>
</html>