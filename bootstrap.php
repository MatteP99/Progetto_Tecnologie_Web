<?php
	//Inclusione file connessione database e istanziamento db
	require_once("db/database.php");
	$db = new DatabaseHelper("localhost", "root", "", "db_progetto_web", 3306);
	
	//Costanti
	define("NOMECOSTANTE", "valore");
?>