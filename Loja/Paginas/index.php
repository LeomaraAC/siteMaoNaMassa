<?php
require_once '../DB/Produtos.php';
require '../Arquivos/LerArquivo.php';
?>
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
        <?php
        include '../Layout/menuLateral.inc';
        include '../Layout/configuracao.inc';
        ?>
        <div id="page-content-wrapper">
            <div class="row conteudo">
                <div class="col-sm-7">
                    <?php
                    $ids = lerCarrossel();
                    $primeiroProd = produtoById($ids[0]);
                    $segundoProd = produtoById($ids[1]);
                    $terceiroProd = produtoById($ids[2]);
                    ?>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <?php
                            for ($cont = 0; $cont < 3; $cont++) {
                                $produto = produtoById($ids[$cont]);
                                if ($cont == 0)
                                    echo '<div class="item active">';
                                else
                                    echo '<div class="item">';
                                echo "<a href=\"produto.php?id=" . $produto["idProd"] . "\"><img src=\"" . $produto['urlImgLoja'] . "\"></a>";
                                echo '<div class="carousel-caption">';
                                echo "<a href=\"produto.php?id=" . $produto["idProd"] . "\"><h3>" . ucfirst($produto['descricao']) . "</h3></a>";
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>

                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-5 banner">
                    <?php
                    $idDestaque = lerDestaque();
                    $produto = produtoById($idDestaque);
                    ?>
                    <!-- Imagem do produto -->
                    <img src="<?php echo $produto["urlImgLoja"] ?>" class="img-responsive">
                    <!-- Informação do produto -->
                    <p><?php echo ucfirst($produto["descricao"]) ?>
                        - <?php echo $produto["peso"] . " " . strtolower($produto["unidadeMedida"]) ?></p>
                    <h4>R$ <?php echo number_format($produto["precoVenda"], 2, ',', '.'); ?></h4>
                    <ul class="nav btn-encomendar">
                        <li><a href="produto.php?id=<?php echo $produto["idProd"] ?>">Visualizar</a></li>
                    </ul>
                </div>
            </div>
            <?php
            $produtosCat = todosProdutosLimit(0,16);
            if ($produtosCat != NULL) {
                $cont = 0; //Irá servir como um controlador para poder saber quando dar um echo na div row
                /*Percorrer os resultados e coloca-los na tela*/
                while ($prod = $produtosCat->fetch_assoc()) {
                    if ($cont == 0) {
                        echo '<div class="row conteudo">';
                        $cont = 4;
                    }
                    echo '<div class="col-sm-3 item-venda">';
                    echo "<img src=\"" . $prod["urlImgLoja"] . "\" class=\"img-responsive\">";
                    echo "<p>" . ucfirst($prod["descricao"]) . " - " . $prod["peso"] . " " . strtolower($prod["unidadeMedida"]) . "</p>";
                    echo "<h4>R$ " . number_format($prod["precoVenda"], 2, ',', '.') . "</h4>";
                    echo '<ul class="nav btn-encomendar">';
                    echo "<li><a href=\"produto.php?id=" . $prod["idProd"] . "\">Visualizar</a></li>";
                    echo '</ul>';
                    echo '</div>';
                    if ($cont == 1)//Fechando a div row
                        echo '</div>';
                    $cont--;
                }
            } else {
                echo '<div class="row conteudo primeira-linha">';
                echo "<div class = 'col-sm-12 text-center semProduto'><h1>Nenhum produto encontrado no sistema</h1></div>";
                echo '</div>';
            }
            ?>
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
