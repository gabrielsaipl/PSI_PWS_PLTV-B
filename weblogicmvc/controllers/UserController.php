<?php

class UserController extends SiteController
{
    public function funcionarios(){
        $funcionarios = User::all(array('conditions'=> 'role = 2'));
        $this->renderView("UsersView/funcionario.php",[     // FALTA FILTRAR NA LISTA
            "funcionarios" => $funcionarios,
        ]);
    }

    public function clientes(){
        $clientes = User::all(array('conditions'=> 'role = 3'));
        $this->renderView("UsersView/cliente.php",[     // FALTA FILTRAR NA LISTA
            "clientes" => $clientes,
        ]);
    }

    public function show($id){
        $user = User::find([$id]);

        if(is_null($user)){
            //MOSTRAR POPUP
        } else {
            $this->renderView("UsersView/show.php",[
                "user" => $user,
            ]);
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
        $user = User::find([$id]);  // SÓ EDITA SE FOR FUNCIONARIO
        if (is_null($user)){
            echo '<script>alert("Erro ao selecionar o ID")</script>';    //  PROBLEMA COM O ALERT (PHP CORRE PRIMEIRO NO SV
            $this->redirectToRoute("user","create");          // OU SEJA, JS É CORRIDO APÓS O PHP E N PARA NO ALERT
        } else {
            $this->renderView("UsersView/editUser.php",[
                "user" => $user,
            ]);
        }
    }

    public function update($id){
        $user = User::find([$id]);
        $user->update_attributes($_POST);
        if ($user->is_valid()){
            $user->save();
            if ($user->id == 2) $this->redirectToRoute("user","funcionario");
            elseif ($user->id == 3) $this->redirectToRoute("user","cliente");
            else $this->redirectToRoute(); // MOSTRAR VISTA DA ZONA RESERVADA DO ADMIN
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }
}