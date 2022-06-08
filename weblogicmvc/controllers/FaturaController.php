<?php

class FaturaController extends SiteController
{
    public function index(){
        $faturas = Fatura::All();
        $this->renderView("FaturasView/listarFatura.php",[
            "faturas"=>$faturas,
        ]);
    }

    public function show($id){
        $fatura = Fatura::find([$id]);
        $cliente = User::find([$fatura->usercliente_id]);
        $funcionario = User::find([$fatura->userfuncionario_id]);
        $empresa = Empresa::first();
        if(is_null($fatura)){ //SE N EXISTIR
            //MOSTRAR POPUP
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
        $clientes = User::all(array('conditions'=> 'role = 3'));
        $this->renderView("FaturasView/addFatura.php",[
            'clientes' => $clientes,
        ]);
    }

    public function store(){
        $fatura = new Fatura($_POST);
        if ($fatura->is_valid()){
            $fatura->save();
            $this->redirectToRoute("fatura","index");
        } else{
            echo '<script>alert("Erro ao criar a fatura")</script>';    //  PROBLEMA COM O ALERT (PHP CORRE PRIMEIRO NO SV
            var_dump($fatura);
            //$this->redirectToRoute("fatura","create");          // OU SEJA, JS É CORRIDO APÓS O PHP E N PARA NO ALERT
        }
    }

    public function emitir($id){
        $fatura = Fatura::find([$id]);
        $fatura->estado = 1;
        $fatura->save();
        $this->redirectToRoute("fatura","index");
    }

    public function historico(){
        $sessao = new Auth();
        $faturas = Fatura::all(array('conditions'=> 'usercliente_id = '. $_SESSION['userid']."  and estado = 1"));
        $this->renderView("FaturasView/listarFatura.php",[
            "faturas"=>$faturas,
        ]);
    }
}