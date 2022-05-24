<?php

class Fatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('data', 'message' => 'It must be provided'),
        array('valortotal', 'message' => 'It must be provided'),
        array('ivatotal', 'message' => 'It must be provided'),
        array('estado', 'message' => 'It must be provided')
    );

    static $has_many = array(
        array('linhafaturas')
    );


}