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
    $templateParams["title"] = "Blog TW - Admin";
    $templateParams["name"] = "login-home.php";
}
else{
    $templateParams["title"] = "ZACCOLLA OSTERIA - Login";
	$templateParams["name"] = "login-form.php";
}
$templateParams["type"] = $db->getFoodTypes();
$templateParams["food"] = $db->getFood();

require("template/base.php");
?>