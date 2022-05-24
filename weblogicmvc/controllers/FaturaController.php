<?php

class FaturaController
{
    public function index(){
        $fatura = Fatura::All();

        //MOSTRAR VISTA DE LISTAR
    }

    public function show($id){
        $fatura = Fatura::find([$id]);

        if(is_null($fatura)){ //SE N EXISTIR
            //MOSTRAR POPUP
        } else {
            // MOSTRAR VISTA COM OS DETALHES
        }
    }

    public function create(){
        //mostrar vista create
    }

    public function store(){
        $fatura = new Fatura($_POST);
        $fatura->save();
        if ($fatura->is_valid()){
            //MOSTRAR VISTA COM LISTA (INDEX)
        } else{
            // DEU ERRO, VOLTAR AO CREATE
        }
    }

    public function edit($id){
        $fatura = Fatura::find([$id]);
        if (is_null($fatura)){
            // MOSTRAR POPUP ERRO
        } else {
            //MOSTRAR VISTA EDITAR
        }
    }

    public function update($id){
        $fatura = Fatura::find([$id]);
        $fatura->update_attributes($_POST);
        if ($fatura->is_valid()){
            $fatura->save();
            // MOSTRAR A LISTA
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }
}