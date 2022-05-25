<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=produto&a=store">
            <h2>Adicionar Produto</h2>
            <input type="text" name="referencia" placeholder="Referência"/>
            <input type="text" name="descricao" placeholder="Descrição"/>
            <input type="text" name="preco" placeholder="Preço"/>
            <input type="text" name="stock" placeholder="Stock"/>
            <select name="iva_id">
                <?php foreach($ivas as $iva){?>
                    <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?></option>
                <?php } ?>
            </select>
            <button>Adicionar</button>
        </form>
    </div>
</div>