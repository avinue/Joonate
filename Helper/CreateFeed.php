<?php
require_once(dirname(__DIR__) . '/Config/InitPHP.php');

$ctrFeeds = new ControllerFeeds();

if (!isset($_POST['submit'])) {  
    header('location:../index');
} else {
    $ctrFeeds->checkLogin($_POST['feedTitle'], $_POST['feedInfo']);
}
?>