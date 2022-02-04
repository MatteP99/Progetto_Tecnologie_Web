<?php
require_once 'require.php';

//Unsetting the session params
$userDatasArray = ["id_user", "username", "user_status"];
foreach ($userDatasArray as $data) {
    if(isset($_SESSION[$data])){
        unset($_SESSION[$data]);
    }
}

header("location:login.php");
?>