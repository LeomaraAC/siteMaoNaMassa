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
        $id = array("Mensagens");
        include("../Layout/localizacao.inc");
        ?>
        <!-------------------------------------------->
        <div class="row">
            <?php
            include '../Layout/subMenu/menuMensagens.inc'
            ?>
            <div class="col-md-9">
                <div class="tab-content">
                    <div id="mensagens" class="tab-pane fade in active">
                        <?php
                        include '../Layout/Tabs/Mensagens/todasMensagens.inc';
                        ?>
                    </div>
                    <div id="lixeira" class="tab-pane fade">
                        <?php
                        include '../Layout/Tabs/Mensagens/lixeira.inc';
                        ?>
                    </div>
                    <div id="ler" class="tab-pane fade">
                        <div id="msgconteudo"></div>
                    </div>
                    <div id="responder" class="tab-pane fade">
                        <div id="respondermsg"></div>
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
<script src="../Bibliotecas/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="../JS/Mensagem.js"></script>
<script src="../JS/custom.js"></script>
<script>
    function deletarMensagem()
    {
        var confirmacao = confirm("Tem certeza que deseja apagar as mensagens selecionadas?");
        if(confirmacao)
        {
            var apagar = new Array();
            apagar.push(document.getElementById('idMensagemLida').firstChild.nodeValue);

            $.ajax({url: './../DB/dbMensagem.php',
                data: {action: 'apagarMensagensByID', parametros: apagar},
                type: 'post',
                success: function (output) {
                    alert(output);
                    window.location = 'Mensagem.php';
                },
                error: function() {
                    alert('Erro ao tentar apagar!');
                }
            });
        }
    }
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

