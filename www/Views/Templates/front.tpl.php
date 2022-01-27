<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="apple-touch-icon" sizes="180x180" href="Assets\images\favicon\apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="Assets\images\favicon\/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="Assets\images\favicon\/favicon-16x16.png">
		<link rel="manifest" href="Assets\images\favicon\/site.webmanifest">
		<link rel="mask-icon" href="Assets\images\favicon\safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		<title>Projet</title>
		<meta name="viewport" content="user-scalable=no, width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
		<link rel="stylesheet" type="text/css" media="screen" href="Assets\css\prod\styles.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="Assets\css\styles-dev.css">
		<script src="Assets\js\jquery.min.js"></script>
		<script src="Assets\js\esgi-scripts.js"></script>
	</head>
	<body>
		<header id="esgi-header">
			<div class="esgi-site">
				<img class="esgi-logo" src="Assets\images\esgi.png" alt="logo">
				<h1>Projet</h1>
			</div>

			<div class="esgi-header-tools">
				<?php
					session_start();
					if (isset($_SESSION['userID'])) {
						echo '<a href="/users">Utilisateurs</a>';
						echo '<a href="/logout">Se déconnecter</a>';
					}else {
						echo '<a href="/login">Se connecter</a>';
						echo '<a href="/register">S\'inscrire</a>';
					}
				?>
				<a href="/">Accueil</a>
				<a href="/help">Aide</a>
			</div>
		</header>
		
		<main id="esgi-main">
			<?php require $this->view;?>
		</main>

		<footer id="esgi-footer">
				<p>Bienvenue sur mon Site WEB</p>
				<p>© All rights reserved</p>
		</footer>
	</body>
</html>