<?php

class UserController extends SiteController
{
    public function funcionarios(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        if ($_SESSION['role'] != '1'){
            echo '<script type="text/javascript">alert("Nao tem acesso a esta página")</script>';
            echo '<script>window.location="index.php?c=site&a=zonareservada";</script>';
        }
        $funcionarios = User::all(array('conditions'=> 'role = 2'));
        $this->renderView("UsersView/funcionario.php",[
            "funcionarios" => $funcionarios,
        ]);
    }

    public function clientes(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();

        $clientes = User::all(array('conditions'=> 'role = 3'));
        $this->renderView("UsersView/cliente.php",[
            "clientes" => $clientes,
        ]);
    }

    public function show($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $user = User::find([$id]);
        if(is_null($user)){
            echo '<script type="text/javascript">alert("Erro ao mostrar o Utilizador"); window.location="index.php?c=site&a=zonareservada";</script>';
        } else {
            $this->renderView("UsersView/showUser.php",[
                "user" => $user,
            ]);
        }
    }

    public function create(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $this->renderView("UsersView/addUser.php");
    }

    public function store(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $user = new User($_POST);
        if ($user->is_valid()){
            $user->save();
            if($user->role==2) $this->redirectToRoute("user","funcionario");
            if($user->role==3) $this->redirectToRoute("user","cliente");
        } else{
            echo '<script type="text/javascript">alert("Erro ao gravar o Utilizador"); window.location="index.php?c=user&a=create";</script>';
        }
    }

    public function edit($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $user = User::find([$id]);
        if (is_null($user)){
            echo '<script type="text/javascript">alert("Erro ao encontrar o Utilizador"); window.location="index.php?c=site&a=zonareservada";</script>';
        } else {
            $this->renderView("UsersView/editUser.php",[
                "user" => $user,
            ]);
        }
    }

    public function update($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $user = User::find([$id]);
        $user->update_attributes($_POST);
        if ($user->is_valid()){
            $user->save();
            if ($user->role == 2) $this->redirectToRoute("user","funcionario");
            elseif ($user->role == 3) $this->redirectToRoute("user","cliente");
            elseif ($user->role == 1) $this->redirectToRoute("site","zonareservada");
        } else {
            echo '<script type="text/javascript">alert("Erro ao gravar o Utilizador"); window.location="index.php?c=site&a=zonareservada";</script>';
        }
    }
}