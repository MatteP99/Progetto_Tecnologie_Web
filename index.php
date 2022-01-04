<?php
	//Inclusione bootstrap
	require_once("bootstrap.php");

	//Logica
	$templateParams["titolo"] = "Home";
	$templateParams["sediuniversitarie"] = $db->getSedeUniversitaria();

	//Pagina introduttiva
	require("template/base.php");
?>
