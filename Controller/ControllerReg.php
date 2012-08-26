<?php
require_once(dirname(__DIR__) . "/DB/DbConn.php");
require_once(dirname(__DIR__) . '/Controller/ControllerAuth.php');

class ControllerReg {
    
    private $dbConn;
    private $ctrAuth;
    
    public function createUser($username, $password) {
        $this->dbConn = new DbConn();
        $this->dbConn->dbOpen();
        $this->ctrAuth = new ControllerAuth();
        
        $this->username = $this->ctrAuth->EscapeString($username);
        $this->password = $this->ctrAuth->EscapeString($this->ctrAuth->EncryptPassword(($password)));
        
        $this->dbConn->query("INSERT INTO joonate_users (userName, userPass) VALUE ('" . $this->username . "', '" . $this->password . "')");
        
        header('location:../Created.php');
        
        $this->dbConn->dbClose();
    }
}

?>