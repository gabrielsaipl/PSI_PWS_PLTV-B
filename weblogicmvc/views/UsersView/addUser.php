<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=user&a=store">
            <h2>Adicionar Utilizador</h2>
            <input type="text" name="username" placeholder="Username" required>
            <div class="row">
                <div class="col-11">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="col-1" style="padding-top: 15px">
                    <input type="checkbox" onclick="alterarVisaoPassword()">
                </div>
            </div>
            <input type="text" name="telefone" placeholder="Telefone" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="nif" placeholder="NIF" required>
            <input type="text" name="morada" placeholder="Morada" required>
            <input type="text" name="localidade" placeholder="Localidade" required>
            <input type="text" name="codigopostal" placeholder="Código Postal" required>
            <?php if($_SESSION['role']==1): //SE FOR 1(ADMIN)?>
                <select name="role">
                    <option value="1">Admin</option>
                    <option value="2">Funcionário</option>
                    <option value="3">Cliente</option>
                </select>
            <?php else: //SE FOR 2(FUNCIONARIO)?>
                <input type="hidden" name="role" value="3"> <!-- INPUT HIDDEN PORQUE O FUNCIONÁRIO SÓ CONSEGUE ADD CLIENTES(3)-->
            <?php endif;?>
            <button>Adicionar</button>
        </form>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=site&a=zonareservada" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>
