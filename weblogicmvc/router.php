<?php
require_once "boot.php";

require_once "controllers/UserController.php";

require_once "models/User.php";

if(!isset($_GET['c'])&&!isset($_GET['a'])){
    //HOMEPAGE;
    include_once "views/UserView/addUser.php";
} else{
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $controller=$_GET['c'];
    $action=$_GET['a'];
    switch ($controller){
        case ('user'):
            switch ($action){
                case ('index'):
                    $userController = new UserController();
                    $userController->index($id);
                    break;
                case('show'):
                    $userController = new UserController();
                    $userController->show($id);
                    break;
                case('create'):
                    $userController = new UserController();
                    $userController->create();
                    break;
                case('store'):
                    $userController = new UserController();
                    $userController->store();
                    break;
                case('edit'):
                    $userController = new UserController();
                    $userController->edit($id);
                    break;
                case('update'):
                    $userController = new UserController();
                    $userController->update($id);
                    break;
                case('delete'):
                    $userController = new UserController();
                    $userController->delete($id);
                    break;
            }
            break;
        case ('fatura'):
            switch ($action) {

            }
            break;
    }
}