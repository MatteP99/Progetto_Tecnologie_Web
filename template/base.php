<!DOCTYPE html>
<html lang="it">
    <head>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href=
            "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" />
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        <title><?php echo $templateParams["title"]?></title>
    </head>
    <body>
        <nav>
            <div>
                <a class="icon fa fa-bars" aria-label="icona menu a tendina"></a>
            </div>
            <div class="nav_logo">
                <img src="./upload/logo.png" alt="logo" />
            </div>
            <div class="nav_links">
                <ul>
                    <li><a <?php isActive("home.php");?> href="index.php">HOME</a></li>
                    <li><a <?php isActive("menu.php");?> href="menu.php">MENU</a></li>
                    <li><a <?php isActive("delivery.php");?> href="delivery.php">DELIVERY</a></li>
                    <li><a <?php isActive("contacts.php");?> href="contacts.php">CONTATTI</a></li>
                    <li><a <?php isActive("aboutus.php");?> href="aboutus.php">SU DI NOI</a></li>
                </ul>
            </div>
            <div class="nav_contacts">
                <ul>
                    <li><a class="fab fa-facebook" href="https://www.facebook.com/Osteria-Zaccolla" title="icona facebook"></a></li>
                    <li><a class="fab fa-instagram" href="https://www.instagram.com/Osteria-Zaccolla" title="icona instagram"></a></li>
                    <li><a class="fab fa-twitter" href="https://www.twitter.com/Osteria-Zaccolla" title="icona twitter"></a></li>
                </ul>
                <p>Piazza Baschetti 23, 47863, Cesena (FC)</p>
            </div>
        </nav>
        <header>
            <div class="notifications"></div>
            <img src="upload/slideshow/img1.jpg" alt=""/>
        </header>
		<main>
		<?php
		if(isset($templateParams["name"])){
			require($templateParams["name"]);
		}
		?>
		</main>
        <footer>
            <div>
                <img src="./upload/logo.png" alt="logo" />
            </div>
            <div>
                <div>                
                    <ul>
                        <li><a class="fas fa-phone" href="tel:3317848795"> 331-7848795</a><li>
                        <li><a class="fas fa-pen" href="mailto:info@osteriazaccolla.it"> info@osteriazaccolla.it</a><li>
                    </ul>
                </div>
                <div>
                    <p>Piazza Baschetti 23, 47863, Cesena (FC)</p>
                </div>
            </div>
        </footer>
    </body>
</html>