<?php

class AuthHelper{
    public function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['IS_LOGGED'])){
            header("Location: " . BASE_URL . 'login');
            die();
        }
    }

    public function IsLoggedIn(){
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            return false;
        }
        else{
            return true;
        }
    }
}

?>