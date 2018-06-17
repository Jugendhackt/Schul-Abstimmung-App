<?php

	require("./includes/global.inc.php");
	$con = db_connect();
	head("Home");
	navbar();

	$query = $con->query("SELECT * FROM surveys WHERE school = '" . $userinfo["school"] . "'");
	if ($query->num_rows > 0) {
		while ($row = $query->fetch_assoc()) {
			?>
				<div class="jumbotron">
					<h1 class="display-4"><?php echo $row["title"]; ?></h1>
					<p class="lead"><?php echo $row["description"]; ?></p>
					<?php
					
						if (in_array($userinfo["id"], explode(",", $row["voted"]))) {
							echo "<a class=\"btn btn-primary btn-lg disabled\" role=\"button\">Bereits teilgenommen</a>";
						} else {
							echo "<a class=\"btn btn-primary btn-lg\" href=\"#\" role=\"button\">Teilnehmen</a>";
						}
						
					?>
				</div>
			<?php
		}
	} else {
		echo "<i class=\"text-center\">Derzeit gibt es leider keine Umfragen für dich.</i>";
	}
	
	footer();

?>
