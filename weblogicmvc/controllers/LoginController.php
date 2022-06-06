<?php

class LoginController extends SiteController
{
    public function index(){
        $this->renderView("login.php");
    }
    public function login(){
        $auth = new Auth();
        $auth ->CheckAuth();
    }

    public function logout(){
        $sessao = new Auth();
        $sessao ->logout();
        $this->renderView("login.php");
    }
}