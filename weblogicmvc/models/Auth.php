<?php

class Auth
{
    public function __construct(){
        if (!isset($_SESSION)){
            session_start();
        }
    }
}