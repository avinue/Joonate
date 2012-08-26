<?php

class UserModel {
    
    private $userId;
    private $userName;
    private $userRole;
    private $userEmail;
    private $logHistory;
    
    //Constructor
    public function UserModel($userId, $userName, $userEmail, $userRole, $logHistory) {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->userRole = $userRole;
        $this->logHistory = $logHistory;
    }
}

?>