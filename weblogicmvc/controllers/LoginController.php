<?php

class LoginController
{
    public function renderView($view, $params=[]){
        extract($params);
        require_once "views/layout/header.php";
        require_once "views/login.php";
        require_once "views/layout/footer.php";
    }
}