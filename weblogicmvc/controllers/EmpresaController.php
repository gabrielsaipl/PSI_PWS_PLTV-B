<?php

class EmpresaController extends SiteController
{
    public function create(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $empresa = Empresa::first(); // CONFIRMA SE REALMENTE NÃO EXISTE UMA EMPRESA
        if (is_null($empresa)){
            $this->renderView("EmpresaView/addEmpresa.php");
        } else {
            $this->redirectToRoute("empresa","show");
        }
    }

    public function store(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $empresa = new Empresa($_POST);
        if ($empresa->is_valid()){
            $empresa->save();
            $this->redirectToRoute("empresa","show");
        } else{
            echo '<script>alert("Erro ao criar a empresa")</script>';
            $this->redirectToRoute("empresa","edit");
        }
    }

    public function edit(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $empresa = Empresa::first();
        if (is_null($empresa)){
            // É PORQUE AINDA NÃO EXISTE EMPRESA E VAI REENCAMINHAR PARA O CREATE/STORE
        } else {
            $this->renderView("EmpresaView/editEmpresa.php",[
                "empresa" => $empresa,
            ]);
        }
    }

    public function update(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $empresa = Empresa::first();
        $empresa->update_attributes($_POST);
        if ($empresa->is_valid()){
            $empresa->save();
            $this->redirectToRoute("empresa","show");
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }

    public function show(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $empresa = Empresa::first();
        if(is_null($empresa)){ //SE N EXISTIR
            $this->redirectToRoute("empresa","create");
        } else {
            $this->renderView("EmpresaView/showEmpresa.php",[
                "empresa" => $empresa,
            ]);
        }
    }
}
