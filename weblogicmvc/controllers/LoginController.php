<?php

class LoginController extends SiteController
{

    public function login(){
        $sessao = new Auth();
        $user = $_POST['name'];
        echo $user;
        $psw = $_POST['password'];
        echo $psw;

        $utilizador = User::all(array('conditions'=> 'username = "'. $user .'" and password = "'. $psw .'"'));

        //$utilizador = User::find()->where(['username' => $user ])->andWhere(['password' => $psw])->all();
    var_dump($utilizador->id);
        if($utilizador == null){
            echo 'erro';
        }else {
            $_SESSION['userid'] = $utilizador -> id;
            $_SESSION['role'] = $utilizador -> role;
            $_SESSION['username'] = $utilizador -> username;
            //echo $_SESSION['userid'];
            //echo $_SESSION['role'];
            //echo $_SESSION['username'];
            echo 'sucesso';
        }
    }
}