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
                $id = array("Configurações da Loja");
                include("../Layout/localizacao.inc");
                ?>
                <div class="row">
                    <?php
                    include '../Layout/subMenu/menuConfig.inc';
                    require_once '../DB/dbProduto.php';
                    ?>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <?php
                            include  '../Arquivos/confgLoja.php';
                            ?>
                            <div id="destaque" class="tab-pane fade in active">
                                <?php
                                include '../Layout/Tabs/ConfgLoja/destaque.inc';
                                ?>
                            </div>
                            <div id="carrossel" class="tab-pane fade">
                               <?php
                               include '../Layout/Tabs/ConfgLoja/carrossel.inc'
                               ?>
                            </div>
                            <div id="sobre" class="tab-pane fade">
                                <?php
                                $titulo = "Editar Quem Somos";
                                $tipo = "Sobre";
                                include '../Layout/Tabs/ConfgLoja/sobre.inc'
                                ?>
                            </div>
                            <div id="fabricacao" class="tab-pane fade">
                                <?php
                                $titulo = "Editar Como São Feitos";
                                $tipo = "Fabricacao";
                                include '../Layout/Tabs/ConfgLoja/sobre.inc'
                                ?>
                            </div>
                            <div id="contato" class="tab-pane fade">
                                <?php
                                $titulo = "Editar Contato";
                                $tipo = "Contato";
                                include '../Layout/Tabs/ConfgLoja/sobre.inc'
                                ?>
                            </div>
                            <div id="localizacao" class="tab-pane fade">
                                <?php
                                $titulo = "Editar Localização";
                                $tipo = "Localizacao";
                                include '../Layout/Tabs/ConfgLoja/sobre.inc'
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
            <script src="../Bibliotecas/perfect-scrollbar-master/dist/perfect-scrollbar.js"></script>
            <script src="../JS/confLoja.js"></script>
            <script src="../JS/Produto.js"></script>
            <script src="../JS/custom.js"></script>
            <script src="../Bibliotecas/tinymce/js/tinymce/tinymce.min.js"></script>
            <script src="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
            <script>
                tinymce.init({
                    selector:'textarea',
                    setup: function (editor) {
                        editor.on('change', function () {
                            editor.save();
                        });
                    }
                });
                $("#carrossel").ready(function () {
                    //requisitar os ids do carrossel
                    $.ajax({
                        url: './../Arquivos/confgLoja.php',
                        data: {action: 'lerCarrossel'},
                        dataType: 'json',
                        type: 'post',
                        success: function (id) {
                            $("#produto0").val(id[0]);
                            $("#produto1").val(id[1]);
                            $("#produto2").val(id[2]);
                            $.each(id, function( index, value ) {
                                //t = "produto"+index;
                                carragarProd(value, 'carrossel',index);
                            });

                        },
                        error: function () {
                            swal(
                                'Oops...',
                                'Erro ao tentar carregar o carrossel!',
                                'error'
                            )
                        }
                    });
                });
                $(window).ready(function () {
                    //requisitar o id do destaque
                    $.ajax({
                        url: './../Arquivos/confgLoja.php',
                        data: {action: 'lerDestaque'},
                        type: 'post',
                        success: function (id) {
                            $("#prod").val(id);
                            carragarProd(id, 'destaque','')
                        },
                        error: function () {
                            swal(
                                'Oops...',
                                'Erro ao tentar carregar o destaque!',
                                'error'
                            )
                        }
                    });

                });
            </script>
    </body>
</html>

