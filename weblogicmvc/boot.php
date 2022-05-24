<?php
require "vendor/autoload.php";
ActiveRecord\Config::initialize(function ($cfg){
    $cfg->set_model_directory('./Models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/projetopwebservidor',
        )
    );
});