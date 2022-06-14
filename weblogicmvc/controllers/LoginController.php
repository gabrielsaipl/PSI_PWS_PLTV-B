<?php

class LoginController extends SiteController
{
    public function index(){
        $auth = new Auth();
        //verificar se ele ja tem sessao iniciada
        if (isset($_SESSION['userid'])){
            echo '<script type="text/javascript">alert("Utilizador com sessao inciada")</script>';
            echo '<script>window.location="index.php?c=site&a=zonareservada";</script>';
        }else{$this->renderView("login.php");}

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
