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
                $id = array("Produtos", "Todos");
                include("../Layout/localizacao.inc");
                ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-solid">
                            <div class="box-header borda">
                                <h3 class="titulo">Menu</h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                    $tipo = "Todos";
                                    include '../Layout/subMenu/menuProdutos.inc';
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Produtos</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Produto</th>
                                            <th>Categoria</th>
                                            <th>Editar</th>
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Bolo de Morango</td>
                                            <td>Bolo</td>
                                            <td><i class="glyphicon glyphicon-edit"></i></td>
                                            <td><i class="glyphicon glyphicon-remove"></i></td>
                                        </tr>                                                                          
                                        <tr>
                                            <td>2</td>
                                            <td>Ovo de Páscoa de Colher - Recheio Frutas Vermelhas</td>
                                            <td>Ovo de Páscoa</td>
                                            <td><i class="glyphicon glyphicon-edit"></i></td>
                                            <td><i class="glyphicon glyphicon-remove"></i></td>
                                        </tr>                                                                          
                                        <tr>
                                            <td>3</td>
                                            <td>Truffa de morango </td>
                                            <td>Truffa</td>
                                            <td><i class="glyphicon glyphicon-edit"></i></td>
                                            <td><i class="glyphicon glyphicon-remove"></i></td>
                                        </tr>                                                                          
                                        <tr>
                                            <td>4</td>
                                            <td>Bolo no Pote de Limão</td>
                                            <td>Bolo no Pote</td>
                                            <td><i class="glyphicon glyphicon-edit"></i></td>
                                            <td><i class="glyphicon glyphicon-remove"></i></td>
                                        </tr>                                                                          
                                        <tr>
                                            <td>5</td>
                                            <td>Cupcake de Morango</td>
                                            <td>Cupcake</td>
                                            <td><i class="glyphicon glyphicon-edit"></i></td>
                                            <td><i class="glyphicon glyphicon-remove"></i></td>
                                        </tr>                                                                          
                                    </tbody>
                                </table>
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
    </body>
</html>
