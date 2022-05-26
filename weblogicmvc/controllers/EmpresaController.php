<?php

class EmpresaController extends SiteController
{

    public function store(){
        $empresa = new Empresa($_POST);
        if ($empresa->is_valid()){
            $empresa->save();
            //$this->redirectToRoute("","");
        } else{
            echo '<script>alert("Erro ao criar a fatura")</script>';    //  PROBLEMA COM O ALERT (PHP CORRE PRIMEIRO NO SV
            var_dump($empresa);
            //$this->redirectToRoute("fatura","create");          // OU SEJA, JS É CORRIDO APÓS O PHP E N PARA NO ALERT
        }
    }

    public function edit($id){
        $empresa = Empresa::find([$id]);
        if (is_null($empresa)){
            // MOSTRAR POPUP ERRO
        } else {
            $this->renderView("EmpresaView/editEmpresa.php",[
                "empresa" => $empresa,
            ]);
        }
    }

    public function update($id){
        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);
        if ($empresa->is_valid()){
            $empresa->save();
            // MOSTRAR VISTA
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }

    public function show($id){
        $empresa = Empresa::find([$id]);

        if(is_null($empresa)){ //SE N EXISTIR
            //MOSTRAR POPUP
        } else {
            $this->renderView("EmpresaView/showEmpresa.php",[
                "empresa" => $empresa,
            ]);
        }
    }
}
