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
                    <div class="row conteudo primeira-linha">
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/bolo-kitkat.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Bolo Kit Kat - 1kg</p>
                            <h4>R$ 50,00</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/trufa-morango.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Truffa de morango - 50g</p>
                            <h4>R$ 3,00</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/bolo-prestigio.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Bolo de Prestigio - 1,5kg</p>
                            <h4>R$ 45,00</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>

                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/ovodepascoa.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Ovo de Páscoa Clássico- 500g</p>
                            <h4>R$ 30,00</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Outra linha de conteudo -->
                    <div class="row conteudo">
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/bolo-no-pote-limao.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Bolo no Pote de Limão- 100g</p>
                            <h4>R$ 8,50</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/trufa-nutella.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Truffa de Nutella - 50g</p>
                            <h4>R$ 3,00</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/bolo.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Bolo de Chocolate - 700g</p>
                            <h4>R$ 45,00</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>

                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/ovodepascoa-doce-leite.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Ovo de Páscoa Trufado Doce de Leite - 500g</p>
                            <h4>R$ 39,75</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- terceira linha de conteudo -->
                    <div class="row conteudo">
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/ovodepascoa-maracuja.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Ovo de Páscoa Trufado Maracuja - 400g</p>
                            <h4>R$ 46,90</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/bolo-no-pote-chocolate.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Bolo no Pote de Maracujá - 100g</p>
                            <h4>R$ 8,50</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/trufa-ninho.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Truffa de Ninho - 50g</p>
                            <h4>R$ 3,00</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>

                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/bolo-morango.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Bolo de Morango - 1kg</p>
                            <h4>R$ 49,80</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Quarta linha -->
                    <div class="row conteudo">
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/ovodepascoa-frutas.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Ovo de Páscoa de Colher(Recheio Frutas Vermelhas) - 400g</p>
                            <h4>R$ 46,90</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/cupcake.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Cupcake de Morango - 50g</p>
                            <h4>R$ 4,50</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/caixa-trufa.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Caixa de truffas tradicional - 5 unidades</p>
                            <h4>R$ 10,00</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>

                        </div>
                        <div class="col-sm-3 item-venda">
                            <!-- Imagem do produto -->
                            <img src="../Imagens/UploadUsuario/bolo-no-pote-morango.jpg" class="img-responsive">
                            <!-- Informação do produto -->
                            <p>Bolo no Pote de Morango- 100g</p>
                            <h4>R$ 8,50</h4>
                            <ul class="nav btn-encomendar">
                                <li><a href="#">Encomendar</a></li>
                            </ul>
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
