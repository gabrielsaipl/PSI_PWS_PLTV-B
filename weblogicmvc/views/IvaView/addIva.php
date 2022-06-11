<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=iva&a=store">
            <h2>Adicionar Iva</h2>
            <input type="text" name="percentagem" placeholder="Percentagem" required>
            <select name="emvigor">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
            <input type="text" name="descricao" placeholder="Descrição" required>
            <button>Adicionar</button>
        </form>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=iva&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>
