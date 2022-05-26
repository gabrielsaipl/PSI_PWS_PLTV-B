<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=produto&a=store">
            <h2>Adicionar Produto</h2>
            <input type="text" name="referencia" placeholder="Referência" required>
            <input type="text" name="descricao" placeholder="Descrição" required>
            <input type="text" name="preco" placeholder="Preço" required>
            <input type="text" name="stock" placeholder="Stock" required>
            <select name="iva_id">
                <?php foreach($ivas as $iva){?>
                    <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?></option>
                <?php } ?>
            </select>
            <button>Adicionar</button>
        </form>
    </div>
</div>