<h2 class="text-left top-space">Ivas</h2>
<div class="col-sm-6">
    <h3>Criar novo</h3>
    <p>
        <a href="?c=iva&a=create" class="btn btn-info" role="button">Novo</a>
    </p>
</div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Descrição</h3></th>
            <th><h3>Percentagem</h3></th>
            <th><h3>Estado</h3></th>
            </thead>
            <tbody>
            <?php foreach ($ivas as $iva) { ?>
                <tr>
                    <td><?=$iva->descricao?></td>
                    <td><?=$iva->percentagem?></td>
                    <?php if($iva->emvigor==1):?>
                    <td>Ativo</td>
                    <?php else:?>
                    <td>Inativo</td>
                    <?php endif;?>
                    <td>
                        <a href="?c=iva&a=show&id=<?=$iva->id?>" class="btn btn-info" role="button">Detalhes</a>
                        <a href="?c=iva&a=edit&id=<?=$iva->id?>" class="btn btn-info" role="button">Editar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
