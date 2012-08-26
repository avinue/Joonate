<?php
require_once(dirname(__DIR__) . '/Controller/ControllerReg.php');
$ctrReg = new ControllerReg();

if (!isset($_POST['submit'])) {
    header('location:../index.php');
} else {
    $ctrReg->createUser($_POST['username'], $_POST['password']);
}
?>