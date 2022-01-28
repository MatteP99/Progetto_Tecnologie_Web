<?php
session_start();
//Inclusion of db and functions
require_once("db/database.php");
require_once("utils/functions.php");
$db = new DatabaseHelper("localhost", "root", "", "db_web_project", 3306);

//Costanti
define("UPLOAD_DIR", "./upload/");
?>