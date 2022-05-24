<?php

class IvaController
{
    public function index(){
        $iva = Iva::All();

        //MOSTRAR VISTA DE LISTAR
    }

    public function show($id){
        $iva = Iva::find([$id]);

        if(is_null($iva)){ //SE N EXISTIR
            //MOSTRAR POPUP
        } else {
            // MOSTRAR VISTA COM OS DETALHES
        }
    }

    public function create(){
        //mostrar vista create
    }

    public function store(){
        $iva = new Iva($_POST);
        $iva->save();
        if ($iva->is_valid()){
            //MOSTRAR VISTA COM LISTA (INDEX)
        } else{
            // DEU ERRO, VOLTAR AO CREATE
        }
    }

    public function edit($id){
        $iva = Iva::find([$id]);
        if (is_null($iva)){
            // MOSTRAR POPUP ERRO
        } else {
            //MOSTRAR VISTA EDITAR
        }
    }

    public function update($id){
        $iva = Iva::find([$id]);
        $iva->update_attributes($_POST);
        if ($iva->is_valid()){
            $iva->save();
            // MOSTRAR A LISTA
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }

    public function delete($id){ // SE NECESSÁRIO
        $iva = Iva::find([$id]);
        $iva->delete();
        //MOSTRAR A LISTA
    }
}