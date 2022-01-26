<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $templateParams["title"]?></title>
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous"></script>
		<?php?>
	</head>
	<body>
		<header>
			<!--Transizione di immagini + Titolo-->
		</header>
		<main>
		<?php
		if(isset($templateParams["name"])){
			require($templateParams["name"]);
		}
		?>
		</main>
		<aside>
			<nav>
				<ul>
					<!--Login-->
					<li><a <?php isActive("home.php");?> href="index.php">HOME</a></li>
					<li><a <?php isActive("menu.php");?> href="menu.php">MENU</a></li> <!--MENU RISTORANTE-->
					<li><a <?php isActive("delivery.php");?> href="delivery.php">DELIVERY</a></li>
					<li><a <?php isActive("contacts.php");?> href="contacts.php">CONTATTI</a></li>
					<li><a <?php isActive("aboutus.php");?> href="aboutus.php">SU DI NOI</a></li>
					<!--Collegamento Facebook-->
					<!--Collegamento Instagram -->
				</ul>
			</nav>
		</aside>
		<footer>
			<p>FOOTER</p> <!--Immagini ristorante/premi + numero di tel, e-mail, via ecc.-->
		</footer>
	</body>
</html>