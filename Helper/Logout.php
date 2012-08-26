<?php
require_once(dirname(__DIR__) . "/Controller/ControllerAuth.php");

$ctrAuth = new ControllerAuth();
$ctrAuth->logOut();
?>