<div class="login-page">
    <div class="form">
        <h4><b><u><?=$empresa->designacaosocial?></u></b></h4>
        <p> Localidade: <?=$empresa->localidade?></p>
        <p> Código Postal: <?=$empresa->codigopostal?></p>
        <p> Morada: <?=$empresa->morada?></p>
        <p> Capital Social: <?=$empresa->capitalsocial?> €</p>
        <p> Nif: <?=$empresa->nif?></p>
        <p> Email: <?=$empresa->email?></p>
        <p> Telefone: <?=$empresa->telefone?></p>
        <a href="?c=empresa&a=edit"><button>Editar</button></a>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=site&a=zonareservada" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>
