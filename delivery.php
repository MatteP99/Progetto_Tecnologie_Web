<?php
require_once 'require.php';

$templateParams["type"] = $db->getFoodTypes();
$templateParams["food"] = $db->getFood();
//Remove item
foreach ($templateParams["food"] as $food) {
	if(isset($_POST[$food["id_food"]."delete"])) {
		$db->deleteFood($food["id_food"]);
		header("location:delivery.php");
	}
}
//Modify Item 
if(isset($_POST["m_submit"]) && $_POST["m_id"] != "") {
	$checkImg = false;
	$fileName = basename($_FILES["m_image"]["name"]);
	if($fileName == "") {
		foreach ($templateParams["food"] as $food) {
			if($food["id_food"] == $_POST["m_id"]) {
				$db->modifyFood($_POST["m_id"], $_POST["m_name"], $_POST["m_description"], $_POST["m_price"], $food["img"], $_POST["m_type"], $_POST["m_quantity"]);
				header("location:delivery.php");
			}
		}
	} else {
		$db->modifyFood($_POST["m_id"], $_POST["m_name"], $_POST["m_description"], $_POST["m_price"], $fileName, $_POST["m_type"], $_POST["m_quantity"]);
		header("location:delivery.php");
	}		
}//Add Item 
else if(isset($_POST["m_submit"]) && $_POST["m_id"] == "") {
	$fileName = basename($_FILES["m_image"]["name"]);
	if($fileName != "dummy.png"){
		$db->addFood($_POST["m_name"], $_POST["m_description"], $_POST["m_price"], $fileName, $_POST["m_type"], $_POST["m_quantity"]);
		header("location:delivery.php");
	} else {
		$db->addFood($_POST["m_name"], $_POST["m_description"], $_POST["m_price"], "", $_POST["m_type"], $_POST["m_quantity"]);
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