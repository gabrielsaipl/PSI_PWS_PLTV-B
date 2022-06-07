<div class="login-page" id="form">
    <?php
    if ($fatura->estado == 0) echo "<b>Em lançamento</b>";
    else echo "<b>Emitida</b>";
    ?>
    <div class="form">
        <p><b>Fatura do Cliente<br></b> <?=$cliente->username?></p>
        <p> <b>Funcionário a tratar da fatura</b> <br><?=$funcionario->username?></p>
        <p> Data: <?=$fatura->data?></p>
        <p> Valor total: <?=$fatura->valortotal?>€</p>
        <p> Iva total: <?=$fatura->ivatotal?></p>
        <table class="table tablestriped">
            <thead>
                <th>Produto</th>
                <th>Quantidade</th>
            </thead>
        <?php foreach ($fatura->linhafaturas as $linhafatura){ ?>
            <tr>
                <td><?= $linhafatura->produto->descricao?></td>
                <td><?= $linhafatura->quantidade ?></td>
                <?php if($fatura->estado == 0):?>
                    <td><a href="router.php?c=linhafatura&a=delete&id=<?=$linhafatura->id?>" class="btn btn-info" role="button">Eliminar</a></td>

                <?php endif;?>
            </tr>
        <?php } ?>
        </table>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <?php if($fatura->estado == 0):?>
            <a href="router.php?c=fatura&a=emitir&id=<?=$fatura->id?>" class="btn btn-info" role="button">Emitir</a>
            <a href="router.php?c=linhafatura&a=create&id=<?=$fatura->id?>" class="btn btn-info" role="button">Nova Linha de Fatura</a>
        <?php else:?>
            <button class="btn btn-info" onclick="printform('form')">Imprimir</button>
        <?php endif;?>
        <a href="router.php?c=fatura&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>