<?php
require_once 'require.php';

if(isset($_POST["username"]) && isset($_POST["password"])) {
	
    $check = $db->login($_POST["username"], $_POST["password"]);
    if($check == 0) {
        $templateParams["check"] = "L'username o la password inseriti sono errati!";
    } else {
        $templateParams["check"] = "Il Login e' andato a buon fine.";
        setUser($check[0]);
    }

}


$templateParams["type"] = $db->getFoodTypes();
$templateParams["food"] = $db->getFood();
$templateParams["title"] = "ZACCOLLA OSTERIA - Login";
$templateParams["name"] = "login-form.php";

require("template/base.php");
?>