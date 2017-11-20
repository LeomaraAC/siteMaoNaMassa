<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <link rel="icon" href="../Imagens/logo.ico">

        <title>Mão na massa</title>

        <link href="../Bibliotecas/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Bibliotecas/perfect-scrollbar-master/css/perfect-scrollbar.css" rel="stylesheet">
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
                <!-- Sidebar -->
                <?php
                include '../Layout/menuLateral.inc';
                include '../Layout/configuracao.inc';
                ?>
                
                <div id="page-content-wrapper">
                    <div class="row ">
                        <div class="col-sm-12 cabecalho">
                            <h1>Como são feitos?</h1>
                        </div>
                    </div>
                    <div class="row conteudoInterno">
                        <div class="col-sm-6">
                            <?php
                            include '../Cookie/Tema/compara.inc';

                            include '../Arquivos/LerArquivo.php';
                            $conteudo = lerInfo("Fabricacao");
                            echo $conteudo;
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <img src="../Imagens/Configuracoes/mao-na-massa.jpg" class="img-responsive imagemInterna">
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
        <script src="../Bibliotecas/perfect-scrollbar-master/dist/perfect-scrollbar.js"></script>

        <!-- Incluindo o nosso js -->
        <script type="text/javascript" src="../JS/custom.js"></script> 
    </body>

</html>

