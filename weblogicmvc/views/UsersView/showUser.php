<div class="login-page">
    <div class="form">
        <h4><b><u> <?php
            if($user->role==2) echo "Funcionário";
            elseif ($user->role==3) echo "Cliente";
            else echo "Administrador";?></u></b>
        </h4>
        <p> <?=$user->username?></p>
        <p> <?=$user->telefone?></p>
        <p> <?=$user->email?></p>
        <p> <?=$user->nif?></p>
        <p> <?=$user->morada?></p>
        <p> <?=$user->localidade?></p>
        <p> <?=$user->codigopostal?></p>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <?php if($user->role==2):?>
            <a href="?c=user&a=funcionario" class="btn btn-info" role="button">Voltar</a>
        <?php elseif($user->role==3):?>
            <a href="?c=user&a=cliente" class="btn btn-info" role="button">Voltar</a>
        <?php else :?>
            <a href="?c=site&a=zonareservada" class="btn btn-info" role="button">Voltar</a>
        <?php endif; ?>
    </p>
</div>