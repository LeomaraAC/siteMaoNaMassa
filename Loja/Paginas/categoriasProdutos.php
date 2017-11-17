<?php
require_once '../DB/Produtos.php';
require_once '../DB/categoria.php';
if (!isset($_GET["id"])) {
    //Quando não tiver nenhum parametro na url , deve-se carregar todos os produtos
    $id = -1;
    $produtosCat = todosProdutos();
}
else
{
    $id = $_GET["id"];
    $categorias = categoriaById($id);
    $produtosCat = produtoByCategoria($id);
}
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
            <?php
            if ($produtosCat != NULL) {
                echo '<div class="row conteudo">';
                    echo '<div class="col-sm-12 text-center infoProduto">';
                    if($id != -1)
                        echo "<h2>Produtos da Categoria ".$categorias["descricao"]."</h2>";
                    else
                        echo "<h2>Todos os Produtos</h2>";
                    echo '</div>';
                echo '</div>';

                $cont = 0; //Irá servir como um controlador para poder saber quando dar um echo na div row
                /*Percorrer os resultados e coloca-los na tela*/
                while ($prod = $produtosCat->fetch_assoc())
                {
                    if ($cont == 0)
                    {
                        echo '<div class="row conteudo">';
                        $cont = 4;
                    }
                    echo '<div class="col-sm-3 item-venda">';
                        echo "<img src=\"".$prod["urlImgLoja"]."\" class=\"img-responsive\">";
                        echo "<p>".$prod["descricao"]." - ".$prod["peso"]." ".$prod["unidadeMedida"]."</p>";
                        echo "<h4>R$ ".number_format($prod["precoVenda"], 2, ',', '.')."</h4>";
                        echo '<ul class="nav btn-encomendar">';
                            echo "<li><a href=\"produto.php?id=".$prod["idProd"]."\">Encomendar</a></li>";
                        echo '</ul>';
                    echo '</div>';
                    if ($cont == 1)//Fechando a div row
                        echo '</div>';
                    $cont--;
                }
            } else {
                echo '<div class="row conteudo primeira-linha">';
                echo "<div class = 'col-sm-12 text-center semProduto'><h1>Nenhum produto encontrado com a categoria ".$categorias["descricao"]."</h1></div>";
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
<script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
<!-- Incluindo o nosso js -->
<script type="text/javascript" src="../JS/custom.js"></script>
</body>

</html>
