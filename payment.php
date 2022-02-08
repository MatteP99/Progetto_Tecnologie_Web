<?php
require_once 'require.php';
//Payment
if(isset($_POST["submit"])) {
	
}
//Check if user is logged
if(isUserLoggedIn()){
	$templateParams["user_data"] = $db->getUser($_SESSION["id_user"]);
	$templateParams["user_logged"] = "Yes";
}

$templateParams["title"] = "ZACCOLLA OSTERIA - Pagamento";
$templateParams["name"] = "payment.php";

require("template/base.php");
?>