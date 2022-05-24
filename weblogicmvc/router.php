<?php
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
        case ('book'):
            switch ($action){

            }
            break;
        case ('chapter'):
            switch ($action) {

            }
            break;
    }
}