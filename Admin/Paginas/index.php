<?php
session_start();
require_once '../PHP/seguranca.php';
include '../DB/dbBuscasRelatorios.php';
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
                        <?php
                        include '../DB/dbEncomenda.php';
                        $resultados = buscaEncomendasPendentesLimit();
                        while ($encomenda = $resultados->fetch_assoc()) {
                            $prod_qtde = buscaEncomendaByNumEncomenda($encomenda["id"]);
                            echo '<tr>';
                            echo '<td data-id="' . $encomenda["id"] . '" class="">' . $encomenda["id"] . '</td>';
                            echo "<td>" . $encomenda["cliente"] . "</td>";
                            echo '<td>';
                            while ($prod = $prod_qtde->fetch_assoc()) {
                                echo $prod["descricao"] . " - " . $prod["qtde"] . "<br>";
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 tamanhoMinimo" id="graficoIndex">
                <canvas class="graficosMensal"></canvas>
            </div>
        </div>
        <div class="row">
            <?php
            $populares = encomendasPopulares();
            ?>
            <div class="col-md-6">
                <h3>Top 5 produtos encomendados</h3>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <?php
                        while ($encomenda = $populares->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td class="nome">'.$encomenda["descricao"].'</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Útimas mensagens</h3>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <?php
                        require_once '../DB/dbMensagem.php';
                        $resultado = todasMensagemLimit();
                        if ($resultado) {
                            while ($linha = $resultado->fetch_assoc()) { //
                                echo '<tr>';
                                echo "<td style='display: none' data-id = '".$linha["idMensagem"]."'>".$linha["idMensagem"]."</td>";
                                echo "<td class=\"nome\"><a data-toggle=\"tab\" class='ler'>" . ucfirst($linha["nome"]) . "</a></td>";
                                echo "<td class=\"mensagem\"><a data-toggle=\"tab\" class='ler'>" . $linha["assunto"] . "<span class=\"data-mensagem\"> -" . substr($linha["mensagem"], 0, 25) . "...</span></a>";
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
    <?php
    include '../Layout/footer.inc';
    ?>
</div>

<script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
<script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../Bibliotecas/perfect-scrollbar-master/dist/perfect-scrollbar.js"></script>
<script src="../Bibliotecas/ChartJS/node_modules/chart.js/dist/Chart.min.js"></script>
<script src="../JS/custom.js"></script>
<script src="../JS/Relatorios.js"></script>
</body>
</html>
