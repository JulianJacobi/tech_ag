<?php
/*
*Verbindung zur Datenbank
*
*@author Julian Jacobi
*/

mysql_connect($config_db_host, $config_db_user, $config_db_pwd)
or die ("Die Verbindung zum Datenbank-Server ist nicht m&ouml;glich, bitte die Verbindungsdaten &uuml;berpr&uuml;fen");

mysql_select_db($config_db_database)
or die ("Die Verbindung zur Datenbank ist nicht m&ouml;glich, bitte den Datenbanknamen &uuml;berpr&uuml;fen");
?>