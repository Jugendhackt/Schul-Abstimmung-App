<?php

	require("./includes/global.inc.php");
	head("Idee hinzufügen");
	navbar();
	
	if (isset($_POST["sbm"])) {
		if (isset($_POST["ideaTitle"]) && isset($_POST["ideaText"]) && strlen($_POST["ideaTitle"]) >= 5 && strlen($_POST["ideaText"]) >= 10) {
			$idTitle = $con->real_escape_string($_POST["ideaTitle"]);
			$idText = $con->real_escape_string($_POST["ideaText"]);
			$con->query("INSERT INTO ideas(id, school, user, time, title, text) VALUES ('','" . $userinfo["school"] . "','" . $userinfo["id"] . "','','" . $idTitle . "','" . $idText . "')") or die($con->error);
			header("Location: ./?idea");
			die("Vielen Dank! Deine Idee wurde eingereicht!");
		} else {
			?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<b>Halt stop!</b> Bitte fülle alle Felder vollständig aus!
					<button type="button" class="close" data-dismiss="alert">
						<span>&times;</span>
					</button>
				</div>
			<?php
		}
	}
	
?>
	<div class="jumbotron">
		<h1>Idee hinzufügen</h1>
		<form action="" method="POST">
			<div class="form-group">
				<label for="ideaTitle">Titel der Idee</label>
				<input type="text" class="form-control" id="ideaTitle" name="ideaTitle" required minlength="5">
			</div>
			<div class="form-group">
				<label for="ideaText">Beschreibung</label>
				<textarea class="form-control" id="ideaText" name="ideaText" rows="3" required minlength="10"></textarea>
			</div>
		  <button type="submit" class="btn btn-primary" name="sbm">Einreichen</button>
		</form>
	</div>
<?php

	footer();

?>
