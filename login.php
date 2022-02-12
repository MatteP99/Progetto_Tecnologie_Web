<?php
require_once 'require.php';
//Login
if(isset($_POST["username"]) && isset($_POST["password"]) && $_POST["accesso"] == 'Login') {
    $login_result = $db->login($_POST["username"], $_POST["password"]);
    if(count($login_result) == 0) {
        $templateParams["error_login"] = "Uno o piu' campi sono errati!";
    } else {
		setUser($login_result[0]);
    }
}//Registration 
else if(isset($_POST["accesso"]) && $_POST["accesso"] == 'Registrazione') {
	$check_users = $db->getUserFromName($_POST["username"]);
	//Check if the username already exist
	if(count($check_users) == 0) {
		$check_users = $db->getUserFromMail($_POST["mail"]);
		//Check if the mail already exist
		if(count($check_users) == 0) {
			//Check if user selected he is a student
			if(isset($_POST["student"]) && isset($_POST["unimail"]) && isset($_POST["campus"]) && $_POST["campus"] != "1uni") {
				$check_student = $db->getStudentMail($_POST["unimail"]);
				//Check if the student mail already exist
				if(!count($check_student) == 0) {
					$templateParams["error_registration_mail_student"] = "La mail da studente inserita e' gia' esistente!";
				} else {
					$campus = str_replace(array('u', 'n', 'i'), '', (string)$_POST["campus"]);
					$db->registerStudent($_POST["name"], $_POST["username"], $_POST["password"], $_POST["mail"], $_POST["tel"], $_POST["address"], $_POST["unimail"], (int)$campus);
				}
			} else {
				$db->register($_POST["name"], $_POST["username"], $_POST["password"], $_POST["mail"], $_POST["tel"], $_POST["address"]);
			}
		} else {
			$templateParams["error_registration_mail"] = "La mail inserita e' gia' esistente!";
		}	
	} else {
		$templateParams["error_registration_name"] = "Il nome inserito e' gia' esistente!";
	}
	if(!isset($templateParams["error_registration_mail"]) 
		&& !isset($templateParams["error_registration_name"]) 
		&& !isset($templateParams["error_registration_mail_student"])) {
		$register_result = $db->login($_POST["username"], $_POST["password"]);
		setUser($register_result[0]);
	}
	
}
//Change personal data
if(isset($_POST["m_submit"]) && isset($_POST["a_data"])) {
	$db->changeUserData($_SESSION["id_user"], $_POST["a_password"], $_POST["a_tel"], $_POST["a_address"]);
}

if(isUserLoggedIn()){
	if(isAdmin()) {
		$templateParams["title"] = "ZACCOLLA OSTERIA - Area Personale Admin";
		$templateParams["name"] = "login-home-admin.php";
		$templateParams["user_data"] = $db->getUser($_SESSION["id_user"]);
		$templateParams["admin_notify"] = $db->getNotify();
		$templateParams["notify_data_order"] = $db->getNotifyDataOrder();
		$templateParams["notify_data_order_list"] = $db->getFoodListByOrder();
		$templateParams["notify_data_food"] = $db->getFood();
	} else {
		$templateParams["title"] = "ZACCOLLA OSTERIA - Area Personale";
		$templateParams["name"] = "login-home.php";
		$templateParams["user_data"] = $db->getUser($_SESSION["id_user"]);
		$templateParams["user_orders"] = $db->getUserOrders($_SESSION["id_user"]);
		$templateParams["user_orders_list"] = $db->getUserOrdersList($_SESSION["id_user"]);
	}
}
else{
    $templateParams["title"] = "ZACCOLLA OSTERIA - Login";
	$templateParams["name"] = "login-form.php";
	$templateParams["university"] = $db->getUni();
}

//Buttons user
if(isset($templateParams["user_orders"])) {
	$order = 0;
	foreach($templateParams["user_orders"] as $orders) {
		if(isset($_POST[$orders["id_order"]."cancel"])) {
			$db->changeOrderStatus($orders["id_order"], "Annullato dal Cliente");
			$list_food = $db->getUserOrdersListByOrder($orders["id_order"]);
			$final_quantity = 0;
			foreach($list_food as $food) {
				$quantity = $db->getFoodQuantity($food["id_food"]);
				$final_quantity = $quantity[0]["quantity"] + $food["food_quantity"];
				$db->restoreQuantity($food["id_food"], $final_quantity);
			}
			$order = $orders["id_order"];
			if(isset($order)) {
				$db->notifyAdminOrderCancelled($order);
				header("location:login.php");
			}
		}
	}
}
//Buttons admin
if(isset($templateParams["admin_notify"])) {
	foreach($templateParams["admin_notify"] as $notify) {
		if(isset($_POST[$notify["id_notify"]."confirm"])) {
			$db->readNotify($notify["id_notify"]);
			header("location:login.php");
		} else if(isset($_POST[$notify["id_notify"]."cancel_order"])) {
			$db->changeOrderStatus($notify["id_order"], "Annullato");
			$list_food = $db->getUserOrdersListByOrder($notify["id_order"]);
			$final_quantity = 0;
			foreach($list_food as $food) {
				$quantity = $db->getFoodQuantity($food["id_food"]);
				$final_quantity = $quantity[0]["quantity"] + $food["food_quantity"];
				$db->restoreQuantity($food["id_food"], $final_quantity);
			}
			$db->readNotify($notify["id_notify"]);
			header("location:login.php");
		} else if(isset($_POST[$notify["id_notify"]."confirm_order"])) {
			$db->changeOrderStatus($notify["id_order"], "Confermato");
			$db->readNotify($notify["id_notify"]);
			header("location:login.php");
		} else if(isset($_POST[$notify["id_notify"]."confirm_c_order"])) {
			$db->readNotify($notify["id_notify"]);
			header("location:login.php");
		} else if(isset($_POST[$notify["id_notify"]."send_order"])) {
			$db->changeOrderStatus($notify["id_order"], "Inviato");
			header("location:login.php");
		}
	}
}


require("template/base.php");
?>