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
                $id = "Home";
                include("../Layout/localizacao.inc");
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="box-title">Últimas Encomendas</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Produto - Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Eduarda Oliveira</td>
                                        <td>
                                            Trufa Tadicional - 05<br>
                                            Trufa de Maracujá - 15<br>
                                            Bolo de Chocolate - 01<br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Tales Anjos</td>
                                        <td>
                                            Trufa Tadicional - 02<br>
                                            Trufa de Leite Ninho - 01<br>
                                            Bolo de Cenoura - 02<br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Leomara Castro</td>
                                        <td>
                                            Trufa Tadicional - 02<br>
                                            Trufa de Prestígio - 02<br>
                                            Trufa de Café - 04<br>
                                        </td>
                                    </tr>                                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 tamanhoMinimo">
                        <canvas class="line-chart"></canvas>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Top 5 produtos encomendados</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="nome">Trufa Tradicional</td>
                                    </tr>
                                    <tr>
                                        <td class="nome">Trufa Nutella</td>
                                    </tr>
                                    <tr>
                                        <td class="nome">Bolo no pote de limão</td>
                                    </tr>                                             
                                    <tr>
                                        <td class="nome">Ovo de Páscoa Trufado Maracuja</td>
                                    </tr>                                             
                                    <tr>
                                        <td class="nome">Cupcake de morango</td>
                                    </tr>                                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Útimas mensagens</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="nome"><a href="lerMensagens.php">Bianca Machado</a></td>
                                        <td class="mensagem"><a href="lerMensagens.php">Dúvida sobre encomendas<span class="data-mensagem"> - Olá Mão Na Massa,Gostaria...</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="nome"><a href="lerMensagens.php">Bianca Machado</a></td>
                                        <td class="mensagem"><a href="lerMensagens.php">Dúvida sobre encomendas<span class="data-mensagem"> - Olá Mão Na Massa,Gostaria...</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="nome"><a href="lerMensagens.php">Bianca Machado</a></td>
                                        <td class="mensagem"><a href="lerMensagens.php">Dúvida sobre encomendas<span class="data-mensagem"> - Olá Mão Na Massa,Gostaria...</span></a>
                                        </td>
                                    </tr>                                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include '../Layout/footer.inc';
            ?>            
        </div>
        
        <script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
        <script src="../Bibliotecas/ChartJS/node_modules/chart.js/dist/Chart.min.js"></script>
        <script>
            var ctx = document.getElementsByClassName("line-chart");
            //Type, Data, options
            var chartGraph = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                    datasets: [{
                            label: 'vendas',
                            data: [5, 10, 16, 1, 25, 13, 94, 0, 25, 10, 8, 10],
                            //borderWidth: 6,
                            borderColor: 'rgba(77,166,253,0.85)',
                            backgroundColor: 'rgba(77,166,253,0.85)',
                            fill: false
                        }]
                },
                options: {
                    title: {
                        display: true,
                        fontSize: 20,
                        text: "Resumo das vendas"
                    }
                }
            });

        </script>
        <script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
        <script src="../JS/custom.js"></script>
    </body>
</html>
