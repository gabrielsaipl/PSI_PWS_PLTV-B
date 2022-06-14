<?php

class FaturaController extends SiteController
{
    public function index(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $faturas = Fatura::All();
        $this->renderView("FaturasView/listarFatura.php",[
            "faturas"=>$faturas,
        ]);
    }

    public function show($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $fatura = Fatura::find([$id]);
        $cliente = User::find([$fatura->usercliente_id]);
        $funcionario = User::find([$fatura->userfuncionario_id]);
        $empresa = Empresa::first();
        if ($_SESSION['role'] == 3 && $_SESSION['userid'] != $cliente->id)  // SE A FATURA NÃO PERTENCER AO CLIENTE QUE ESTÁ A TENTAR VER
            echo '<script type="text/javascript">alert("Fatura inacessível"); window.location="index.php?c=site&a=zonareservada";</script>';
        if(is_null($fatura)){ //SE N EXISTIR
            echo '<script type="text/javascript">alert("Erro ao visualizar a fatura"); window.location="index.php?c=fatura&a=index";</script>';
        } else {
            $this->renderView("FaturasView/showFatura.php",[
                "fatura" => $fatura,
                "cliente" => $cliente,
                "funcionario" => $funcionario,
                "empresa" => $empresa,
            ]);
        }
    }

    public function create(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $clientes = User::all(array('conditions'=> 'role = 3'));
        $this->renderView("FaturasView/addFatura.php",[
            'clientes' => $clientes,
        ]);
    }

    public function store(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $fatura = new Fatura($_POST);
        if ($fatura->is_valid()){
            $fatura->save();
            $fatura = Fatura::last();
            header("Location: index.php?c=fatura&a=show&id=".$fatura->id);
        } else{
            echo '<script type="text/javascript">alert("Erro ao criar fatura"); window.location="index.php?c=fatura&a=create";</script>';
        }
    }

    public function emitir($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $fatura = Fatura::find([$id]);
        $fatura->estado = 1;
        $fatura->save();
        $this->redirectToRoute("fatura","index");
    }

    public function historico($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        if ($_SESSION['role'] == 3 && $_SESSION['userid'] != $id)  // SE A FATURA NÃO PERTENCER AO CLIENTE QUE ESTÁ A TENTAR VER
            echo '<script type="text/javascript">alert("Histórico inacessível"); window.location="index.php?c=site&a=zonareservada";</script>';
        $faturas = Fatura::all(array('conditions'=> 'usercliente_id = "'. $id.'" and estado = 1'));
        $this->renderView("FaturasView/listarFatura.php",[
            "faturas"=>$faturas,
        ]);
    }
}
