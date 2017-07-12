<?php
    class Session
    {
        public function __construct(){
            session_start();
        }
        
        public function addValue ($key,$value){
            $_SESSION[$key] = $value;
        }

        public function getValue($key){
            return isset($_SESSION[$key])? $_SESSION[$key] : false;
        }

        public function removeValue($key){
            if(isset($_SESSION[$key]))
                unset($_SESSION[$key]);
        }

        public function validateSession($key){
            if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
            }
            $this->destroySession();
            return false;
        }

        public function destroySession(){
            session_unset();
            session_destroy();
        }

    }
    




?>