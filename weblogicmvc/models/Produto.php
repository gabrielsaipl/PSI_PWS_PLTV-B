<?php

class Produto extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'It must be provided'),
        array('descricao', 'message' => 'It must be provided'),
        array('preco', 'message' => 'It must be provided'),
        array('stock', 'message' => 'It must be provided')
    );

    static $belongs_to = array(
        array('iva')
    );

    static $has_many = array(
        array('linhafaturas')
    );
}