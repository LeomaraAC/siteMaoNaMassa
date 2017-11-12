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
                        ?>
                        <div class="col-md-9">
                            <div class="box box-primary">
                                <div class="box-header borda">
                                    <h3 class="titulo">Entadas</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <div class="padding-email">
                                        <button type="button" class="btn btn-default btn-sm todos" data-toggle="tooltip" title="Marcar todos"><i class="glyphicon glyphicon-unchecked"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deletar" onclick="deletar()"><i class="glyphicon glyphicon-trash"></i></button>
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Recarregar" onclick="atualizar()"><i class="glyphicon glyphicon-refresh"></i></button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="tabela-entrada" class="table table-hover table-striped" align="left">
                                            <tbody>
                                                <?php
                                                    require_once '../BD/dbMensagem.php';
                                                    $resultado = todasMensagem();
                                                    if ($resultado) {
                                                        while ($linha = $resultado->fetch_assoc()) { //
                                                            echo '<tr>';
                                                            echo '<td style="display: none">' . $linha["idMensagem"] . '</td>';
                                                            echo '<td class="tamanhoTd"><input type="checkbox" id="mensagem"></td>';
                                                            echo "<td class=\"nome\"><a href=\"lerMensagens.php?id=". $linha["idMensagem"] ."\">" . ucfirst($linha["nome"]) . "</a></td>";
                                                            echo "<td class=\"mensagem\"><a href=\"lerMensagens.php?id=". $linha["idMensagem"] ."\">" . $linha["assunto"] . "<span class=\"data-mensagem\"> -" . substr($linha["mensagem"], 0, 25) . "...</span></a>";
                                                            echo '</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                ?>                                              
                                            </tbody>
                                        </table>
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
            function atualizar()
            {
                $('.table-responsive').load('mensagens.php .table-responsive');
                if ($(".todos > i").hasClass('glyphicon-check'))
                {
                    $(".todos > i").removeClass('glyphicon-check');
                    $(".todos > i").addClass('glyphicon-unchecked');
                }
            }
            function deletar()
            {
                var array_apagar = new Array();

                $("#tabela-entrada tbody tr").each(function () {
                    var id = $(this).children('td:first-child').text();
                    var selecionado = $(this).find('input:checkbox')[0].checked;

                    if (selecionado) {
                        array_apagar.push(id);
                    }

                });

                if (array_apagar.length > 0) {
                    var confirmacao = confirm("Tem certeza que deseja apagar as mensagens selecionadas?");
                    if(confirmacao)
                    {
                        $.ajax({url: './../BD/dbMensagem.php',
                            data: {action: 'apagarMensagensByID', parametros: array_apagar},
                            type: 'post',
                            success: function (output) {
                                alert(output);
                                atualizar();
                            },
                            error: function() {
                                alert('Erro ao tentar apagar mensagem!');
                            }
                        });
                    }else
                        atualizar();

                }else {
                    alert("Selecione a mensagem a ser apagada.");
                }
            }
        </script>
    </body>
</html>

