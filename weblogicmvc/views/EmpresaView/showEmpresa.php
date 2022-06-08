<div class="login-page">
    <div class="form">
        <h4><b><u><?=$empresa->designacaosocial?></u></b></h4>
        <p> <?=$empresa->localidade?></p>
        <p> <?=$empresa->codigopostal?></p>
        <p> <?=$empresa->morada?></p>
        <p> <?=$empresa->capitalsocial?> €</p>
        <p> <?=$empresa->nif?></p>
        <p> <?=$empresa->email?></p>
        <p> <?=$empresa->telefone?></p>
        <a href="index.php?c=empresa&a=edit"><button>Editar</button></a>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=site&a=zonareservada" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>