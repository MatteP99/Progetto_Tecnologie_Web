<?php
require_once 'require.php';

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $login_result = $db->login($_POST["username"], $_POST["password"]);
    if(count($login_result) == 0) {
        $templateParams["error_login"] = "Uno o piu' campi sono errati!";
    } else {
		setUser($login_result[0]);
    }
} 
if(isset($_POST["username"]) && isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["mail_conf"])
		&& isset($_POST["password"]) && isset($_POST["password_conf"]) && isset($_POST["tel"]) && isset($_POST["address"])) {
	if($_POST["unimail"] != "Facoltativa") {
		$db->registerStudent($_POST["name"], $_POST["username"], $_POST["password"], $_POST["mail"], $_POST["tel"], $_POST["address"], $_POST["unimail"]);
	} else {
		$db->register($_POST["name"], $_POST["username"], $_POST["password"], $_POST["mail"], $_POST["tel"], $_POST["address"]);
	}
}

if(isUserLoggedIn()){
    $templateParams["title"] = "ZACCOLLA OSTERIA - Login Home";
	$templateParams["name"] = "login-home.php";
	$templateParams["user_data"] = $db->getUser($_SESSION["id_user"]);
}
else{
    $templateParams["title"] = "ZACCOLLA OSTERIA - Login";
	$templateParams["name"] = "login-form.php";
}

require("template/base.php");
?>