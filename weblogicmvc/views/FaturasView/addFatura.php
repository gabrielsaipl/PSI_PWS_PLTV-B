<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=fatura&a=store">
            <h2>Adicionar Fatura</h2>
            <input type="hidden" name="data" value="<?php echo date('Y-m-d H:i:s');?>">
            <input type="hidden" name="valortotal" value="0" placeholder="Valortotal"/>
            <input type="hidden" name="ivatotal" value="0" placeholder="ivatotal"/>
            <input type="hidden" name="estado" value="0" />
            <input type="hidden" name="userfuncionario_id" value="<?= $_SESSION['userid']?>" />
            <div class="row">
                <div class="col-9">
                    <input list="clientes" name="usercliente_id" placeholder="Escolha o cliente" required>
                    <datalist id="clientes">
                        <?php foreach($clientes as $cliente){?>
                            <option value="<?=$cliente->id?>"> <?=$cliente->username; ?> </option>
                        <?php } ?>
                    </datalist>
                </div>
                <div class="col-3">
                    <button>Novo</button>
                </div>
            </div>
            <button>Adicionar Fatura</button>
        </form>
    </div>
</div>
<div class="col-sm-6">
    <p>
        <a href="?c=fatura&a=index" class="btn btn-info" role="button">Voltar</a>
    </p>
</div>