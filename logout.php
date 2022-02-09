<?php
require_once 'require.php';
//Unset cookies
unsetCookie($_SERVER['HTTP_COOKIE']);
//Unset the session params
$userDatasArray = ["id_user", "username", "user_status"];
foreach ($userDatasArray as $data) {
    if(isset($_SESSION[$data])){
        unset($_SESSION[$data]);
    }
}

header("location:login.php");
?>