<div class="login-page">
    <div class="form">
        <form class="login-form" method="post" action="?c=produto&a=update&id=<?=$produto->id?>">
            <h2>Atualizar dados do Produto</h2>
            <input type="text" name="descricao" value="<?=$produto->descricao?>" placeholder="Descrição" required>
            <input type="text" name="referencia" value="<?=$produto->referencia?>" placeholder="Referência" required>
            <input type="text" name="preco" value="<?=$produto->preco?>" placeholder="Preço" required>
            <input type="number" name="stock" value="<?=$produto->stock?>" placeholder="Stock" required>

            <select name="iva_id">
                <?php foreach($ivas as $iva){?>
                    <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?></option>
                <?php } ?>
            </select>
            <button>Confirmar</button>
        </form>
    </div>
</div>
