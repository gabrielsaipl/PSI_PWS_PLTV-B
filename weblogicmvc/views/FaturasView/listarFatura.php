<h2 class="text-left top-space">Faturas</h2>
<?php if($_SESSION['role'] != 3):?>
    <div class="col-sm-6">
        <h3>Criar nova</h3>
        <p>
            <a href="?c=fatura&a=create" class="btn btn-info" role="button">Novo</a>
        </p>
    </div>
<?php endif;?>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Cliente</h3></th>
            <th><h3>Data</h3></th>
            <th><h3>Estado</h3></th>
            </thead>
            <tbody>
            <?php foreach ($faturas as $fatura) { ?>
                <tr>
                    <?php $user = User::find([$fatura->usercliente_id])?>
                    <td><?=$user->username?></td>
                    <td><?=$fatura->data?></td>
                    <?php
                    if ($fatura->estado == 1) echo "<td>Emitida</td>";
                    else echo "<td>Em lançamento</td>";
                    ?>
                    <td>
                        <a href="?c=fatura&a=show&id=<?=$fatura->id?>" class="btn btn-info" role="button">Detalhes</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
