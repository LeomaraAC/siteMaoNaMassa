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
    <link rel="stylesheet" href="../CSS/dashboard-admin.css">
    <link rel="stylesheet" href="../CSS/menu-topo.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/custom.css">
    <link rel="stylesheet" href="../CSS/mensagens.css">
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
        $id = array("Produtos");
        include("../Layout/localizacao.inc");
        require_once '../DB/dbProduto.php';
        ?>
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header borda">
                        <h3 class="titulo">Menu</h3>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a data-toggle="tab"  href="#todos">Todos</a></li>
                            <li><a data-toggle="tab"  href="#adicionar">Adicionar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-xs-12">
                <div class="tab-content">
                    <div id="todos" class="tab-pane fade in active">
                        <?php
                        include "../Layout/Tabs/Produtos/todos.inc";
                        ?>
                    </div>
                    <div id="adicionar" class="tab-pane fade">
                        <?php
                        include "../Layout/Tabs/Produtos/adicionar.inc";
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
<script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
<script src="../JS/Produto.js"></script>
<script src="../JS/custom.js"></script>
</body>
</html>
