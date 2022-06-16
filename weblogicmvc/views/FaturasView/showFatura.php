<div class="login-page">
    <h4 id = "estado">
    <?php
    if ($fatura->estado == 0) echo "<b>Em lançamento</b>";
    else echo "<b>Emitida</b>";
    ?>
    </h4>
    <div class="form" id="form">
        <div class="row">
            <div class="col" style="text-align: left">
                <p><b><?= $empresa->designacaosocial?></b></p>
                <p><?= $empresa->morada?></p>
                <p><?php echo $empresa->codigopostal." "; echo $empresa->localidade?></p>
                <p>NIF: <?= $empresa->nif?></p>
                <p>Telef: <?= $empresa->telefone?></p>
                <p>Email: <?= $empresa->email?></p>
            </div>
            <div class="col" style="text-align: right">
                <p><?=$cliente->username?></p>
                <p><?= $cliente->morada?></p>
                <p><?php echo $cliente->codigopostal." "; echo $cliente->localidade?></p>
                <p></p>
                <p>NIF: <?= $cliente->nif?></p>
                <p>Telef: <?= $cliente->telefone?></p>
            </div>
        </div>
        <p style="text-align: right"> Data: <?=$fatura->data?></p>
        <table class="table tablestriped" style="text-align: center;">
            <thead>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Unidade</th>
                <th>Total</th>
            </thead>
        <?php foreach ($fatura->linhafaturas as $linhafatura){ ?>
            <tr>
                <td><?= $linhafatura->produto->descricao?></td>
                <td><?= $linhafatura->quantidade ?></td>
                <td><?= number_format($linhafatura->valorunitario,2)?>€</td>
                <td><?php echo number_format($linhafatura->valorunitario * $linhafatura->quantidade,2)?>€</td>
                <?php if($fatura->estado == 0):?>
                    <td><a href="?c=linhafatura&a=delete&id=<?=$linhafatura->id?>" class="btn btn-info" role="button">X</a></td>
                <?php endif;?>
            </tr>
        <?php } ?>
        </table>
        <?php if($fatura->estado == 0):?>
            <a href="?c=linhafatura&a=create&id=<?=$fatura->id?>" class="btn btn-info" role="button">Nova Linha de Fatura</a>
        <?php endif;?>
        <div class="row">
            <div class="col" id="dadosFuncionario" style="text-align: left">
                <p> <b>Funcionário: </b></p>
                <p>Nome: <?=$funcionario->username?></p>
                <p>ID: <?=$funcionario->id?></p>
            </div>
            <div class="col" style="text-align: right">
                <p> Subtotal: <?=number_format($fatura->valortotal,2)?>€</p>
                <p> Iva total: <?=number_format($fatura->ivatotal,2)?>€</p>
                <p> Total: <?=number_format($fatura->valortotal+$fatura->ivatotal,2)?>€</p>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6" id="buttons">
    <p>
        <?php if($fatura->estado == 0):?>
            <a href="?c=fatura&a=emitir&id=<?=$fatura->id?>" class="btn btn-info" role="button">Emitir</a>
        <?php else:?>
            <button class="btn btn-info" onclick="printfatura();">Imprimir</button>
        <?php endif;?>
        <a href="?c=fatura&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>
