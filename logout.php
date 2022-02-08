<?php
require_once 'require.php';
//Unset cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
//Unset the session params
$userDatasArray = ["id_user", "username", "user_status"];
foreach ($userDatasArray as $data) {
    if(isset($_SESSION[$data])){
        unset($_SESSION[$data]);
    }
}

header("location:login.php");
?>