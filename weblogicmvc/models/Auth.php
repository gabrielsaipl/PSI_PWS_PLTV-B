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
            echo $_SESSION['userid'];
            echo $_SESSION['role'];
            echo $_SESSION['username'];
            echo '<script type="text/javascript">alert("Session started successfuly/Welcome ' . $user . '")</script>';
            echo '<script>window.location="router.php?c=site&a=zonareservada";</script>
';

        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid Credentials");';
            echo '</script>';
            echo '<script>window.location="router.php?c=login&a=index";</script>';
        }
    }
    public function IsLoggedIn()
    {
        $user = $_POST['name'];
        $psw = $_POST['password'];
        if (isset($_SESSION['userid']) && isset($_SESSION['role']) && isset($_SESSION['username']))       //checking current session
        {
            echo '<script type="text/javascript">';
            echo 'alert("Looks like someone was logged in... Verifing if its you");';
            echo '</script>';
            $utilizador = User::all(array('conditions'=> 'username = "'. $user .'" and password = "'. $psw .'"'));
            if ($utilizador != null)     //Checks for user in the database
            {
                echo '<script type="text/javascript">';
                echo 'alert("User verified :D");';
                echo '</script>';
            } else
            {
                echo '<script type="text/javascript">';
                echo 'alert("invalid UserName or Password/Please Log Back in");';
                echo '</script>';
                unset($_SESSION['user']);
                echo '<script>window.location="router.php";</script>';
            }
        }
        else{
            echo 'Please Login First';
        }
    }

}