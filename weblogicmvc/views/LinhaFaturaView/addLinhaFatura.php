<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=produto&a=store">
            <h2>Adicionar Linha de Fatura</h2>
            <!-- FALTA SELECIONAR PRODUTO -->
            <input type="number" name="quantidade" placeholder="Quantidade"/> <!-- AUTOMATICO? -->
            <input type="hidden" name="valorunitario"/> <!-- HIDDEN RECEBE DO PRODUTO SELECIONADO -->
            <input type="hidden" name="valoriva"/><!-- HIDDEN RECEBE DO PRODUTO SELECIONADO -->
            <input type="hidden" name="fatura_id"/> <!-- HIDDEN RECEBE DA FATURA-->
            <input type="hidden" name="produto_id" /> <!-- ESCOLHER FUNCIONARIO -->
            <button>Adicionar</button>
        </form>
    </div>
</div>
