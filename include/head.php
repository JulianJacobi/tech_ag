<!-- Darstellung des Headers -->
<?php
$pictures = count(glob("img/header/*.png"));
$number = rand('1', $pictures);
$path = "img/header/". $number .".png";

?>
<link type="text/css" href="css/head.css" rel="stylesheet" />

<img src="<?php print $path; ?>" />
<img src="img/headline.png" id="headline" usemap="#headline"/>
<a href="http://cjd-braunschweig.de"><img src="img/cjd.png" id="cjd" /></a>

<map name="headline">
	<area shape="rect" coords="205, 20, 240, 67" href="login/" alt="Login" title="Login" target="_blank">
</map>