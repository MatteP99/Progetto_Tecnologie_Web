<?php
require_once 'require.php';
//Payment
if(isset($_POST["submit"])) {
	$db->createOrder($_SESSION["id_user"]);
	$lastOrder = $db->getIdOrder();
	$lastOrder = $lastOrder[0]["MAX(orders.id_order)"];
	$cookie = str_replace(array('"', 'c', 'a', 'r', 't', '_', 'i', 'd', 's', ':', '{', '}'), '', (string)$_COOKIE["cart"]);
	$arrayFood = array();
	$arrayQuantity = array();
	for($i = 0; $i < strlen($cookie); $i++){
		if($cookie[$i] == ",") {
			array_push($arrayFood, (int)$cookie[$i - 2]);
			array_push($arrayQuantity, (int)$cookie[$i - 1]);
		} else if($i == strlen($cookie) - 1) {
			array_push($arrayFood, (int)$cookie[$i - 1]);
			array_push($arrayQuantity, (int)$cookie[$i]);
		}
	}
	$totalPrice = 0.0;
	for($i = 0; $i < count($arrayFood); $i++) {
		$price = $db->getFoodPrice($arrayFood[$i]);
		$totalPrice = $totalPrice + ((double)$price[0]["price"] * $arrayQuantity[$i]);
		$db->insertListFood($lastOrder, $arrayFood[$i], $arrayQuantity[$i]);
	}
	if($_SESSION["user_status"] == "Cliente-Studente") {
		$totalPrice = $totalPrice - ($totalPrice * 0.2);
	}
	$db->insertTotalPrice($lastOrder, $totalPrice);
    unset($_COOKIE['cart']); 
    setcookie('cart', null, -1, '/');
    header("location:login.php");
}
//Check if user is logged
if(isUserLoggedIn()){
	$templateParams["user_data"] = $db->getUser($_SESSION["id_user"]);
	if($_SESSION["user_status"] == "Cliente-Studente") {
		$templateParams["user_university"] = $db->getUniUser($_SESSION["id_user"]);
	}
	$templateParams["user_logged"] = "Yes";
}

$templateParams["title"] = "ZACCOLLA OSTERIA - Pagamento";
$templateParams["name"] = "payment.php";

require("template/base.php");
?>