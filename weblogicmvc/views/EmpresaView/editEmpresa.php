<div class="login-page">
    <div class="form">
        <form class="login-form" method="post" action="?c=empresa&a=update&id=<?=$empresa->id?>">
            <h2>Atualizar dados da Empresa</h2>
            <input type="text" name="designacaosocial" value="<?=$empresa->designacaosocial?>" placeholder="Designação Social" required>
            <input type="text" name="localidade" value="<?=$empresa->localidade?>" placeholder="Localidade" required>
            <input type="text" name="codigopostal" value="<?=$empresa->codigopostal?>" placeholder="Código Postal" required>
            <input type="text" name="morada" value="<?=$empresa->morada?>" placeholder="Morada" required>
            <input type="text" name="capitalsocial" value="<?=$empresa->capitalsocial?>" placeholder="capitalsocial" required>
            <input type="text" name="nif" value="<?=$empresa->nif?>" placeholder="NIF" required>
            <input type="text" name="email" value="<?=$empresa->email?>" placeholder="Email" required>
            <input type="text" name="telefone" value="<?=$empresa->telefone?>" placeholder="Telefone" required>
            <button>Submit</button>
        </form>
    </div>
</div>