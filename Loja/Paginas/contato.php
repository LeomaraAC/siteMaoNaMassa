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
    <link rel="stylesheet" href="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.css">
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
                    <h1>Contato</h1>
                </div>
            </div>
            <div class="row conteudoInterno">
                <div class="col-sm-6">
                    <p class="titulo"> Contate-nos pelos telefones:</p>
                    <?php
                    include  '../Arquivos/LerArquivo.php';
                    $conteudo = lerInfo("Contato");
                    echo $conteudo;
                    ?>
                </div>
                <div class="col-md-6">
                    <p class="titulo"> ...Ou envie-nos uma mensagem</p>
                    <form id="envioMensagem">
                        <div class="form-group">
                            <label for="nome">Nome:*</label>
                            <input type="text" class="form-control" id="nome" name="nome" required onkeyup="toUpper(this);" onKeyPress = "teclaLetra();">
                        </div>
                        <div class="form-group">
                            <label for="email">Telefone:</label>
                            <input type="text" class="form-control tel" id="telefone" name="telefone" placeholder="(99)99999-9999">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" onkeyup="toUpper(this);" >
                        </div>
                        <div class="form-group">
                            <label for="assunto">Assunto:*</label>
                            <input type="text" class="form-control" id="assunto" name="assunto" placeholder=""required onkeyup="toUpper(this);" onKeyPress = "teclaLetra();" >
                        </div>
                        <div class="form-group">
                            <label for="mensagem">Mensagem:*</label>
                            <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required onkeyup="toUpper(this);" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include '../Layout/footer.inc';
        ?>
    </div>
</div>
<script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
<script src="../Bibliotecas/jQuery-Mask-Plugin/src/jquery.mask.js"></script>
<script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../Bibliotecas/perfect-scrollbar-master/dist/perfect-scrollbar.js"></script>
<script src="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- Incluindo o nosso js -->
<script type="text/javascript" src="../JS/custom.js"></script>
<script type="text/javascript" src="../JS/enviaMensagem.js"></script>
<script type="text/javascript" src="../JS/mask.js"></script>

</body>

</html>

