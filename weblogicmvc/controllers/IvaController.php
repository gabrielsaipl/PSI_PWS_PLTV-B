<?php

class IvaController extends SiteController
{
    public function index(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $ivas = Iva::All();
        $this->renderView("IvaView/listarIva.php",[
            'ivas' => $ivas,
        ]);
    }

    public function show($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $iva = Iva::find([$id]);
        if(is_null($iva)){ //SE N EXISTIR
            echo '<script type="text/javascript">alert("Erro ao mostrar o Iva"); window.location="index.php?c=iva&a=index";</script>';
        } else {
            $this->renderView("IvaView/showIva.php",[
                'iva' => $iva,
            ]);
        }
    }

    public function create(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $this->renderView("IvaView/addIva.php");
    }

    public function store(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $iva = new Iva($_POST);
        if ($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute("iva","index");
        } else{
            echo '<script type="text/javascript">alert("Erro ao adicionar o Iva"); window.location="index.php?c=iva&a=create";</script>';
        }
    }

    public function edit($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $iva = Iva::find([$id]);
        if (is_null($iva)){
            echo '<script type="text/javascript">alert("Erro ao encontrar o Iva"); window.location="index.php?c=iva&a=index";</script>';
        } else {
            $this->renderView("IvaView/editIva.php",[
                "iva" => $iva,
            ]);
        }
    }

    public function update($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $iva = Iva::find([$id]);
        $iva->update_attributes($_POST);
        if ($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute("iva","index");
        } else {
            echo '<script type="text/javascript">alert("Erro ao gravar o Iva"); window.location="index.php?c=iva&a=index";</script>';
        }
    }
}