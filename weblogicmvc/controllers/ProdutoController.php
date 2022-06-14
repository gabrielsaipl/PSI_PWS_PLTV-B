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
        if(is_null($produto)){ //SE NÃO EXISTIR O PRODUTO
            echo '<script type="text/javascript">alert("Erro ao mostrar o produto"); window.location="index.php?c=produto&a=index";</script>';
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
            echo '<script type="text/javascript">alert("Erro ao criar o produto"); window.location="index.php?c=produto&a=create";</script>';
        }
    }

    public function edit($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $ivas = Iva::all(array('conditions'=> 'emvigor = 1'));
        $produto = Produto::find([$id]);
        if (is_null($produto)){
            echo '<script type="text/javascript">alert("Erro ao encontrar produto"); window.location="index.php?c=produto&a=index";</script>';
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
            echo '<script type="text/javascript">alert("Erro ao gravar o produto"); window.location="index.php?c=produto&a=index";</script>';
        }
    }
}