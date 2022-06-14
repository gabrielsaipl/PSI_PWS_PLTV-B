<div class="login-page">
    <div class="form">
    <form class="login-form" method="post" action="?c=user&a=update&id=<?=$user->id?>">
       <h2>Atualizar dados do Utilizador</h2>
        <div class="row">
            <div class="col-2" style="padding-top: 15px">
                <label for="username">Username: </label>
            </div>
            <div class="col-10">
                <input type="text" name="username" value="<?=$user->username?>" placeholder="Username" required>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="padding-top: 15px">
                <label for="password">Password:</label>
            </div>
            <div class="col-9">
                <input type="password" name="password" id="password" value="<?=$user->password?>" placeholder="Password" required>
            </div>
            <div class="col-1" style="padding-top: 15px">
                <input type="checkbox" onclick="alterarVisaoPassword()">
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="padding-top: 15px">
                <label for="telefone">Telefone: </label>
            </div>
            <div class="col-10">
                <input type="text" name="telefone" value="<?=$user->telefone?>" placeholder="Telefone" required>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="padding-top: 15px">
                <label for="email">Email: </label>
            </div>
            <div class="col-10">
                <input type="text" name="email" value="<?=$user->email?>" placeholder="Email" required>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="padding-top: 15px">
                <label for="nif">NIF: </label>
            </div>
            <div class="col-10">
                <input type="text" name="nif" value="<?=$user->nif?>" placeholder="NIF" required>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="padding-top: 15px">
                <label for="morada">Morada: </label>
            </div>
            <div class="col-10">
                <input type="text" name="morada" value="<?=$user->morada?>" placeholder="Morada" required>
            </div>
        </div>
        <div class="row">
            <div class="col-2" style="padding-top: 15px">
                <label for="localidade">Localidade: </label>
            </div>
            <div class="col-10">
                <input type="text" name="localidade" value="<?=$user->localidade?>" placeholder="Localidade" required>
            </div>
        </div>
        <div class="row">
            <div class="col-2" >
                <label for="codigopostal">Código Postal: </label>
            </div>
            <div class="col-10">
                <input type="text" name="codigopostal" value="<?=$user->codigopostal?>" placeholder="Código Postal" required>
            </div>
        </div>
        <?php if($_SESSION['role']==1): //SE FOR 1(ADMIN)?>
            <select name="role">
                <?php if ($user->role == 1):?>
                    <option selected="selected" value="1">Admin</option>
                    <option value="2">Funcionário</option>
                    <option value="3">Cliente</option>
                <?php endif;?>
                <?php if ($user->role == 2):?>
                    <option value="1">Admin</option>
                    <option selected="selected" value="2">Funcionário</option>
                    <option value="3">Cliente</option>
                <?php endif;?>
                <?php if ($user->role == 3):?>
                    <option value="1">Admin</option>
                    <option value="2">Funcionário</option>
                    <option selected="selected" value="3">Cliente</option>
                <?php endif;?>
            </select>
        <?php endif; ?>
      <button>Confirmar</button>
    </form>
  </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=site&a=zonareservada" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>