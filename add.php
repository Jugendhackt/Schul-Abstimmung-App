<?php

	require("./includes/global.inc.php");
	
	if ($userinfo["position"] != "studentcouncil") {
		header("Location: ./");
		die("Keine Berechtigung.");
	}
	
	head("Umfrage hinzufügen");
	navbar();
	
	if (isset($_POST["sbm"])) {
		$maxtime = strlen($_POST["surveyMaxTime"])>0?date('Y-m-d H:i:s', strtotime($con->real_escape_string($_POST["surveyMaxTime"]))):"NULL";
		$maxuser = strlen($_POST["surveyMaxUsers"])>0?$con->real_escape_string($_POST["surveyMaxUsers"]):"NULL";
		$con->query("INSERT INTO surveys(id, school, type, user, time, status, title, description, image, maxusers, maxtime, option1, votes1, option2, votes2, option3, votes3, option4, votes4, option5, votes5, option6, votes6, voted) VALUES ('NULL', '" . $userinfo["school"] . "', '" . $con->real_escape_string($_POST["surveyType"]) . "', '" . $userinfo["id"] . "', 'NULL', 'active', '" . $con->real_escape_string($_POST["surveyTitle"]) . "', '" . $con->real_escape_string($_POST["surveyText"]) . "', '', '" . $maxuser . "', '" . $maxtime . "', '" . $con->real_escape_string($_POST["surveyOption1"]) . "', '0', '" . $con->real_escape_string($_POST["surveyOption2"]) . "', '0', '" . $con->real_escape_string($_POST["surveyOption3"]) . "', '0', '" . $con->real_escape_string($_POST["surveyOption4"]) . "', '0', '" . $con->real_escape_string($_POST["surveyOption5"]) . "', '0', '" . $con->real_escape_string($_POST["surveyOption6"]) . "', '0', '')") or die($con->error);
		@header("Location: ./surveys.php");
		die("Umfrage hinzugefügt!");
	}
	
	?>
		
		<div class="jumbotron">
		<h1>Umfrage hinzufügen</h1>
		<form action="" method="POST">
			<div class="form-group">
				<label for="surveyTitle">Titel</label>
				<input type="text" class="form-control" id="surveyTitle" name="surveyTitle" required minlength="5">
			</div>
			<div class="form-group">
				<label for="surveyText">Beschreibung</label>
				<textarea class="form-control" id="surveyText" name="surveyText" rows="3" required minlength="10"></textarea>
			</div>
			<div class="form-group">
				<label for="surveyType">Typ</label>
				<select class="form-control" id="surveyType" name="surveyType" required>
					<option value="private">Privat</option>
					<option value="public">Öffentlich</option>
				</select>
			</div>
			<div class="form-group">
				<label for="surveyOption1">Antwort 1</label>
				<input type="text" class="form-control" id="surveyOption1" name="surveyOption1" required minlength="2">
			</div>
			<div class="form-group">
				<label for="surveyOption2">Antwort 2</label>
				<input type="text" class="form-control" id="surveyOption2" name="surveyOption2" required minlength="2">
			</div>
			<div class="form-group">
				<label for="surveyOption3">Antwort 3</label>
				<input type="text" class="form-control" id="surveyOption3" name="surveyOption3" minlength="2">
			</div>
			<div class="form-group">
				<label for="surveyOption4">Antwort 4</label>
				<input type="text" class="form-control" id="surveyOption4" name="surveyOption4" minlength="2">
			</div>
			<div class="form-group">
				<label for="surveyOption5">Antwort 5</label>
				<input type="text" class="form-control" id="surveyOption5" name="surveyOption5" minlength="2">
			</div>
			<div class="form-group">
				<label for="surveyOption6">Antwort 6</label>
				<input type="text" class="form-control" id="surveyOption6" name="surveyOption6" minlength="2">
			</div>
			<div class="form-group">
				<label for="surveyMaxUsers">Maximale Anzahl an Usern</label>
				<input type="text" class="form-control" id="surveyMaxUsers" name="surveyMaxUsers" placeholder="(Leer lassen für keine Grenze)">
			</div>
			<div class="form-group">
				<label for="surveyMaxTime">Enddatum</label>
				<input type="date" class="form-control" id="surveyMaxTime" name="surveyMaxTime">
			</div>
		  <button type="submit" class="btn btn-primary" name="sbm">Speichern</button>
		</form>
	</div>
		
	<?php
	
	footer();

?>
