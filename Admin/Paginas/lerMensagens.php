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
                        <div class="box box-primary">
                            <div class="box-header borda">
                                <h3 class="titulo">Ler e-mail</h3>
                            </div>
                            <div class="box-body no-padding">
                                <div class="mailbox-read-info">
                                    <h3><?php echo $linha["assunto"]?></h3>
                                    <h5><?php echo $linha["nome"];
                                    if($linha["email"] != "")
                                    {
                                        echo "<\"". $linha["email"] ."\">";
                                    }
                                    ?>
                                        <span class="data-mensagem pull-right"><?php echo $linha["dataEnvio"]?></span></h5>
                                </div>
                                <div class="padding-email borda text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Deletar e-mail" onclick="deletar()">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                        <?php
                                        if($linha["email"] != "")
                                        {
                                            echo "<a href=\"escreveMensagem.php?id=".$linha["idMensagem"]."\" class=\"btn btn-default btn-sm\" data-toggle=\"tooltip\" data-container=\"body\" title=\"Responder e-mail\" >";
                                            echo '<i class="glyphicon glyphicon-arrow-left"></i>';
                                            echo '</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="mailbox-read-message">
                                    <?php echo $linha["mensagem"];
                                    if($linha["telefone"] != "")
                                    {
                                        echo "<p>Telefone: ".$linha["telefone"]."</p>";
                                    }
                                    ?>

                                </div>
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
        <script src="../JS/custom.js"></script>
        <script>
            function deletar()
            {
                var confirmacao = confirm("Tem certeza que deseja apagar as mensagens selecionadas?");
                if(confirmacao)
                {
                    var apagar = new Array();
                    apagar.push(<?php echo $linha["idMensagem"]?>);
                    $.ajax({url: './../BD/dbMensagem.php',
                        data: {action: 'apagarMensagensByID', parametros: apagar},
                        type: 'post',
                        success: function (output) {
                            alert(output);
                            window.location = 'mensagens.php';
                        },
                        error: function() {
                            alert('Erro ao tentar apagar!');
                        }
                    });
                }
            }
        </script>
    </body>
</html>


