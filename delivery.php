<?php
require_once 'require.php';

$templateParams["type"] = $db->getFoodTypes();
$templateParams["food"] = $db->getFood();
//
foreach ($templateParams["food"] as $food) {
	if(isset($_POST[$food["id_food"]."delete"])) {
		$db->deleteFood($food["id_food"]);
		header("location:delivery.php");
	}
}


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



require("template/base.php");
?>