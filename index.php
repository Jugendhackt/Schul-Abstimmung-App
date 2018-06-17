<?php

	require("./includes/global.inc.php");
	$con = db_connect();
	head("Home");
	navbar();
	
	if (isset($_GET["voted"])) {
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<b>Super!</b> Deine Stimme wurde gewertet!
				<button type="button" class="close">
					<span>&times;</span>
    			</button>
			</div>
		<?php
	}
	
	$query = $con->query("SELECT * FROM surveys WHERE school = '" . $userinfo["school"] . "'");
	if ($query->num_rows > 0) {
		
		while ($row = $query->fetch_assoc()) {
			?>
			<div class="jumbotron">
				<h1><?php echo $row["title"]; ?></h1>
				<p><?php echo $row["description"]; ?></p>
			<?php
			if (in_array($userinfo["id"], explode(",", $row["voted"]))) {
				echo "<a class=\"btn btn-secondary btn-lg disabled\" role=\"button\">Bereits teilgenommen</a>";
			} else {
				echo "<a class=\"btn btn-primary btn-lg\" href=\"./vote.php?id=" . $row["id"] . "\" role=\"button\">Teilnehmen</a>";
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
