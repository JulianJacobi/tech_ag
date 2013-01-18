<?php session_start(); ?>
<html>
<head>
	<link type="text/css" href="../css/login.css" rel="stylesheet" />
	<title>Technik AG | Login</title>
	<?php
	require('../include/strings.php');
	?>
</head>
<body>
	<?php
	if(!isset($_SESSION['id'])) {
		?>
		<div id="login_field">
			<p class="login_form_headline"><?php print($string_login_headline);?></p>
			<form action="log_in.php" method="post">
				<p class="login_form_text"><?php print $string_login_username; ?></p>
				<input type="text" name="login_username" class="login_form_input" />
				<p class="login_form_text"><?php print $string_login_password; ?></p>
				<input type="password" name="login_password" class="login_form_input" />
				<p class="login_form_radiotext"><input type="radio" name="target" value="cms" checked="checked"><?php print $string_login_cms; ?></p>
				<input type="submit" value="<?php print $string_login_submit; ?>" class="login_form_submit" />
			</form>
			<?php
			if(isset($_GET['error'])) {
				$error = $_GET['error'];
				if($error == 1) {
					?>
					<p class="login_form_error"><?php print $string_login_error1; ?></p>
					<?php
					}
				if($error == 2) {
					?>
					<p class="login_form_error"><?php print $string_login_error2; ?></p>
					<?php
					}
				if($error == 3) {
					?>
					<p class="login_form_error"><?php print $string_login_error3; ?></p>
					<?php
					}
			
			}
			?>
		</div>
		<?php
	}
	else {
		?>
		<div id="login_field">
			<p class="login_form_headline"><?php print $string_login_headline; ?></p>
			<?php
			$have_right_cms = array_search('cms', $_SESSION['rights']);
			if($have_right_cms == '1'){
				?>
				<a href="../cms"><button class="login_form_submit"><?php print $string_login_cms; ?></button></a>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</body>
</html>