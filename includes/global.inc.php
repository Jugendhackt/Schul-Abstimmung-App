<?php

	$settings = require("settings.inc.php");
	
	function db_connect() {
		global $settings;
		$mysqli = new mysqli($settings["dbhost"], $settings["dbusername"], $settings["dbpassword"], $settings["dbname"]);
		if ($mysqli->connect_error) {
			die("Datenbankverbindungsfehler:" . $mysqli->connect_error);
		}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}
	
	function userinfo($mysqli) {
		#$query = $mysqli->query();
	}

?>
