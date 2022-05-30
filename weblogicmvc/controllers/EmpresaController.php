<?php

class EmpresaController extends SiteController
{

    public function store(){
        $empresa = new Empresa($_POST);
        if ($empresa->is_valid()){
            $empresa->save();
        } else{
            echo '<script>alert("Erro ao criar a empresa")</script>';
            $this->redirectToRoute("empresa","edit");
        }
    }

    public function edit(){
        $empresa = Empresa::first();
        if (is_null($empresa)){
            // É PORQUE AINDA NÃO EXISTE EMPRESA E VAI REENCAMINHAR PARA O STORE
        } else {
            $this->renderView("EmpresaView/editEmpresa.php",[
                "empresa" => $empresa,
            ]);
        }
    }

    public function update(){
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
        $empresa = Empresa::first();
        if(is_null($empresa)){ //SE N EXISTIR
            //MOSTRAR POPUP
        } else {
            $this->renderView("EmpresaView/showEmpresa.php",[
                "empresa" => $empresa,
            ]);
        }
    }
}
