<?php

class UserController
{
    public function index(){
        $users = User::All();

        //MOSTRAR VISTA DE LISTAR CLIENTE
    }

    public function show($id){
        $user = User::find([$id]);

        if(is_null($user)){ //SE N EXISTIR O USER
            //MOSTRAR POPUP
        } else {
            // MOSTRAR VISTA COM OS DETALHES
        }
    }

    public function create(){
        //mostrar vista create
    }

    public function store(){
        $user = new User($_POST);
        var_dump($user);
        if ($user->is_valid()){
            $user->save();
            //MOSTRAR VISTA COM LISTA DE UTILIZADORES (INDEX)
            echo"utilizador guardado";
        } else{
            // DEU ERRO, VOLTAR AO CREATE
        }
    }

    public function edit($id){
        $user = User::find([$id]);
        if (is_null($user)){
            // MOSTRAR POPUP ERRO
        } else {
            //MOSTRAR VISTA EDITAR O USER
        }
    }

    public function update($id){
        $user = User::find([$id]);
        $user->update_attributes($_POST);
        if ($user->is_valid()){
            $user->save();
            // MOSTRAR A LISTA DE UTILIZADORES
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }

    public function delete($id){ // SE NECESSÁRIO
        $user = User::find([$id]);
        $user->delete();
        //MOSTRAR A LISTA DE UTILIZADORES
    }
}