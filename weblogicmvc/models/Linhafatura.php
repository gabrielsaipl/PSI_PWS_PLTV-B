<?php

class Linhafatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('quantidade', 'message' => 'It must be provided'),
        array('valoriva', 'message' => 'It must be provided'),
        array('valorunitario', 'message' => 'It must be provided')
    );

    static $belongs_to = array(
        array('fatura'),
        array('produto')
    );

}