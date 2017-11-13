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
                            <h1>Contato</h1>
                        </div>
                    </div>
                    <div class="row conteudoInterno">
                        <div class="col-sm-6">
                            <p class="titulo"> Contate-nos pelos telefones:</p>
                            <?php
                                include  '../Arquivos/ler.php';
                                $conteudo = ler("Contato");
                                echo $conteudo;
                            ?>
                        </div>
                        <div class="col-md-6">
                            <p class="titulo"> ...Ou envie-nos uma mensagem</p>
                            <form method="post" action="../DB/Mensagem.php">
                                <div class="form-group">
                                    <label for="nome">Nome:*</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(99)99999-9999">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="assunto">Assunto:*</label>
                                    <input type="text" class="form-control" id="assunto" name="assunto" placeholder=""required>
                                </div>
                                <div class="form-group">
                                    <label for="mensagem">Mensagem:*</label>
                                    <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-custom">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                include './Includes/footer.inc';
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

