<?php

	require("./includes/global.inc.php");
	head("Umfragen");
	navbar();
	
	if ($userinfo["position"] != "studentcouncil") {
		header("Location: ./");
		die("Keine Berechtigung.");
	}
	
	if (isset($_GET["end"])) {
		$sid = $con->real_escape_string($_GET["end"]);
		$query = $con->query("UPDATE surveys SET status = 'finished' WHERE id = '" . $sid . "' AND school = '" . $userinfo["school"] . "'");
		@header("Location: ./surveys.php");
	}
	
	?>
		<div class="jumbotron p-2">
			<a class="btn btn-success float-right pull-right" href="./add.php">Hinzufügen</a>
			<h1>Umfragen verwalten</h1>
		</div>
	<?php
	$query = $con->query("SELECT * FROM surveys WHERE school = '" . $userinfo["school"] . "'");
	if ($query->num_rows > 0) {
		while ($row = $query->fetch_assoc()) {
				?>
					<div class="jumbotron">
						<a class="btn btn-danger float-right pull-right" href="./surveys.php?end=<?php echo $row["id"]; ?>">Beenden</a>
						<h1><?php echo $row["title"]; ?></h1>
						<p><?php 
							if ($row["status"] == "unpublished") {
								echo "Unveröffentlicht";
							} elseif ($row["status"] == "active") {
								echo "Läuft";
							} if ($row["status"] == "finished") {
								echo "Beendet";
							}
						?> | <?php echo $row["type"]=="public"?"Öffentlich":"Privat"; ?> | <?php echo $row["votes1"] + $row["votes2"] + $row["votes3"] + $row["votes4"] + $row["votes5"] + $row["votes6"]; ?> Teilnehmer*innen | Läuft bis 
						<?php
							if (is_null($row["maxusers"]) && is_null($row["maxtime"])) {
								echo "zum manuellen Beenden";
							} elseif (!is_null($row["maxusers"]) && is_null($row["maxtime"])) {
								echo $row["maxusers"] . " Teilnahmen";
							} elseif (is_null($row["maxusers"]) && !is_null($row["maxtime"])) {
								echo "zum " . date("d.m.Y H:i:s", strtotime($row["maxtime"])) . " Uhr";
							} else {
								echo "zum " . date("d.m.Y H:i:s", strtotime($row["maxtime"])) . " Uhr oder bis " . $row["maxusers"] . " Teilnahmen";
							}
							
						?></p>
						
					</div>
				<?php
		}
	
	} else {
		echo "<p class=\"text-center\"><i>Es wurden noch keine Umfragen erstellt.</i></p>";
	}
	
	footer();

?>
