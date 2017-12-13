<?php
require_once '../DB/Produtos.php';
require_once '../DB/categoria.php';
$itensPagina = 12;
/** Quantidade de itens por página */

if (!isset($_GET["pagina"]))
    $pagina = 0;
else
    $pagina = intval($_GET["pagina"]);
$id = $numPag = 0;

if (!isset($_GET["id"])) {
    //Quando não tiver nenhum parametro na url , deve-se carregar todos os produtos
    $id = -1;
    $produtosCat = todosProdutosLimit($pagina * $itensPagina, $itensPagina);
    $numTotal = todosProdutos();
} else {
    $id = $_GET["id"];
    $categorias = categoriaById($id);
    if ($categorias == false){
        echo "<script>window.location = 'erro.php';</script>";
    }
    $produtosCat = produtoByCategoriaLimit($id, $pagina * $itensPagina, $itensPagina);
    $numTotal = produtoByCategoria($id);
}

$numPag = ceil($numTotal / $itensPagina);
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
            <?php
            if ($produtosCat != NULL) {
                echo '<div class="row conteudo">';
                echo '<div class="col-sm-12 text-center infoProdutoCat">';
                if ($id != -1)
                    echo "<h2>Produtos da Categoria " . ucfirst($categorias["descricao"]) . "</h2>";
                else
                    echo "<h2>Todos os Produtos</h2>";
                echo '</div>';
                echo '</div>';

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
                if ($cont !== 0) {
                    echo '</div>';
                }

            } else {
                echo '<div class="row conteudo primeira-linha">';
                echo "<div class = 'col-sm-12 text-center semProduto'><h1>Nenhum produto encontrado com a categoria " . ucfirst($categorias["descricao"]) . "</h1></div>";
                echo '</div>';
            }
            ?>

            <div class="row paginacao">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <?php
                            if ($pagina > 0) {
                                if (!isset($_GET["id"]))
                                    echo "<a href=\"categoriasProdutos.php?pagina=" . ($pagina - 1) . "\" aria-label=\"Previous\">";
                                else
                                    echo "<a href=\"categoriasProdutos.php??id=$id&pagina=" . ($pagina - 1) . "\" aria-label=\"Previous\">";

                                echo '<span aria-hidden="true">&laquo;</span>';
                                echo '</a>';
                            }
                            ?>
                        </li>
                        <?php
                        for ($i = 0; $i < $numPag; $i++) {
                            $estilo = "";
                            if ($pagina == $i)
                                $estilo = "active";
                            if (!isset($_GET["id"]))
                                echo "<li class='$estilo'><a href=\"categoriasProdutos.php?pagina=$i\">" . ($i + 1) . "</a></li>";
                            else
                                echo "<li class='$estilo'><a href=\"categoriasProdutos.php?id=$id&pagina=$i\">" . ($i + 1) . "</a></li>";
                        }
                        ?>

                        <li>
                            <?php
                            if ($pagina < $numPag - 1) {
                                if (!isset($_GET["id"]))
                                    echo "<a href=\"categoriasProdutos.php?pagina=" . ($pagina + 1) . "\" aria-label=\"Next\">";
                                else
                                    echo "<a href=\"categoriasProdutos.php??id=$id&pagina=" . ($pagina + 1) . "\" aria-label=\"Next\">";

                                echo '<span aria-hidden="true">&raquo;</span>';
                                echo '</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </nav>
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
