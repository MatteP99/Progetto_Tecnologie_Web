<?php
require_once 'require.php';

$templateParams["type"] = $db->getFoodTypes();
$templateParams["food"] = $db->getFood();
//Remove item
foreach ($templateParams["food"] as $food) {
	if(isset($_POST[$food["id_food"]."delete"])) {
		$db->deleteFood($food["id_food"]);
	} //Modify item
	else if ($_POST[$food["id_food"]."modify"])) {
		$fileName = basename($_FILES["image"]["name"]);
		if($_FILES["image"] == ) {
			
			$db->modifyFood($food["id_food"], $_POST["name"], $_POST["description"], $_POST["price"], "/".$fileName, $_POST["type"], $_POST["quantity"])
		} else {
			$db->modifyFood($food["id_food"], $_POST["name"], $_POST["description"], $_POST["price"], "/".$fileName, $_POST["type"], $_POST["quantity"])
		}
	}
}
//Add item
if(isset($_POST["submit"]) /*?*/) {
	if(isset($_FILES["image"])) {
		$fileName = basename($_FILES["image"]["name"]);
		$db->addFood($_POST["name"], $_POST["description"], $_POST["price"], "/".$fileName, $_POST["type"], $_POST["quantity"]);
	} else {
		$db->addFood($_POST["name"], $_POST["description"], $_POST["price"], "", $_POST["type"], $_POST["quantity"]);
	}
}
header("location:delivery.php");


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