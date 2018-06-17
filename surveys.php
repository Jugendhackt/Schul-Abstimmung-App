<?php

	require("./includes/global.inc.php");
	head("Umfragen");
	navbar();
	
	if ($userinfo["position"] != "studentcouncil") {
		header("Location: ./");
		die("Keine Berechtigung.");
	}
	
	$query = $con->query("SELECT * FROM surveys WHERE school = '" . $userinfo["school"] . "'");
	if ($query->num_rows > 0) {
	
		while ($row = $query->fetch_assoc()) {
				?>
					<div class="jumbotron">
						<div class="btn-group-vertical float-right pull-right">
							<button type="button" class="btn btn-primary">Bearbeiten</button>
							<button type="button" class="btn btn-danger">Beenden</button>
						</div>
						<h1><?php echo $row["title"]; ?></h1>
						<p><?php 
							if ($status == "unpublished") {
								"Unveröffentlicht";
							} elseif ($status == "active") {
								"Läuft";
							} if ($status == "finished") {
								"Beendet";
							}
						?> | <?php echo $row["votes1"] + $row["votes2"] + $row["votes3"] + $row["votes4"] + $row["votes5"] + $row["votes6"]; ?> Teilnehmer*innen | Läuft bis 
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
