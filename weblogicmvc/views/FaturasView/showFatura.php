<div class="login-page">
    <div class="form">
        <p><b>Fatura do Cliente<br></b> <?=$cliente->username?></p>
        <p> <b>Funcionário a tratar da fatura</b> <br><?=$funcionario->username?></p>
        <p> Data: <?=$fatura->data?></p>
        <p> Valor total: <?=$fatura->valortotal?>€</p>
        <p> Iva total: <?=$fatura->ivatotal?></p>
        <?php
            if ($fatura->estado == 0) echo "Em lançamento";
            else echo "Emitida";
        ?>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="router.php?c=fatura&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>