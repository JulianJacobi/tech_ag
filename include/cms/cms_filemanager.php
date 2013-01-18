<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link type="text/css" href="../css/cms/cms_filemanager_main.css" rel="stylesheet" />
	<?php
	$array = $_SESSION['rights'];
	$have_right_cms_usermanager = array_search('cms_filemanager', $array);
	if($have_right_cms_usermanager < 1){
		echo '<meta http-equiv="refresh" content="0; URL=./">';
		exit;
	}
	?>
</head>
<body>
	<div id="cms_filemgr_upload">
		<form action="../include/cms/cms_filemanager_upload.php" method="post" enctype="multipart/form-data">
			<p class="cms_filemgr_upload_headline"><?php print $string_cms_filemanager_upload_headline; ?></p>
			<input type="file" name="datei" class="cms_filemgr_upload_input"><br>
			<input type="submit" value="<?php print $string_cms_filemanager_upload_submit; ?>" class="cms_filemgr_upload_submit">
		</form>
	</div>
	<div id="cms_filemgr_list">
		<p class="cms_filemgr_list_headline"><?php print $string_cms_filemanager_list_headline; ?></p>
		<table id="cms_filemgr_list_table">
			<tr>
				<td>
					<p class="cms_filemgr_list_top"><?php print $string_cms_filemanager_list_file; ?></p>
				</td>
				<td>
					<p class="cms_filemgr_list_top"><?php print $string_cms_filemanager_list_url; ?></p>
				</td>
			</tr>
			<?php
			$ordner = "../data/upload/";
			$dateien = scandir($ordner);
			foreach($dateien as $datei) {
				if ($datei != "." && $datei != "..") {
					?>
			<tr>
				<td>
					<a href="<?php print $ordner.$datei; ?>"><?php print $datei; ?></a>
				</td>
				<td>
					<?php print "/data/upload/".$datei; ?>
				</td>
			</tr>
					<?php
				}
			}
			?>
		</table>
	</div>
</body>
</html>