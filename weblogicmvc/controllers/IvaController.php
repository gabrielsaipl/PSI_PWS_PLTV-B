<?php

class IvaController extends SiteController
{
    public function index(){
        $ivas = Iva::All();
        $this->renderView("IvaView/listarIva.php",[
            'ivas' => $ivas,
        ]);
    }

    public function show($id){
        $iva = Iva::find([$id]);

        if(is_null($iva)){ //SE N EXISTIR
            //MOSTRAR POPUP
        } else {
            $this->renderView("IvaView/showIva.php",[
                'iva' => $iva,
            ]);
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
            $this->renderView("IvaView/editIva.php",[
                "iva" => $iva,
            ]);
        }
    }

    public function update($id){
        $iva = Iva::find([$id]);
        $iva->update_attributes($_POST);
        if ($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute("iva","index");
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