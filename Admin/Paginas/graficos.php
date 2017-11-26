<?php
session_start();
require_once '../PHP/seguranca.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../Imagens/logo.ico">
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../Bibliotecas/bootstrap-3.3.7/css/bootstrap.min.css">
    <link href="../Bibliotecas/perfect-scrollbar-master/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/dashboard-admin.css">
    <link rel="stylesheet" href="../CSS/menu-topo.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/custom.css">
    <link rel="stylesheet" href="../CSS/mensagens.css">
    <link rel="stylesheet" href="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="../Bibliotecas/font-awesome-4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php
include '../Layout/menuTop.inc';
?>
<div class="wrapper">
    <?php
    include '../Layout/menuLateral.inc';
    ?>
    <div id="content">
        <?php
        $id = array("Relatórios");
        include("../Layout/localizacao.inc");
        ?>
        <div class="row">
            <?php
            include '../Layout/subMenu/menuRelatorios.inc';
            ?>
            <div class="col-md-9">
                <div class="tab-content">
                    <?php
                    require_once '../DB/dbBuscasRelatorios.php';
                    ?>
                    <div id="prodMensal" class="tab-pane fade in active">
                        <?php
                        include '../Layout/Tabs/Graficos/mensal.inc';
                        ?>
                    </div>
                    <div id="prodEnc" class="tab-pane fade">
                        <?php
                        include '../Layout/Tabs/Graficos/encomenda.inc';
                        ?>
                    </div>
                    <div id="prodVend" class="tab-pane fade">
                        <?php
                        include '../Layout/Tabs/Graficos/venda.inc';
                        ?>
                    </div>
                    <div id="despesas_receitas" class="tab-pane fade">
                        <?php
                        include '../Layout/Tabs/Graficos/despesas_receitas.inc';
                        ?>
                    </div>
                    <!--<div id="estoque" class="tab-pane fade">
                        <?php
/*                        include '../Layout/Tabs/Graficos/estoque.inc';
                        */?>
                    </div>-->
                    <div id="maisVendido" class="tab-pane fade">
                        <?php
                        include '../Layout/Tabs/Graficos/maisVend.inc';
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    include '../Layout/footer.inc';
    ?>
</div>
<script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
<script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../Bibliotecas/perfect-scrollbar-master/dist/perfect-scrollbar.js"></script>
<script src="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../JS/custom.js"></script>
<script src="../JS/Relatorios.js"></script>
</body>
</html>
