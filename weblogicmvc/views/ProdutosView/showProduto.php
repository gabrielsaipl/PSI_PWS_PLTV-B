<div class="login-page">
    <div class="form">
        <h4><b><u> <?=$produto->descricao?></u></b></h4>
        <p> Referência: <?=$produto->referencia?></p>
        <p> Preço: <?=$produto->preco?>€</p>
        <p> Stock: <?=$produto->stock?></p>
        <p> Iva: <?=$produto->iva->percentagem?>%</p>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=produto&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>
