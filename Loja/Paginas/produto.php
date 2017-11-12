<!DOCTYPE html>
<html lang="en">

    <head>
         <meta charset="utf-8">
        <link rel="icon" href="../Imagens/logo.ico">

        <title>Mão na massa</title>

        <link href="../Bibliotecas/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">                
        <link href="../CSS/dashboard.css" rel="stylesheet">
        <link href="../CSS/footer.css" rel="stylesheet">
        <link href="../CSS/custom.css" rel="stylesheet">
        <link href="../CSS/configuracaoTema.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>      
        <?php
        include '../Cookie/Tema/compara.inc';
        ?>
    </head>

    <body>
        <div class="overlay"></div>
         <?php
        include '../Layout/menuTop.inc';
        ?>

        <div id="wrapper" class="">
            <div class="container-fluid">
                <?php
                include '../Layout/menuLateral.inc';
                include '../Layout/configuracao.inc';
                ?>
                <div id="page-content-wrapper">
                    <div class="row conteudoInterno">
                        <div class="col-sm-6 item-produto">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/ovodepascoa-frutas.jpg" class="img-responsive">
                        </div>
                        <div class="col-sm-5 conteudo-produto">
                            <div class="row">
                                <!-- Preço do produto -->
                                <div class="col-sm-12">
                                    <h3>Ovo de Páscoa de Colher - Recheio Frutas Vermelhas</h3>
                                </div>
                            </div>
                            <div class="row preco-produto">
                                <!-- Preço do produto -->
                                <div class="col-sm-12">
                                    <h3>R$ 40,00</h3>
                                </div>
                                <div class="col-sm-12">
                                    <ul class="nav btn-encomendar">
                                        <li><a href="#">Encomendar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="info-produto"> Informações do produto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Categoria: Ovo de Páscoa</td>
                                    </tr>
                                    <tr>
                                        <td>Peso: 500g</td>
                                    </tr>
                                </tbody>
                            </table>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
        
        <!-- Incluindo o nosso js -->
        <script type="text/javascript" src="../JS/custom.js"></script> 
    </body>

</html>
