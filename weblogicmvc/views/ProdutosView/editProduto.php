<div class="login-page">
    <div class="form">
        <form class="login-form" method="post" action="?c=produto&a=update&id=<?=$produto->id?>">
            <h2>Atualizar dados do Produto</h2>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="descricao">Descrição: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="descricao" value="<?=$produto->descricao?>" placeholder="Descrição" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="referencia">Referência: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="referencia" value="<?=$produto->referencia?>" placeholder="Referência" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="preco">Preço: </label>
                </div>
                <div class="col-10">
                    <input type="text" name="preco" value="<?=$produto->preco?>" placeholder="Preço" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="padding-top: 15px">
                    <label for="stock">Stock: </label>
                </div>
                <div class="col-10">
                    <input type="number" name="stock" value="<?=$produto->stock?>" placeholder="Stock" required>
                </div>
            </div>
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

            <button>Confirmar</button>
        </form>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=produto&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>
