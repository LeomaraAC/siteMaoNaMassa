<?php
session_start();
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
    <link href="../CSS/carrinho.css" rel="stylesheet">
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
        <!-- Sidebar -->
        <?php
        include '../Layout/menuLateral.inc';
        include '../Layout/configuracao.inc';
        ?>

        <div id="page-content-wrapper">
            <div class="row conteudoInterno">
                <form id="formCarrinho" name="formCarrinho">
                    <div class="conteudoInterno primeira-linha">
                        <ul id="progresso" class="text-center">
                            <li class="ativo">Carrinho</li>
                            <li>Identificação</li>
                            <li>Finalização</li>
                        </ul>
                    </div>
                    <fieldset class=" col-sm-12 col-xs-12 tabela">
                        <div class="row">
                            <h2 class="info-produto">Carrinho
                                <small>Clique em "Encomendar para efetuar o seu pedido.</small>
                            </h2>
                        </div>
                        <?php
                        require_once '../DB/Produtos.php';
                        if (isset($_SESSION['carrinho'])) {
                            $total = 0;
                            echo '<table class="table table-responsive table-carrinho" id="mycarrinho">';
                            echo '<thead><tr><th colspan="2" width="45%">Produto</th>';
                            echo '<th width="15%">Preço unitário</th><th width="15%">Quantidade</th>';
                            echo '<th width="15%">Subtotal</th><th width="10%">Excluir</th>';
                            echo '</tr></thead><tbody class="tblEncomenda">';
                            foreach ($_SESSION['carrinho'] as $idProduto => $qtde) {
                                $produto = produtoById($idProduto);
                                $subTotal = $produto["precoVenda"] * $qtde;
                                $total += $subTotal;
                                echo '<tr id="tr' . $idProduto . '">';
                                echo '<td>';
                                echo '<div class="imagem-tblEncomenda">';
                                echo "<a href=\"produto.php?id=" . $idProduto . "\">";
                                echo "<img src=\"" . $produto["urlImgLoja"] . "\" alt=\"Produto no carrinho\">";
                                echo '</a>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td class="descricao-tblEncomenda">';
                                echo '<a href="produto.php?id=' . $idProduto . '">' . $produto["descricao"] . '</a>';
                                echo '</td>';
                                echo '<td>R$ ' . number_format($produto["precoVenda"], 2, ',', '') . '</td>';
                                echo '<td>';
                                echo '<i onclick="diminui('.$idProduto.')" class="glyphicon glyphicon glyphicon-minus"></i>';
                                echo '<input type="text" onblur="addProdDigitado('.$idProduto.')" class= "qtde" id="qtde' . $idProduto . '" name="qtde' . $idProduto . '" value="' . $qtde . '">';
                                echo '<i onclick="acrescenta('.$idProduto.')" class="glyphicon glyphicon-plus"></i>';
                                echo '</td>';
                                echo '<td><strong>R$ <label id="subT'.$idProduto.'">' . number_format($subTotal, 2, ',', '') . '</label></strong></td>';
                                echo '<td>';
                                echo '<i onclick="remove('.$idProduto.')" class="glyphicon glyphicon-trash"></i>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            echo '<tr>';
                            echo '<td colspan="6" class="valTotal-tblEncomenda">';
                            echo '<span>Total: </span>';
                            echo '<strong>R$ <label id="total">' . number_format($total, 2, ',', '') . '</label></strong>';
                            echo '</td>';
                            echo '</tr>';
                            echo '</tbody></table>';
                            echo '<input type="button" name="next1" class="btn-encomendar next" value="Encomendar">';
                        } else
                            echo '<h1 class="text-center text-danger">Nenhum produto adicionado ao carrinho</h1>';

                        ?>
                    </fieldset>
                    <fieldset class="col-sm-12 col-xs-12 tabela">
                        <div class="row">
                            <h2 class="info-produto">Identificação
                                <small>Informe seus dados para concluir o seu pedido.</small>
                            </h2>
                        </div>
                        <div class="row contornoDiv">
                            <h2 class="rotulo-Info">
                                <small>Informações pessoais</small>
                            </h2>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="nome">Nome Completo:</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Fulano Ribeiro da Silva" maxlength="70" size="50">
                                </div>
                            </div>
                        </div>
                        <div class="row contornoDiv">
                            <h2 class="rotulo-Info">
                                <small>Informações para contato</small>
                            </h2>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="tel">Telefone</label>
                                    <input type="text" class="form-control" id="tel" name="tel" placeholder="" size="15">
                                </div>
                                <div class="form-group">
                                    <label for="cel">Celular:</label>
                                    <input type="text" class="form-control" id="cel" name="cel" placeholder="" size="15">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="jane.doe@example.com" size="40">
                                </div>
                            </div>
                        </div>

                        <input type="button" name="next2" class="btn-encomendar next" value="Proximo">
                        <input type="button" name="prev" class="btn-encomendar prev" value="Anterior">
                    </fieldset>
                    <fieldset class="col-sm-12 col-xs-12 tabela">
                        <div class="row">
                            <h2 class="info-produto">Finalização
                                <small>Clique em "Finalizar" para enviar o pedido</small>
                            </h2>
                        </div>
                        <h1 class="text-center">Obrigado pelo preferência!</h1>
                        <input type="submit" class="btn-encomendar" id="Finalizar" name="Finalizar" value="Finalizar">
                        <input type="button" name="prev" class="btn-encomendar prev" value="Anterior">
                    </fieldset>
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
<script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src="../JS/carrinho.js"></script>
<script src="../JS/encomenda.js"></script>
<script src="../Bibliotecas/perfect-scrollbar-master/dist/perfect-scrollbar.js"></script>
<script src="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

<!-- Incluindo o nosso js -->
<script type="text/javascript" src="../JS/custom.js"></script>
</body>

</html>

