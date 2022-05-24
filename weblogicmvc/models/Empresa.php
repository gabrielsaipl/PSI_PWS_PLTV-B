<?php

class Empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('localidade', 'message' => 'It must be provided'),
        array('codigopostal', 'message' => 'It must be provided'),
        array('morada', 'message' => 'It must be provided'),
        array('capitalSocial', 'message' => 'It must be provided'),
        array('nif', 'message' => 'It must be provided'),
        array('email', 'message' => 'It must be provided'),
        array('telefone', 'message' => 'It must be provided'),
        array('designacaosocial', 'message' => 'It must be provided')
    );
}