<?php
require_once(dirname(__DIR__) . '/Config/InitPHP.php');

class ControllerLog {

    private $dbConn;

    /**
     * Saves the logon datetime to a sessionvariable
     */
    public function logOn() {
        $_SESSION['logOnDT'] = date('Y-m-d H:i:s');
    }

    /**
     * Saves the logoff datetime to a sessionvariable.
     * Creates a query for saving username, logon/off and IP adress of the user
     * in the database
     */
    public function logOff() {
        if ($_SESSION['authorized'] == 1) {
            $this->dbConn = new DbConn();
            $this->dbConn->dbOpen();

            $_SESSION['logOffDT'] = date('Y-m-d H:i:s');

            $this->dbConn->query("INSERT INTO avi_userlog (userName, logOn, logOff, logIP)
                              VALUES ('" . $_SESSION['username'] .
                    "', '" . $_SESSION['logOnDT'] .
                    "', '" . $_SESSION['logOffDT'] .
                    "', '" . $this->getUserIP() .
                    "')");
        }
    }

    /**
     * Returns the users IP adress
     */
    public function getUserIP() {
        if (isset($_SERVER["REMOTE_ADDR"])) {
            return $_SERVER["REMOTE_ADDR"];
        } else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
    }

}

?>