<?php
require_once(dirname(__DIR__) . '/Config/InitPHP.php');

$ctrAuth = new ControllerAuth();

if (!isset($_POST['submit'])) {  
    header('location:../index');
} else {
    $ctrAuth->checkLogin($_POST['username'], $_POST['password']);
}
?>