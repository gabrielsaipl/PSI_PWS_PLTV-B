<div class="login-page">
    <div class="form">
        <h4><b><u> <?php $_POST['userid']=2;
            if($_POST['userid']==2) echo "Funcionário";
            elseif ($_POST['userid']==3) echo "Cliente";
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
        <?php if($_POST['userid']==2):?>
            <a href="router.php?c=user&a=funcionario" class="btn btn-info" role="button">Voltar</a>
        <?php elseif ($_POST['userid']==3):?>
            <a href="router.php?c=user&a=cliente" class="btn btn-info" role="button">Voltar</a>
        <?php else :    // MANDAR PARA VISTA DE ZONA RESERVADA?>
            <a href="router.php?c=site&a=home" class="btn btn-info" role="button">Voltar</a>
        <?php endif; ?>
    </p>
</div>