<?php
require_once 'require.php';

if(isUserLoggedIn()){
    if(isAdmin()) {
		$templateParams["title"] = "ZACCOLLA OSTERIA - Delivery Admin";
		$templateParams["name"] = "delivery-admin.php";
	} else {
		$templateParams["title"] = "ZACCOLLA OSTERIA - Delivery";
		$templateParams["name"] = "delivery.php";
	}
} else{
    $templateParams["title"] = "ZACCOLLA OSTERIA - Login";
	$templateParams["name"] = "delivery.php";
}

$templateParams["type"] = $db->getFoodTypes();
$templateParams["food"] = $db->getFood();

require("template/base.php");
?>