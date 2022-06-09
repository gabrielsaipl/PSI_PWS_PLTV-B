<h2 class="text-left top-space">Clientes</h2>
<div class="col-sm-6">
    <h3>Criar novo</h3>
    <p>
        <a href="index.php?c=user&a=create" class="btn btn-info" role="button">Novo</a>
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
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?=$cliente->username?></td>
                    <td><?=$cliente->email?></td>
                    <td><?=$cliente->telefone?></td>
                    <td>
                        <a href="index.php?c=user&a=show&id=<?=$cliente->id?>" class="btn btn-info" role="button">Detalhes</a>
                        <a href="index.php?c=user&a=edit&id=<?=$cliente->id?>" class="btn btn-info" role="button">Editar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
