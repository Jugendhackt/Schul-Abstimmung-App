<?php
	
	function head($pagetitle) {
		?>
		<!DOCTYPE html>
		<html lang="de">
        	<head>
        		<meta charset="utf-8">
        		<title><?php echo strlen($pagetitle)>0?$pagetitle . " &ndash; ":""; ?>Schulstimme</title>
				<link href="idee.html" type="html" rel="important"/>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
				<link rel="stylesheet" href="design.css">
                </head>
		<?php
		return true;
	}
	
	function navbar() {
		?>
		<nav class="navbar navbar-light mb-1" style="background-color: #e3f2fd;">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#">Navbar</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="./">Home</a>
								<a class="dropdown-item" href="#">Idee hinzufügen</a>
								<a class="dropdown-item" href="#">Ergebnisse ansehen</a>
								<a class="dropdown-item" href="#">Abmelden</a>
							</div>
	  
						</li>
					</ul>
				</div>
			</nav>
		</nav>
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
