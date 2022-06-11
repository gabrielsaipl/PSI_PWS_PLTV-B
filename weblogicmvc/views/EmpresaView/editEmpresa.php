<div class="login-page">
    <div class="form">
        <form class="login-form" method="post" action="?c=empresa&a=update&id=<?=$empresa->id?>">
            <h2>Atualizar dados da Empresa</h2>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="designacaosocial">Designação: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="designacaosocial" value="<?=$empresa->designacaosocial?>" placeholder="Designação Social" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="localidade">Localidade: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="localidade" value="<?=$empresa->localidade?>" placeholder="Localidade" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="codigopostal">Código Postal </label>
                </div>
                <div class="col-10">
                    <input type="text" name="codigopostal" value="<?=$empresa->codigopostal?>" placeholder="Código Postal" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="morada">Morada </label>
                </div>
                <div class="col-10">
                    <input type="text" name="morada" value="<?=$empresa->morada?>" placeholder="Morada" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="capitalsocial">Capital Social: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="capitalsocial" value="<?=$empresa->capitalsocial?>" placeholder="capitalsocial" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="nif">NIF: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="nif" value="<?=$empresa->nif?>" placeholder="NIF" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="nif">Email: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="email" value="<?=$empresa->email?>" placeholder="Email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="telefone">Telefone: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="telefone" value="<?=$empresa->telefone?>" placeholder="Telefone" required>
                </div>
            </div>
            <button>Submit</button>
        </form>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=empresa&a=show" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>