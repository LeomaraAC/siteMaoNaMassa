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
                        <div class="row ">
                            <div class="col-sm-12 cabecalho">
                                <h1>Localização</h1>
                            </div>
                        </div>
                        <div class="row conteudoInterno">
                            <div class="col-sm-6">

                                <p class="titulo"> Nós nos encontramos na cidade:</p>
                                <?php
                                include  '../Arquivos/LerArquivo.php';
                                $conteudo = lerInfo("Localizacao");
                                echo $conteudo;
                                ?>
                            </div>
                            <div class="col-sm-6" id="maps">
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



        <!-- Maps -->
        <!-- Carregando a API pela url especificada-->
        <!-- No callback chama a função initMap() depois que a API é carregada -->
        <!--  async permite que o navegador continue renderizando o resto da sua página enquanto a API carrega.  -->
        <!--  key contém a sua chave de API. -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc3U4_OFITX_J4PXjLdlM3nymLKDTXUV0&callback=initMap"></script>
        <script>
            /* A função initMap() irá carregar o maps quando a pagina é carregada*/
            function initMap() {
                var IFSP = {/* Cordenadas do mapa*/
                    lat: -22.9972026,
                    lng: -47.512814
                };
                var map = new google.maps.Map(document.getElementById('maps'), {/* Constroi um mapa na div com o id = maps*/
                    zoom: 13,
                    /* Define o nivel de zoom do mapa*/
                    center: IFSP /*  informa a API a localização do ponto central do mapa */
                });
                var marker = new google.maps.Marker({/* Inserindo um marcador no mapa*/
                    position: IFSP,
                    /*define a posição do marcador*/
                    map: map

                });
            }
            /* Fim Maps*/
        </script>

    </body>

</html>
