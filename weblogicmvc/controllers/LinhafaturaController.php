<?php

class LinhafaturaController extends SiteController
{
    public function create($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $produtos = Produto::all();
        $this->renderView("LinhaFaturaView/addLinhaFatura.php",[
            'idFatura' => $id,
            'produtos' => $produtos,
        ]);
    }

    public function store()
    {
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $linhaFatura = new Linhafatura($_POST);
        $produto = Produto::find([$linhaFatura->produto_id]);
        $fatura = Fatura::find([$linhaFatura->fatura_id]);
        if ($produto->stock >= $linhaFatura->quantidade) {
            $linhaFatura->valorunitario = $produto->preco;       // RECEBE O VALOR UNITARIO (VALOR DO PRODUTO)
            $linhaFatura->valoriva = $produto->iva->percentagem / 100 * $produto->preco; // RECEBE O VALOR DO IVA DO PRODUTO
            if ($linhaFatura->is_valid()) {
                $linhaFatura->save();
                $produto->stock = $produto->stock - $linhaFatura->quantidade;       // ALTERA O STOCK DO PRODUTO
                $produto->save();
                $fatura->valortotal += $linhaFatura->valorunitario * $linhaFatura->quantidade;     //ALTERA O VALOR TOTAL NA FATURA
                $fatura->ivatotal += $linhaFatura->valoriva * $linhaFatura->quantidade;    //ALTERA O VALOR DO IVA TOTAL NA FATURA
                $fatura->save();
                header("Location:index.php?c=fatura&a=show&id=" . $linhaFatura->fatura_id);
            } else {
                echo '<script type="text/javascript">alert("Erro ao criar a linha de fatura"); window.location="index.php?c=fatura&a=index";</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Quantidade requerida superior à quantidade de stock"); window.location="index.php?c=fatura&a=index";</script>';
        }
    }

    public function delete($id){
        $auth = new Auth();
        $auth ->IsLoggedIn();
        $auth ->IsCliente();
        $linhaFatura = Linhafatura::find([$id]);
        $linhaFatura->delete();
        $produto = Produto::find([$linhaFatura->produto_id]);
        $produto->stock += $linhaFatura->quantidade;    //VOLTA A RECOLOCAR O STOCK
        $produto->save();
        $fatura = Fatura::find([$linhaFatura->fatura_id]);
        $fatura->valortotal -= $linhaFatura->valorunitario * $linhaFatura->quantidade;     //ALTERA O VALOR TOTAL NA FATURA
        $fatura->ivatotal -= $linhaFatura->valoriva * $linhaFatura->quantidade;    //ALTERA O VALOR DO IVA TOTAL NA FATURA
        $fatura->save();
        header("Location:index.php?c=fatura&a=show&id=".$linhaFatura->fatura_id);
    }
}