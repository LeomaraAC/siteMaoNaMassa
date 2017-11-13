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
                $id = array("Configurações da Loja");
                include("../Layout/localizacao.inc");
                ?>
                <div class="row">
                    <?php
                    include '../Layout/subMenu/menuConfig.inc';
                    ?>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <?php
                            include  '../Arquivos/ler.php';
                            ?>
                            <div id="destaque" class="tab-pane fade in active">
                                <?php
                                include '../Layout/Tabs/destaque.inc';
                                ?>
                            </div>
                            <div id="carrossel" class="tab-pane fade">
                               <?php
                               include '../Layout/Tabs/carrossel.inc'
                               ?>
                            </div>
                            <div id="sobre" class="tab-pane fade">
                                <?php
                                $titulo = "Editar Quem Somos";
                                $tipo = "Sobre";
                                include '../Layout/Tabs/sobre.inc'
                                ?>
                            </div>
                            <div id="fabricacao" class="tab-pane fade">
                                <?php
                                $titulo = "Editar Como São Feitos";
                                $tipo = "Fabricacao";
                                include '../Layout/Tabs/sobre.inc'
                                ?>
                            </div>
                            <div id="contato" class="tab-pane fade">
                                <?php
                                $titulo = "Editar Contato";
                                $tipo = "Contato";
                                include '../Layout/Tabs/sobre.inc'
                                ?>
                            </div>
                            <div id="localizacao" class="tab-pane fade">
                                <?php
                                $titulo = "Editar Localização";
                                $tipo = "Localizacao";
                                include '../Layout/Tabs/sobre.inc'
                                ?>
                            </div>
                        </div>

                    </div>
                    <?php
                    include '../Layout/footer.inc';
                    ?>
                </div>

            </div>
            <script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
            <script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
            <script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
            <script src="../JS/custom.js"></script>
            <script src="../Bibliotecas/tinymce/js/tinymce/tinymce.min.js"></script>
            <script>
                tinymce.init({
                    selector:'textarea',
                    setup: function (editor) {
                        editor.on('change', function () {
                            editor.save();
                        });
                    }
                });
            </script>
    </body>
</html>

