<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=linhafatura&a=store">
            <h2>Adicionar Linha de Fatura</h2>
            <label for="produtos">Produto:</label>
            <input list="produtos" name="produto_id" required>
            <datalist id="produtos">
                <?php foreach($produtos as $produto){?>
                    <option value="<?=$produto->id?>"> <?=$produto->descricao; ?> </option>
                <?php } ?>
            </datalist>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <input type="hidden" name="valorunitario" value="0"/> <!-- HIDDEN RECEBE DO PRODUTO SELECIONADO -->
            <input type="hidden" name="valoriva" value="0"/><!-- HIDDEN RECEBE DO PRODUTO SELECIONADO -->
            <input type="hidden" name="fatura_id" value="<?=$idFatura?>"/>
            <button>Adicionar</button>
        </form>
    </div>
</div>
