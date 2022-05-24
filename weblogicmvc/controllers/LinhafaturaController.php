<?php

class LinhafaturaController
{
    public function index(){
        $linhaFatura = Linhafatura::All();

        //MOSTRAR VISTA DE LISTAR
    }

    public function show($id){
        $linhaFatura = Linhafatura::find([$id]);

        if(is_null($linhaFatura)){ //SE N EXISTIR
            //MOSTRAR POPUP
        } else {
            // MOSTRAR VISTA COM OS DETALHES
        }
    }

    public function create(){
        //mostrar vista create
    }

    public function store(){
        $linhaFatura = new Linhafatura($_POST);
        $linhaFatura->save();
        if ($linhaFatura->is_valid()){
            //MOSTRAR VISTA COM LISTA (INDEX)
        } else{
            // DEU ERRO, VOLTAR AO CREATE
        }
    }

    public function edit($id){
        $linhaFatura = Linhafatura::find([$id]);
        if (is_null($linhaFatura)){
            // MOSTRAR POPUP ERRO
        } else {
            //MOSTRAR VISTA EDITAR
        }
    }

    public function update($id){
        $linhaFatura = Linhafatura::find([$id]);
        $linhaFatura->update_attributes($_POST);
        if ($linhaFatura->is_valid()){
            $linhaFatura->save();
            // MOSTRAR A LISTA
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }

    public function delete($id){ // SE NECESSÁRIO
        $linhaFatura = Linhafatura::find([$id]);
        $linhaFatura->delete();
        //MOSTRAR A LISTA
    }
}