<?php

class DbConn {

    /**
     * MySQL Variables
     */
    private $Host;
    private $MySQLUsername;
    private $MySQLPassword;
    private $Database;
    private $Conn;

    /**
     * Contructor
     */
    public function DbConn() {
        $definition = 0;
        if ($definition == 0) {
            $this->Host = "localhost";
            $this->MySQLUsername = "root";
            $this->MySQLPassword = "root";
            $this->Database = "projekt";
        }
    }

    /**
     * Open DB connection
     */
    public function dbOpen() {
        $this->Conn = @mysql_connect($this->Host, $this->MySQLUsername, $this->MySQLPassword);

        if ($this->Conn) {
            mysql_select_db($this->Database) OR die('Could not select DB');
        } else {
            die(mysql_error());
        }
    }

    /**
     * Runs a query request
     */
    public function query($sql) {
        $result = mysql_query($sql);
        if (!$result) {
            die(mysql_error());
        }
        return $result;
    }

    /**
     * Closes the the connection
     */
    public function dbClose() {
        mysql_close($this->Conn);
    }

}

?>