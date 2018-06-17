<?php

	$settings = require("settings.inc.php");
	require("template.inc.php");
	
	function db_connect() {
		global $settings;
		$mysqli = new mysqli($settings["dbhost"], $settings["dbusername"], $settings["dbpassword"], $settings["dbname"]);
		if ($mysqli->connect_error) {
			die("Datenbankverbindungsfehler:" . $mysqli->connect_error);
		}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}
	
	function userinfo($mysqli, $user) {
		$query = $mysqli->query("SELECT * FROM people WHERE id = '" . $mysqli->real_escape_string($user) . "'");
		if ($query->num_rows == 1) {
			return $query->fetch_assoc();
		} else {
			return false;
		}
	}
	
	function surveyinfo($mysqli, $survey) {
		$query = $mysqli->query("SELECT * FROM surveys WHERE id = '" . $mysqli->real_escape_string($survey) . "'");
		if ($query->num_rows == 1) {
			return $query->fetch_assoc();
		} else {
			return false;
		}
	}
	
	$con = db_connect();
	$userinfo = userinfo($con, 2);
	$con->close();

?>
