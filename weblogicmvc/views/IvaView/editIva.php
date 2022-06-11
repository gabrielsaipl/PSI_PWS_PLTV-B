<div class="login-page">
    <div class="form">
        <form class="login-form" method="post" action="?c=iva&a=update&id=<?=$iva->id?>">
            <h2>Atualizar dados do Iva</h2>
            <input type="text" name="descricao" value="<?=$iva->descricao?>" placeholder="Descrição" required>
            <input type="text" name="percentagem" value="<?=$iva->percentagem?>" placeholder="%Iva" required>
            <select name="emvigor">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
            <button>Confirmar</button>
        </form>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=iva&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>