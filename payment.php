<?php
require_once 'require.php';
//Payment
if(isset($_POST["submit"])) {
	$db->createOrder($_SESSION["id_user"]);
	$lastOrder = $db->getIdOrder();
	$lastOrder = $lastOrder[0]["MAX(orders.id_order)"];
	$cookie = str_replace(array('"', 'c', 'a', 'r', 't', '_', 'i', 'd', 's', '{', '}'), '', (string)$_COOKIE['cart']);
	$arrayFood = array();
	$arrayQuantity = array();
	$arrayTemp = array();
	for($i = 0; $i < strlen($cookie); $i++){
		if($i != 0 && $cookie[$i] != ":" && $cookie[$i] != ",") {
			array_push($arrayTemp, $cookie[$i]);
		}
		if($cookie[$i] == ":" && $i != 0) {
			$string = "";
			for($j = 0; $j < count($arrayTemp); $j++) {
				$string = $string.$arrayTemp[$j];
			}
			array_push($arrayFood, (int)$string);
			unset($arrayTemp);
			$arrayTemp = array();
		} else if($cookie[$i] == ",") {
			$string = "";
			for($j = 0; $j < count($arrayTemp); $j++) {
				$string = $string.$arrayTemp[$j];
			}
			array_push($arrayQuantity, (int)$string);
			unset($arrayTemp);
			$arrayTemp = array();
		} else if($i == strlen($cookie) - 1) {
			$string = "";
			for($j = 0; $j < count($arrayTemp); $j++) {
				$string = $string.$arrayTemp[$j];
			}
			array_push($arrayQuantity, (int)$string);
		}
	}
	$totalPrice = 0.0;
	print_r($arrayFood);
	print_r($arrayQuantity);
	for($i = 0; $i < count($arrayFood); $i++) {
		$price = $db->getFoodPrice($arrayFood[$i]);
		$totalPrice = $totalPrice + ((double)$price[0]["price"] * $arrayQuantity[$i]);
		$quantity_food = $db->getFoodQuantity($arrayFood[$i]);
		$final_quantity = (double)$quantity_food[0]["quantity"] - $arrayQuantity[$i];
		
		$db->removeQuantityFood($arrayFood[$i], $final_quantity);
		$db->insertListFood($lastOrder, $arrayFood[$i], $arrayQuantity[$i]);
		$check_food = $db->getFoodQuantity($arrayFood[$i]);
		if($check_food[0]["quantity"] == 0) {
			$db->createNotifyAdminQuantityFood($arrayFood[$i]);
		} else if ($check_food[0]["quantity"] <= 5) {
			$db->createNotifyAdminLowQuantityFood($arrayFood[$i]);
		}
	}
	$db->createNotifyAdminOrder($lastOrder);
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
	$templateParams["title"] = "ZACCOLLA OSTERIA - Pagamento";
	$templateParams["name"] = "payment.php";
} else {
	header("location:login.php");
}

require("template/base.php");
?>