<?php
require_once 'require.php';

$templateParams["title"] = "ZACCOLLA OSTERIA - Delivery";
$templateParams["name"] = "delivery.php";
$templateParams["type"] = $db->getFoodTypes();
$templateParams["food"] = $db->getFood();

require("template/base.php");
?>