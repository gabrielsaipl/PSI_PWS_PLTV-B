<?php

class FaturaController extends SiteController
{
    public function index(){
        $fatura = Fatura::All();

        //MOSTRAR VISTA DE LISTAR
    }

    public function show($id){
        $fatura = Fatura::find([$id]);

        if(is_null($fatura)){ //SE N EXISTIR
            //MOSTRAR POPUP
        } else {
            // MOSTRAR VISTA COM OS DETALHES
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

    public function edit($id){
        $fatura = Fatura::find([$id]);
        if (is_null($fatura)){
            // MOSTRAR POPUP ERRO
        } else {
            //MOSTRAR VISTA EDITAR
        }
    }

    public function update($id){
        $fatura = Fatura::find([$id]);
        $fatura->update_attributes($_POST);
        if ($fatura->is_valid()){
            $fatura->save();
            // MOSTRAR A LISTA
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }
}