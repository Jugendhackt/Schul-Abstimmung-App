<?php

	require("./includes/global.inc.php");
	head("Ergebnisse");
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
	
	$query = $con->query("SELECT * FROM surveys WHERE school = '" . $userinfo["school"] . "' AND status = 'finished'");
	if ($query->num_rows > 0) {
		
		while ($row = $query->fetch_assoc()) {
				$votes = $row["votes1"] + $row["votes2"] + $row["votes3"] + $row["votes4"] + $row["votes5"] + $row["votes6"];
				?>
					<div class="jumbotron">
						<h1><?php echo $row["title"]; ?></h1>
				<?php if (strlen($row["option1"]) > 0) { ?>
					<b><?php echo $row["option1"]; ?></b> &ndash; <?php echo round(($row["votes1"] / $votes) * 100, 1); ?>% (<?php echo $row["votes1"] . " von " . $votes; ?>)
					<div class="progress border">
						<div class="progress-bar" role="progressbar" style="width: <?php echo round(($row["votes1"] / $votes) * 100, 1); ?>%;"></div>
					</div>
				<?php } ?>
				<?php if (strlen($row["option2"]) > 0) { ?>
					<b><?php echo $row["option2"]; ?></b> &ndash; <?php echo round(($row["votes2"] / $votes) * 100, 1); ?>% (<?php echo $row["votes2"] . " von " . $votes; ?>)
					<div class="progress border">
						<div class="progress-bar" role="progressbar" style="width: <?php echo round(($row["votes2"] / $votes) * 100, 1); ?>%;"></div>
					</div>
				<?php } ?>
				<?php if (strlen($row["option3"]) > 0) { ?>
					<b><?php echo $row["option3"]; ?></b> &ndash; <?php echo round(($row["votes3"] / $votes) * 100, 1); ?>% (<?php echo $row["votes3"] . " von " . $votes; ?>)
					<div class="progress border">
						<div class="progress-bar" role="progressbar" style="width: <?php echo round(($row["votes3"] / $votes) * 100, 1); ?>%;"></div>
					</div>
				<?php } ?>
				<?php if (strlen($row["option4"]) > 0) { ?>
					<b><?php echo $row["option4"]; ?></b> &ndash; <?php echo round(($row["votes4"] / $votes) * 100, 1); ?>% (<?php echo $row["votes4"] . " von " . $votes; ?>)
					<div class="progress border">
						<div class="progress-bar" role="progressbar" style="width: <?php echo round(($row["votes4"] / $votes) * 100, 1); ?>%;"></div>
					</div>
				<?php } ?>
				<?php if (strlen($row["option5"]) > 0) { ?>
					<b><?php echo $row["option5"]; ?></b> &ndash; <?php echo round(($row["votes5"] / $votes) * 100, 1); ?>% (<?php echo $row["votes5"] . " von " . $votes; ?>)
					<div class="progress border">
						<div class="progress-bar" role="progressbar" style="width: <?php echo round(($row["votes5"] / $votes) * 100, 1); ?>%;"></div>
					</div>
				<?php } ?>
				<?php if (strlen($row["option6"]) > 0) { ?>
					<b><?php echo $row["option6"]; ?></b> &ndash; <?php echo round(($row["votes6"] / $votes) * 100, 1); ?>% (<?php echo $row["votes6"] . " von " . $votes; ?>)
					<div class="progress border">
						<div class="progress-bar" role="progressbar" style="width: <?php echo round(($row["votes6"] / $votes) * 100, 1); ?>%;"></div>
					</div>
				<?php } ?>
			</div>
	<?php
		}
		
	} else {
		echo "<p class=\"text-center\"><i>Derzeit gibt es leider keine Ergebnisse für dich.</i></p>";
	}
	
	footer();

?>
