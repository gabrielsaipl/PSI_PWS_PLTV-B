<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=user&a=store">
            <h2>Adicionar Utilizador</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="telefone" placeholder="Telefone" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="nif" placeholder="NIF" required>
            <input type="text" name="morada" placeholder="Morada" required>
            <input type="text" name="localidade" placeholder="Localidade" required>
            <input type="text" name="codigopostal" placeholder="Código Postal" required>
            <?php $_SESSION['role']=1;if($_SESSION['role']==1): //SE FOR 1(ADMIN)?>
                <select name="role">
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
