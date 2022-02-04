<?php
require_once 'require.php';

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $login_result = $db->login($_POST["username"], $_POST["password"]);
    if(count($login_result) == 0) {
        $templateParams["errorlogin"] = "Uno o piu' campi sono errati!";
    } else {
		setUser($login_result[0]);
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