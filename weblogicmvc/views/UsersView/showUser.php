<div class="login-page">
    <div class="form">
        <h4><b><u> <?php
            if($user->role==2) echo "Funcionário";
            elseif ($user->role==3) echo "Cliente";
            else echo "Administrador";?></u></b>
        </h4>
        <p> <b>Username</b>: <?=$user->username?></p>
        <p> <b>Telefone:</b> <?=$user->telefone?></p>
        <p> <b>Email:</b> <?=$user->email?></p>
        <p> <b>NIF:</b> <?=$user->nif?></p>
        <p> <b>Morada:</b> <?=$user->morada?></p>
        <p> <b>Localidade:</b> <?=$user->localidade?></p>
        <p> <b>Código Postal:</b> <?=$user->codigopostal?></p>
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
