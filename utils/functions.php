<?php 
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function setUser($user){
    $_SESSION["id_user"] = $user["id_user"];
    $_SESSION["username"] = $user["username"];
}
?>