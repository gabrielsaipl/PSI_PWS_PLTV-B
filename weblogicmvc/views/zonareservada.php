<?php ?>
<div class="login-page">
    <div class="form">
        <div id="form">
            <h1>Zona reservada</h1>
            <div id="form_scroll">
                <div class="space"></div>
                <?php if($_SESSION['role'] == 3):?>
                    <a href="index.php?c=fatura&a=historico&id=<?=$_SESSION['userid']?>"><button>Histórico de Faturas</button></a>
                    <div class="space"></div>
                <?php else:?>
                    <a href="index.php?c=user&a=edit&id=<?= $_SESSION['userid']?>"><button>Atualizar Dados</button></a>
                    <div class="space"></div>
                    <a href="index.php?c=fatura&a=create"><button>Emitir Nova Fatura</button></a>
                    <div class="space"></div>
                    <a href="index.php?c=fatura&a=index"><button>Gerir faturas</button></a>
                    <div class="space"></div>
                    <a href="index.php?c=user&a=cliente"><button>Gerir Clientes</button></a>
                    <div class="space"></div>
                    <a href="index.php?c=produto&a=index"><button>Produtos e Stock</button></a>
                    <div class="space"></div>
                    <a href="index.php?c=iva&a=index"><button>Taxa do IVA</button></a>
                    <div class="space"></div>
                    <a href="index.php?c=empresa&a=show"><button>Dados da Empresa</button></a>
                    <div class="space"></div>
                   <?php if($_SESSION['role']==1):?>
                        <a href="index.php?c=user&a=funcionario"><button>Gerir Funcionários</button></a>
                    <?php endif;
                endif;?>
            </div>
        </div>
  </div>
</div>