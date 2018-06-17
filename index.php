<?php

	require("./includes/global.inc.php");
	head("Home");
	navbar();
	
	if (isset($_GET["voted"])) {
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<b>Super!</b> Deine Stimme wurde gewertet! Vielen Dank dafür!
				<button type="button" class="close" data-dismiss="alert">
					<span>&times;</span>
    			</button>
			</div>
		<?php
	} elseif (isset($_GET["idea"])) {
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<b>Super!</b> Deine Idee wurde eingereicht! Vielen Dank dafür!
				<button type="button" class="close" data-dismiss="alert">
					<span>&times;</span>
    			</button>
			</div>
		<?php
	}
	
	if ($userinfo["position"] == "teacher") {
		?>
			<div class="jumbotron">
				<h1>Willkommen bei Schulstimme!</h1>
				<img src="logo.svg" width="300" height="300" class="d-inline-block float-left" alt="">
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>
			</div>
		<?php
	} else {
		$query = $con->query("SELECT * FROM surveys WHERE school = '" . $userinfo["school"] . "' AND status = 'active'");
		if ($query->num_rows > 0) {
		
			while ($row = $query->fetch_assoc()) {
				if (!is_null($row["maxtime"]) && time() > strtotime($row["maxtime"])) {
					$con->query("UPDATE surveys SET status = 'finished' WHERE id = '" . $row["id"] . "'");
				} else {
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
			}
		
		} else {
			echo "<p class=\"text-center\"><i>Derzeit gibt es leider keine Umfragen für dich.</i></p>";
		}
	}
	
	footer();

?>
