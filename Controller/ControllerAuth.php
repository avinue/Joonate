<?php

require_once(dirname(__DIR__) . '/Config/InitPHP.php');

class ControllerAuth {

    private $dbConn;

    /**
     * Verifying the user. If the user (row) exists in the database, the user
     * is registret
     * @param username The name entered by the user. It is $_POST from CheckLogin
     * @param password The password entered by the user. It is $_POST from CheckLogin
     */
    public function checkLogin($username, $password) {
        $this->dbConn = new DbConn();
        $this->dbConn->dbOpen();

        $this->username = $this->EscapeString($username);
        $this->password = $this->EscapeString($this->EncryptPassword(($password)));

        $result = $this->dbConn->query("SELECT * FROM avi_users WHERE userName = '$this->username' AND userPass = '$this->password' LIMIT 1");

        //If we get one result we know the login is right.
        if (mysql_num_rows($result) == 1) {
            $resultArr = mysql_fetch_array($result);
            $userRole = $resultArr[4];

            $_SESSION['username'] = ucfirst($this->username); //ucfirst for uppercase
            $_SESSION['authorized'] = $userRole;

            //Log when a user enter with a profil
            $ctrLog = new ControllerLog();
            $ctrLog->logOn();

            header('location:../index?loginPage');
        } else {
            header('location:../index?loginError');
            exit();
        }
        $this->dbConn->dbClose();
    }

    /**
     * Login out the user
     */
    public function logOut() {
        //Logs when a user exit
        $ctrLog = new ControllerLog();
        $ctrLog->logOff();

        header('location:../index');
        session_destroy();
    }

    /**
     * Checks if the user is authorized or not.
     * @return True
     */
    public static function pageAuth() {
        if (isset($_SESSION['username']) && (($_SESSION['authorized'] == 'ADMIN')
                OR ($_SESSION['authorized'] == 'SUPERUSER')
                OR ($_SESSION['authorized'] == 'MEMBER')))
            return true;
        else {
            exit();
            //header('location:index');
        }
    }

    /**
     * Checks if the user is authorized or not.
     */
    public static function isAuth() {
        if (isset($_SESSION['username']) && (($_SESSION['authorized'] == 'ADMIN')
                OR ($_SESSION['authorized'] == 'SUPERUSER')
                OR ($_SESSION['authorized'] == 'MEMBER')))
            return true;
    }

    /**
     * Escapes bad values for MySQL to prevent SQL injections.
     * @param badstring Is the userinput entered from the user
     */
    public function EscapeString($badstring) {
        $goodstring = mysql_real_escape_string($badstring);
        return $goodstring;
    }

    /**
     * Encrypts the userpassword
     * @param password The password from the userinput
     */
    public function EncryptPassword($password) {
        return md5($password);
    }

}

?>