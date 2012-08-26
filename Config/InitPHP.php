<?php
session_start();

//Defined variables
$path = dirname(__DIR__) .'/';

//Included, required
require_once($path . 'Controller/ControllerAuth.php');
require_once($path . 'Controller/ControllerLog.php');
require_once($path . 'DB/DbConn.php');

?>
