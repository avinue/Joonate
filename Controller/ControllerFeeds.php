<?php

require_once(dirname(__DIR__) . '/Config/InitPHP.php');

class ControllerFeeds {

    private $dbConn;

    public function createFeed($feedTitle, $feedAuthor, $feedInfo){
        $this->feedTitle = $feedTitle;
        $this->feedAuthor = $feedAuthor;
        $this->feedInfo = $feedInfo;
        
        $this->dbConn = new DbConn();
        $this->dbConn->dbOpen();
        
        $this->dbConn->query("INSERT INTO joonate_feeds (feedTitle, feedAuthor, feedInfo) VALUE ('" . $this->feedTitle . "', '" . $this->feedAuthor . "', '" . $this->feedInfo . "')");
        
        header('location:../View/successFile.php');
        
        $this->dbConn->dbClose();
        
    }
    
    public function getFeeds(){
        $this->dbConn = new DbConn();
        $this->dbConn->dbOpen();
        
        $result = $this->dbConn->query("SELECT * FROM joonate_feeds ORDER BY feedID DESC LIMIT 10");
        
        $this->dbConn->dbClose();
        
        return $result;
    }
}
?>