<!-- Darstellung des Headers -->
<?php
$pictures = count(glob("img/header/*.png"));
$number = rand('1', $pictures);
$path = "../img/header/". $number .".png";
?>
<link type="text/css" href="../css/cms/cms_contentmanager_head.css" rel="stylesheet" />

<img src="<?php print $path; ?>" />
<img src="../img/headline.png" id="headline" usemap="#headline"/>
<a href="http://cjd-braunschweig.de"><img src="../img/cjd.png" id="cjd" /></a>