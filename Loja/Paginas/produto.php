<?php
require_once '../DB/Produtos.php';
require_once '../DB/categoria.php';
if (!isset($_GET["id"])) {
    //Quando não tiver nenhum parametro exibir uma página de erro
    header("Location: erro.php");
}
$id = $_GET["id"];
$prod = produtoById($id);
/*Buscar a categoria do Produto*/
$idCat = $prod["idCategoria"];
$categoriaP = categoriaById($idCat);
?>
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
                            <img src="<?php echo $prod["urlImgLoja"] ?>" class="img-responsive">
                        </div>
                        <div class="col-sm-5 conteudo-produto">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3><?php echo $prod["descricao"] ?></h3>
                                </div>
                            </div>
                            <div class="row preco-produto">
                                <!-- Preço do produto -->
                                <div class="col-sm-12">
                                    <h3>R$ <?php echo number_format($prod["precoVenda"], 2, ',', '.') ?></h3>
                                </div>
                                <div class="col-sm-12">
                                        <?php
                                         $statusProd = $prod["Status"];
                                        if (strcmp("Disponível",$statusProd) == 0)
                                        {
                                            echo '<ul class="nav btn-encomendar">';
                                            echo "<li><a  class=\"btn-encomendarProd\" id=\"".$id."\">Encomendar</a></li>";
                                            echo '</ul>';
                                        }
                                        else
                                            echo '<h2 class="text-center text-danger">Produto indisponível</h2>'
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive tabela">
                            <table class="table table-border-none tabela-produto">
                                <thead>
                                    <tr>
                                        <th class="info-produto"> Informações do produto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Categoria: <?php echo $categoriaP["descricao"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Peso: <?php echo $prod["peso"]; echo  $prod["unidadeMedida"]?></td>
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
        <script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
        
        <!-- Incluindo o nosso js -->
        <script type="text/javascript" src="../JS/custom.js"></script>
        <script type="text/javascript" src="../JS/encomenda.js"></script>
    </body>

</html>
