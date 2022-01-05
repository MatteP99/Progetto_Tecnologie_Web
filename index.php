<?php
	//Inclusione bootstrap
	require_once("bootstrap.php");

	//Logica
	$templateParams["Cibo"] = $db->getCibo();

	//Pagina introduttiva
	require("template/home.php");
?>
