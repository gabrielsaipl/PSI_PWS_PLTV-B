<?php

class UserController extends SiteController
{
    public function funcionarios(){
        $users = User::all(array('conditions'=> 'role = 2'));
        var_dump($users);
        //MOSTRAR VISTA DE LISTAR Funcionarios
    }

    public function clientes(){
        $users = User::all(array('conditions'=> 'role = 3'));
        var_dump($users);
        //MOSTRAR VISTA DE LISTAR Clientes
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
        $this->renderView("UsersView/addUser.php");
    }

    public function store(){
        $user = new User($_POST);
        if ($user->is_valid()){
            $user->save();
            if($user->role==2) $this->redirectToRoute("user","funcionarios");
            if($user->role==3) $this->redirectToRoute("user","cliente");
        } else{
            echo '<script>alert("Erro ao criar o utilizador")</script>';    //  PROBLEMA COM O ALERT (PHP CORRE PRIMEIRO NO SV
            $this->redirectToRoute("user","create");          // OU SEJA, JS É CORRIDO APÓS O PHP E N PARA NO ALERT
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