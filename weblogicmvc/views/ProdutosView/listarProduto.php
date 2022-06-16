<h2 class="text-left top-space">Produtos</h2>
<div class="col-sm-6">
    <h3>Criar novo</h3>
    <p>
        <a href="?c=produto&a=create" class="btn btn-info" role="button">Novo</a>
    </p>
</div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
            <th><h3>Descrição</h3></th>
            <th><h3>Preço</h3></th>
            <th><h3>Stock</h3></th>
            <th><h3>Iva</h3></th>
            </thead>
            <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td><?=$produto->descricao?></td>
                    <td><?=number_format($produto->preco,2)?>€</td>
                    <td><?=$produto->stock?> Uni.</td>
                    <td><?=$produto->iva->percentagem?>%</td>
                    <td>
                        <a href="?c=produto&a=show&id=<?=$produto->id?>" class="btn btn-info" role="button">Detalhes</a>
                        <a href="?c=produto&a=edit&id=<?=$produto->id?>" class="btn btn-info" role="button">Editar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
