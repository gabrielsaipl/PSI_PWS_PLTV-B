<?php

class ProdutoController extends SiteController
{
    public function index(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $ivas = Iva::all();
        $produtos = Produto::All();
        $this->renderView("ProdutosView/listarProduto.php",[
            'produtos' => $produtos,
            'ivas' => $ivas
        ]);
    }

    public function show($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $produto = Produto::find([$id]);
        $iva = Iva::find([$produto->iva_id]);
        if(is_null($produto)){ //SE N EXISTIR O PRODUTO
            //MOSTRAR POPUP
        } else {
            $this->renderView("ProdutosView/showProduto.php",[
                'produto' => $produto,
                'iva' => $iva,
            ]);
        }
    }

    public function create(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $ivas = Iva::all(array('conditions'=> 'emvigor = 1'));
        $this->renderView("ProdutosView/addProduto.php",[
            'ivas' => $ivas,
        ]);
    }

    public function store(){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
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
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $ivas = Iva::all(array('conditions'=> 'emvigor = 1'));
        $produto = Produto::find([$id]);
        if (is_null($produto)){
            // MOSTRAR POPUP ERRO
        } else {
            $this->renderView("ProdutosView/editProduto.php",[
                'produto' => $produto,
                'ivas' => $ivas,
            ]);
        }
    }

    public function update($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $produto = Produto::find([$id]);
        $produto->update_attributes($_POST);
        if ($produto->is_valid()){
            $produto->save();
            $this->redirectToRoute("produto","index");
        } else {
            // MOSTRAR A VISTA EDIT COM OS ERROS QUE DEU
        }
    }
}