<?php

class ProdutoController extends SiteController
{
    public function index(){
        $produtos = Produto::All();
        var_dump($produtos);
        //MOSTRAR VISTA DE LISTAR PRODUTOS
    }

    public function show($id){
        $produto = Produto::find([$id]);

        if(is_null($produto)){ //SE N EXISTIR O PRODUTO
            //MOSTRAR POPUP
        } else {
            // MOSTRAR VISTA COM OS DETALHES
        }
    }

    public function create(){
        $ivas = Iva::all(array('conditions'=> 'emvigor = 1'));
        $this->renderView("ProdutosView/addProduto.php",[
            'ivas' => $ivas,
        ]);
    }

    public function store(){
        $produto = new Produto($_POST);
        if ($produto->is_valid()){
            $produto->save();
            $this->redirectToRoute("produto","index");
        } else{
            echo '<script>alert("Erro ao criar o produto")</script>';    //  PROBLEMA COM O ALERT (PHP CORRE PRIMEIRO NO SV
            $this->redirectToRoute("produto","create");          // OU SEJA, JS É CORRIDO APÓS O PHP E N PARA NO ALERT
        }
    }

    public function edit($id){
        $produto = Produto::find([$id]);
        if (is_null($produto)){
            // MOSTRAR POPUP ERRO
        } else {
            //MOSTRAR VISTA EDITAR O PRODUTO
        }
    }

    public function update($id){
        $produto = Produto::find([$id]);
        $produto->update_attributes($_POST);
        if ($produto->is_valid()){
            $produto->save();
            // MOSTRAR A LISTA DE PRODUTOS
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }
}