<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=produto&a=store">
            <h2>Adicionar Produto</h2>
            <input type="text" name="referencia" placeholder="Referência" required>
            <input type="text" name="descricao" placeholder="Descrição" required>
            <input type="text" name="preco" placeholder="Preço" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="Iva">Iva: </label>
                </div>
                <div class="col-10">
                    <select name="iva_id">
                        <?php foreach($ivas as $iva){?>
                            <option value="<?= $iva->id?>"> <?= $iva->percentagem; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button>Adicionar</button>
        </form>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=produto&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>