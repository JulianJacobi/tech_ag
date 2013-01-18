<?php
/**
*Login Script für Technik AG CMS
*
*@author Julian Jacobi
**/
session_start();
require("../include/config.php");
require("../include/connect.php");

$eingabe_act = $_POST['login_username'];
//echo $eingabe_act;
$eingabe_pwd = md5($_POST['login_password']);
//echo $eingabe_pwd;

$abfrage_act = mysql_query("SELECT * FROM ".$config_db_prefix."login WHERE username = '$eingabe_act'");
$return_act = mysql_num_rows($abfrage_act);
if($return_act == 1){
	$return_pwd = mysql_fetch_object($abfrage_act);
	$real_pwd = "$return_pwd->passwd";
	if($real_pwd == $eingabe_pwd){
		$target = $_POST['target'];
		$rights = decbin("$return_pwd->rights");
		$rights = strrev($rights);
		//echo $rights;
		$rechte = array();
		$length = strlen($rights);
		//echo $length;
		for($i = 0; $i <= $length-1; $i++) {
			$tmp = strpos($rights, '1');
			if($tmp === false) {
				break;
			}
			$rights[$tmp] = 0;
			//echo $rights." ";
			//echo $tmp;
			$tmp = pow('2', $tmp);
			//echo $tmp."<br>";
			$abfrage_rights = mysql_query("SELECT * FROM ".$config_db_prefix."rights WHERE multiplier = '$tmp'");
			//echo mysql_num_rows($abfrage_rights);
			if(mysql_num_rows($abfrage_rights) == 1) {
				$return_rights = mysql_fetch_object($abfrage_rights);
				$rechte["$return_rights->multiplier"] = "$return_rights->value";
				//echo $rechte[$i];
			}
		}
		//print_r($rechte);
		$have_right_cms = array_search($target, $rechte);			//Rechte für CMS
		//echo $have_right_cms;
		if($have_right_cms > '0') {												//Login zum CMS
			$_SESSION['id'] = "$return_pwd->id";
			$_SESSION['username'] = "$return_pwd->username";
			$_SESSION['first_name'] = "$return_pwd->first_name";
			$_SESSION['last_name'] = "$return_pwd->last_name";
			$_SESSION['mail'] = "$return_pwd->mail";
			$_SESSION['rights'] = $rechte;
			echo '<meta http-equiv="refresh" content="0; URL=../cms/">';
		}
		else {
			echo '<meta http-equiv="refresh" content="0; URL=./?error=2">';
		}
	}
	else{
		echo '<meta http-equiv="refresh" content="0; URL=./?error=1">';
	}
}
else{
	echo '<meta http-equiv="refresh" content="0; URL=./?error=1">';
}
?>