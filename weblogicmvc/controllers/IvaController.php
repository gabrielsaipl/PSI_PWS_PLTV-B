<?php

class IvaController extends SiteController
{
    public function index(){
        $ivas = Iva::All();
        var_dump($ivas);
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
        $this->renderView("IvaView/addIva.php");
    }

    public function store(){
        $iva = new Iva($_POST);
        //var_dump($iva);
        if ($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute("iva","index");
        } else{
            echo '<script>alert("Erro ao criar o Iva")</script>';    //  PROBLEMA COM O ALERT (PHP CORRE PRIMEIRO NO SV
            $this->redirectToRoute("iva","create");          // OU SEJA, JS É CORRIDO APÓS O PHP E N PARA NO ALERT
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