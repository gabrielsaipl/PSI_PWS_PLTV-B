<div class="login-page">
    <div class="form">
    <form class="login-form" method="post" action="?c=user&a=update&id=<?=$user->id?>">
       <h2>Atualizar dados do Utilizador</h2>
        <input type="text" name="username" value="<?=$user->username?>" placeholder="Username" required>
        <input type="password" name="password" value="<?=$user->password?>" placeholder="Password" required>
        <input type="text" name="telefone" value="<?=$user->telefone?>" placeholder="Telefone" required>
        <input type="text" name="email" value="<?=$user->email?>" placeholder="Email" required>
        <input type="text" name="nif" value="<?=$user->nif?>" placeholder="NIF" required>
        <input type="text" name="morada" value="<?=$user->morada?>" placeholder="Morada" required>
        <input type="text" name="localidade" value="<?=$user->localidade?>" placeholder="Localidade" required>
        <input type="text" name="codigopostal" value="<?=$user->codigopostal?>" placeholder="Código Postal" required>
      <button>Submit</button>
    </form>
  </div>
</div>
