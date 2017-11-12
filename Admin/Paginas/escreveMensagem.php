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
                $id = array("Mensagens");
                include("../Layout/localizacao.inc");
                ?>
                <!-------------------------------------------->     
                <div class="row">
                    <?php
                    include '../Layout/subMenu/menuMensagem.inc';
                    require_once '../BD/dbMensagem.php';
                    $idMensagem = $_GET["id"];
                    $linha = mensagemId($idMensagem);
                    ?>
                    <div class="col-md-9">
                        <form method="post" action="../PHP/envioEmail.php">
                            <div class="box box-primary">
                                <div class="box-header borda">
                                    <h3 class="titulo">Nova Mensagem</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="email" name="para" class="form-control" placeholder="Para:" value="<?php echo $linha["email"]?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="assunto" class="form-control" placeholder="Assunto:" value="RE: <?php echo $linha["assunto"]?>" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="mensagem" id="mensagem" class="form-control" style="height: 300px"></textarea>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i> Enviar</button>
                                    </div>
                                    <a href="mensagens.php" class="btn btn-default">
                                        <i class="glyphicon glyphicon-remove"></i>Descartar
                                    </a>
                                </div>
                            </div>
                        </form>
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
        <script src="../JS/custom.js"></script> 

    </body>
</html>

