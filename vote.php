<?php

	require("./includes/global.inc.php");
	
	if ($userinfo["position"] == "teacher") {
		header("Location: ./");
		die("Keine Berechtigung.");
	}
	
	if (!isset($_GET["id"])) {
		header("Location: ./");
		die("Die aufgerufene Umfrage ist ungültig.");
	} else {
		$sid = $con->real_escape_string($_GET["id"]);
		$survey = $con->query("SELECT * FROM surveys WHERE id = '" . $sid . "' AND school = '" . $userinfo["school"] . "'");
		if ($survey->num_rows != 1) {
			header("Location: ./");
			die("Die aufgerufene Umfrage ist ungültig.");
		} else {
			$survey = $survey->fetch_assoc();
			if (!is_null($row["maxtime"]) && time() > strtotime($survey["maxtime"])) {
				header("Location: ./");
				die("Die aufgerufene Umfrage ist bereits beendet.");
			}
			if (in_array($userinfo["id"], explode(",", $survey["voted"]))) {
				header("Location: ./");
				die("Die aufgerufene Umfrage ist ungültig.");
			}
			if (isset($_POST["choise"]) && strlen($survey["option" . $_POST["choise"]]) > 0) {
				$con->real_escape_string($_POST["choise"]);
				if (!is_null($survey["maxusers"]) && ($survey["votes1"] + $survey["votes2"] + $survey["votes3"] + $survey["votes4"] + $survey["votes5"] + $survey["votes6"] + 1) >= $survey["maxusers"]) {
					$con->query("UPDATE surveys SET status = 'finished' WHERE id = '" . $sid . "'") or die($con->error);
				}
				$con->query("UPDATE surveys SET votes" . $_POST["choise"] . " = votes" . $_POST["choise"] . " + 1, voted = concat(voted, '" . $userinfo["id"] . ",') WHERE id = '" . $sid . "'");
				header("Location: ./?voted");
				die("Vielen Dank! Deine Stimme wurde gewertet!");
			}
		}
	}
	
	head("Abstimmen");
	navbar();
	?>
	<div class="jumbotron">
		<h1><?php echo $survey["title"]; ?></h1>
		<form action="" method="POST">
		<?php if (strlen($survey["option1"]) > 0 || strlen($survey["option2"]) > 0 || strlen($survey["option3"]) > 0) { ?>
			<div class="btn-group btn-group-lg" role="group">
				<?php if (strlen($survey["option1"]) > 0) { ?>
					<button type="submit" class="btn btn-outline-secondary btn-lg" name="choise" value="1"><?php echo $survey["option1"]; ?></button>
				<?php } ?>
				<?php if (strlen($survey["option2"]) > 0) { ?>
					<button type="submit" class="btn btn-outline-secondary btn-lg" name="choise" value="2"><?php echo $survey["option2"]; ?></button>
				<?php } ?>
				<?php if (strlen($survey["option3"]) > 0) { ?>
					<button type="submit" class="btn btn-outline-secondary btn-lg" name="choise" value="3"><?php echo $survey["option3"]; ?></button>
				<?php } ?>
			</div><br />
		<?php } ?>
		<?php if (strlen($survey["option4"]) > 0 || strlen($survey["option5"]) > 0 || strlen($survey["option6"]) > 0) { ?>
			<div class="btn-group btn-group-lg" role="group" aria-label="...">
				<?php if (strlen($survey["option4"]) > 0) { ?>
					<button type="submit" class="btn btn-outline-secondary btn-lg" name="choise" value="4"><?php echo $survey["option4"]; ?></button>
				<?php } ?>
				<?php if (strlen($survey["option5"]) > 0) { ?>
					<button type="submit" class="btn btn-outline-secondary btn-lg" name="choise" value="5"><?php echo $survey["option5"]; ?></button>
				<?php } ?>
				<?php if (strlen($survey["option6"]) > 0) { ?>
					<button type="submit" class="btn btn-outline-secondary btn-lg" name="choise" value="6"><?php echo $survey["option6"]; ?></button>
				<?php } ?>
			</div>
		<?php } ?>
		</form>
	</div>		
	<?php
	
	footer();

?>
