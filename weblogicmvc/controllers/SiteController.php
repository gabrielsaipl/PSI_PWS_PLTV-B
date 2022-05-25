<?php

class SiteController
{
    public function redirectToRoute($controller,$view){
        header("Location: index.php?c=$controller&a=$view");
    }

    public function renderView($view, $params=[]){
        extract($params);
        require_once "views/layout/header.php";
        require_once "views/$view";
        require_once "views/layout/footer.php";
    }

}