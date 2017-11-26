<?php
session_start();
require_once '../PHP/seguranca.php';
include '../DB/dbEncomenda.php';
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
    <link rel="stylesheet" href="../Bibliotecas/DataTable/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../Bibliotecas/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.css">
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
        $id = array("Encomendas");
        include("../Layout/localizacao.inc");
        ?>
        <!-- ************************************** -->
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <?php
                include '../Layout/subMenu/menuEncomendas.inc';
                ?>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="tab-content">
                    <div id="Pendentes" class="tab-pane fade in active">
                        <?php
                        include '../Layout/Tabs/Encomendas/ePendente.inc';
                        ?>
                    </div>
                    <div id="Ativas" class="tab-pane fade">
                        <?php
                        include '../Layout/Tabs/Encomendas/eAtivas.inc';
                        ?>
                    </div>
                    <div id="Finalizadas" class="tab-pane fade">
                        <?php
                        include '../Layout/Tabs/Encomendas/eFinalizadas.inc';
                        ?>
                    </div>
                    <div id="Rejeitadas" class="tab-pane fade">
                        <?php
                        include '../Layout/Tabs/Encomendas/eRejeitados.inc';
                        ?>
                    </div>
                    <div id="editar" class="tab-pane fade"></div>
                    <div id="visualizar" class="tab-pane fade"></div>
                </div>
            </div>
        </div>
        <!-- ************************************** -->

    </div>
    <?php
    include '../Layout/footer.inc';
    ?>
</div>
<script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
<script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../Bibliotecas/perfect-scrollbar-master/dist/perfect-scrollbar.js"></script>
<script src="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script type="text/javascript" language="javascript"
        src="../Bibliotecas/DataTable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
        src="../Bibliotecas/DataTable/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" class="init">
    $(document).ready(function () {
        $('.table').DataTable({
            "language": {
                "url": "../Bibliotecas/DataTable/Portuguese-Brasil.txt"
            }
        });
    });
</script>
<script src="../JS/encomenda.js"></script>
<script src="../JS/custom.js"></script>
</body>
</html>
