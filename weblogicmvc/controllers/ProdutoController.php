<?php

class ProdutoController
{
    public function index(){
        $produtos = Produto::All();

        //MOSTRAR VISTA DE LISTAR PRODUTOS
    }

    public function show($id){
        $produto = Produto::find([$id]);

        if(is_null($produto)){ //SE N EXISTIR O PRODUTO
            //MOSTRAR POPUP
        } else {
            // MOSTRAR VISTA COM OS DETALHES
        }
    }

    public function create(){
        //mostrar vista create
    }

    public function store(){
        $produto = new Produto($_POST);
        $produto->save();
        if ($produto->is_valid()){
            //MOSTRAR VISTA COM LISTA DE PRODUTOS (INDEX)
            echo"utilizador guardado";
        } else{
            // DEU ERRO, VOLTAR AO CREATE
        }
    }

    public function edit($id){
        $produto = Produto::find([$id]);
        if (is_null($produto)){
            // MOSTRAR POPUP ERRO
        } else {
            //MOSTRAR VISTA EDITAR O PRODUTO
        }
    }

    public function update($id){
        $produto = Produto::find([$id]);
        $produto->update_attributes($_POST);
        if ($produto->is_valid()){
            $produto->save();
            // MOSTRAR A LISTA DE PRODUTOS
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }
}