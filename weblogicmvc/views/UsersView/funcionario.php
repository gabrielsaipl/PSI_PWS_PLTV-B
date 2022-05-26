<h2 class="text-left top-space">Funcionários</h2>
<div class="col-sm-6">
    <h3>Criar novo</h3>
    <p>
        <a href="router.php?c=user&a=create" class="btn btn-info" role="button">New</a>
    </p>
</div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Username</h3></th>
            <th><h3>Email</h3></th>
            <th><h3>Telefone</h3></th>
            </thead>
            <tbody>
            <?php foreach ($funcionarios as $funcionario) { ?>
                <tr>
                    <td><?=$funcionario->username?></td>
                    <td><?=$funcionario->email?></td>
                    <td><?=$funcionario->telefone?></td>
                    <td>
                        <a href="router.php?c=user&a=show&id=<?=$funcionario->id?>" class="btn btn-info" role="button">Detalhes</a>
                        <a href="router.php?c=user&a=edit&id=<?=$funcionario->id?>" class="btn btn-info" role="button">Editar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>