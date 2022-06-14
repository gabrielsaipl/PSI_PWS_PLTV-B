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
            echo '<script type="text/javascript">alert("Erro ao adicionar a empresa"); window.location="index.php?c=empresa&a=create";</script>';
        }
    }

    public function edit(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $empresa = Empresa::first();
        if (is_null($empresa)){ // SE NÃO EXISTE EMPRESA
            $this->redirectToRoute("empresa","create");
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
            echo '<script type="text/javascript">alert("Erro ao atualizar a empresa"); window.location="index.php?c=empresa&a=edit";</script>';
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
