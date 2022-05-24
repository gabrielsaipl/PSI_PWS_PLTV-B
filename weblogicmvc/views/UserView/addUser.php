<?php require_once "views/layout/header.php";?>
<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=user&a=store">
            <h2>Adicionar Utilizador</h2>
            <input type="text" name="username" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="text" name="telefone" placeholder="Telefone">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="nif" placeholder="NIF">
            <input type="text" name="morada" placeholder="Morada">
            <input type="text" name="localidade" placeholder="Localidade">
            <input type="text" name="codigopostal" placeholder="Código Postal">
            <?php $_POST['userid']=1;if($_POST['userid']==1): //SE FOR 1(ADMIN)?>
                <select name="role">
                    <option value="2">Funcionário</option>
                    <option value="3">Utilizador</option>
                </select>
            <?php else: //SE FOR 2(FUNCIONARIO)?>
                <input type="hidden" name="role" value="3"> <!-- INPUT HIDDEN PORQUE O FUNCIONÁRIO SÓ CONSEGUE ADD CLIENTES(3)-->
            <?php endif;?>
            <button>Adicionar</button>
        </form>
    </div>
</div>
<?php require_once "views/layout/footer.php";?>