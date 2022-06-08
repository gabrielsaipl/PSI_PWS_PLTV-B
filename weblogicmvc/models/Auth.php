<?php

class Auth
{
    public function __construct(){
        if (!isset($_SESSION)){
            session_start();
        }
    }
    public function CheckAuth()
    {
        $user = $_POST['name'];
        $psw = $_POST['password'];
        $utilizador = User::find(array('conditions'=> 'username = "'. $user .'" and password = "'. $psw .'"'));
        if ($utilizador != null)     //Checks for hard-coded uname and psw
        {
            $_SESSION['userid'] = $utilizador -> id;
            $_SESSION['role'] = $utilizador -> role;
            $_SESSION['username'] = $utilizador -> username;
            echo '<script type="text/javascript">alert("Sessão Iniciada/Bem vindo ' . $user . '")</script>';
            echo '<script>window.location="index.php?c=site&a=zonareservada";</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Credenciais Inválidas!");';
            echo '</script>';
            echo '<script>window.location="index.php?c=login&a=index";</script>';
        }
    }
    public function IsLoggedIn()
    {
        if (!isset($_SESSION['userid'], $_SESSION['role'], $_SESSION['username'])){
            echo '<script type="text/javascript">alert("Inicie Sessao primeiro"); window.location="index.php?c=login&a=index";</script>';
        }

    }

    public function logout(){
        session_destroy();
    }
}