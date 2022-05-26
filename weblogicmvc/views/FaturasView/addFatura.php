<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="?c=fatura&a=store">
            <h2>Adicionar Fatura</h2>
            <input type="hidden" name="data" value="<?php echo date('Y-m-d H:i:s');?>"/>
            <input type="hidden" name="valortotal" value="0" placeholder="Valortotal"/>
            <input type="hidden" name="ivatotal" value="0" placeholder="ivatotal"/>
            <input type="hidden" name="estado" value="0" />
            <input type="hidden" name="userfuncionario_id" value="<?php echo "1" //$_POST['userid']?>" />
            <input list="clientes" name="usercliente_id">
            <datalist id="clientes">
                <?php foreach($clientes as $cliente){?>
                    <!--<option data-value="<?//= $cliente->id?>"> <?//=$cliente->username;?> </option>-->
                    <option value="<?=$cliente->id?>"> <?=$cliente->username; ?> </option>
                <?php } ?>
            </datalist>
            <button>Adicionar</button>
        </form>
    </div>
</div>
