<?php
	
	function head($pagetitle) {
		?>
		<!DOCTYPE html>
		<html lang="de">
        	<head>
        		<meta charset="utf-8">
        		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        		<title><?php echo strlen($pagetitle)>0?$pagetitle . " &ndash; ":""; ?>Schulstimme</title>
				<link href="idee.html" type="html" rel="important"/>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
				<link rel="stylesheet" href="design.css">
                </head>
		<?php
		return true;
	}
	
	function navbar() {
		global $userinfo;
		?>
		<div class="p-1 mb-1" style="background-color: #e3f2fd;">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="./">
					<img src="logo.svg" width="30" height="30" class="d-inline-block align-top" alt=""> Schulstimme
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="dropdown-item" href="./">Home</a>
						</li>
					<?php if ($userinfo["position"] == "studentcouncil") { ?>
						<li class="nav-item">
							<a class="dropdown-item" href="./idea.php">Ideen</a>
						</li>
						<li class="nav-item">
							<a class="dropdown-item" href="./surveys.php">Umfragen</a>
						</li>
						<li class="nav-item">
							<a class="dropdown-item" href="./members.php">Mitglieder</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="dropdown-item" href="./idea.php">Idee hinzufügen</a>
						</li>
					<?php } ?>
						<li class="nav-item">
							<a class="dropdown-item" href="./results.php">Ergebnisse ansehen</a>
						</li>						
					</ul>
					<ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
						<li class="nav-item">
							<a class="dropdown-item" href="#">Abmelden</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="container">
		<?php
		return true;
	}
	
	function footer() {
		?>
				</div>
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
			</body>
		</html>
		<?php
		return true;
	}
	
?>
