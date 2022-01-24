<?php
	//Inclusione require.php
	require_once("require.php");

	//Logica
	//Aggiunta di controllo, utente loggato o non
	$templateParams["title"] = "Home";
	$templateParams["name"] = "home.php"
	$templateParams["cibo"] = $db->getCibo();

	//Inclusione base.php
	require("template/base.php");
?>
