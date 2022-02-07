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
				if(count($check_student) == 0) {
					$templateParams["error_registration_mail_student"] = "La mail da studente inserita e' gia' esistente!";
				} else {
					$db->registerStudent($_POST["name"], $_POST["username"], $_POST["password"], $_POST["mail"], $_POST["tel"], $_POST["address"], $_POST["unimail"]);
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
	$register_result = $db->login($_POST["username"], $_POST["password"]);
	setUser($register_result[0]);
}

if(isUserLoggedIn()){
    $templateParams["title"] = "ZACCOLLA OSTERIA - Login Home";
	$templateParams["name"] = "login-home.php";
	$templateParams["user_data"] = $db->getUser($_SESSION["id_user"]);
}
else{
    $templateParams["title"] = "ZACCOLLA OSTERIA - Login";
	$templateParams["name"] = "login-form.php";
	$templateParams["university"] = $db->getUni();
}

require("template/base.php");
?>