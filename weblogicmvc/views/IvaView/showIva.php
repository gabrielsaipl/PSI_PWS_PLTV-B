<div class="login-page">
    <div class="form">
        <h4><b><u> <?=$iva->descricao?></u></b></h4>
        <p> <?=$iva->percentagem?>%</p>
        <?php if($iva->emvigor==1):?>
            <td>Ativo</td>
        <?php else:?>
            <td>Inativo</td>
        <?php endif;?>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=iva&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>
