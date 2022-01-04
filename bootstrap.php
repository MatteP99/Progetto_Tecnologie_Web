<?php
	//Inclusione file connessione database e istanziamento db
	require_once("db/database.php");
	$db = new DatabaseHelper("localhost", "root", "", "dbsito", 3306);
	
	//Costanti
	define("NOMECOSTANTE", "valore");
?>