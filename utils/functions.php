<?php 
//Function to set datas of the logged user
function setUser($loggedUser){
    $_SESSION["id_user"] = $loggedUser["id_user"];
    $_SESSION["username"] = $loggedUser["username"];
	$_SESSION["user_status"] = $loggedUser["user_status"];
}

//Function to check if a user is logged
function isUserLoggedIn(){
    return !empty($_SESSION['id_user']);
}

//Function to check if admin or not
function isAdmin(){
    return $_SESSION["user_status"] == 'Admin';
}

//Function if the file is Active or Not
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF']) == $pagename){
        echo " class='active' ";
    }
}

//Function unset all cookie
function unsetCookie($cookie) {
	if (isset($cookie)) {
	$cookies = explode(';', $cookie);
	foreach($cookies as $c) {
		$parts = explode('=', $c);
		$name = trim($parts[0]);
		setcookie($name, '', time()-1000);
		setcookie($name, '', time()-1000, '/');
	}
}
}
?>