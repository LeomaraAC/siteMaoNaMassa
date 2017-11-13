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
                $tipo = $_GET["opcao"];
                $id = array("Encomendas");
                include("../Layout/localizacao.inc");
                ?>
                <!-- ************************************** -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-solid">
                            <div class="box-header borda">
                                <h3 class="titulo">Menu</h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                    include '../Layout/subMenu/menuEncomendas.inc';
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <h3 class="box-title">Encomendas</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th>Contato</th>
                                                <th>Data</th>
                                                <th>Produto - Quantidade</th>
                                                <th>Observação</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Eduarda Oliveira</td>
                                                <td>(19) 994395368</td>
                                                <td>05/10/2017</td>
                                                <td>
                                                    <select size="" name="">
                                                        <option selected>Trufa Tadicional - 05</option>
                                                        <option value="2000">Trufa de Maracujá - 15</option>
                                                        <option value="2001">Bolo de Chocolate - 01</option>
                                                    </select>
                                                </td>
                                                <td>Bolo de Chocolate: quero com recheio de doce de leite e chocolate meio amargo.</td>
                                                <td><?php echo $tipo; ?></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tales Anjos</td>
                                                <td>(19) 994395368</td>
                                                <td>02/10/2017</td>
                                                <td>
                                                    <select size="" name="">
                                                        <option selected>Trufa Tadicional - 02</option>
                                                        <option value="2000">Trufa de Leite Ninho - 01</option>
                                                        <option value="2001">Bolo de Cenoura - 02</option>
                                                    </select>
                                                </td>
                                                <td>-</td>
                                                <td><?php echo $tipo; ?></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Leomara Castro</td>
                                                <td>(19) 994395368</td>
                                                <td>02/10/2017</td>
                                                <td>
                                                    <select size="" name="">
                                                        <option selected>Trufa Tadicional - 02</option>
                                                        <option value="2000">Trufa de Prestígio - 02</option>
                                                        <option value="2001">Trufa de Café - 04</option>
                                                    </select>
                                                </td>
                                                <td>Sou revendedora, favor aplicar o desconto combinado.</td>
                                                <td><?php echo $tipo; ?></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Taila Saviani</td>
                                                <td>(19) 994395368</td>
                                                <td>30/09/2017</td>
                                                <td>
                                                    <select size="" name="">
                                                        <option selected>Trufa de Morango - 01</option>
                                                        <option value="2000">Trufa de Maracujá - 01</option>
                                                        <option value="2001">Bolo de Sensação - 01</option>
                                                    </select>
                                                </td>
                                                <td>Quero a massa do bolo branca, por favor.</td>
                                                <td><?php echo $tipo; ?></td>
                                            </tr>                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        <script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
        <script src="../JS/custom.js"></script> 
    </body>
</html>
