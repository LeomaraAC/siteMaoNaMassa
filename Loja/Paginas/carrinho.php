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
    <link href="../CSS/carrinho.css" rel="stylesheet">
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
            <div class="row conteudoInterno">
                <form id="formCarrinho">
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
                            <table class="table table-responsive table-carrinho">
                                <thead>
                                <tr>
                                    <th colspan="2" width="45%">Produto</th>
                                    <th width="15%">Preço unitário</th>
                                    <th width="15%">Quantidade</th>
                                    <th width="15%">Subtotal</th>
                                    <th width="10%">Excluir</th>
                                </tr>
                                </thead>
                                <tbody class="tblEncomenda">
                                <tr>
                                    <td>
                                        <div class="imagem-tblEncomenda">
                                            <a href="#">
                                                <img src="../Imagens/UploadUsuario/780_0009_BC_Trufa_Cereja-650x520.png" alt="">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="descricao-tblEncomenda">
                                        <a href="#">Trufa de cereja</a>
                                    </td>
                                    <td>R$ 3,50</td>
                                    <td>
                                        <i class="glyphicon glyphicon glyphicon-minus"></i>
                                        <input type="text" id="qtde" name="qtde" value="1">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </td>
                                    <td>R$ 3,50</td>
                                    <td>
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="valTotal-tblEncomenda">
                                        <span>Total: </span>
                                        <strong>R$ 3,50</strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <input type="button" name="Carrinho" id="Carrinho" class="btn-encomendar next" value="Encomendar">
                        </fieldset>
                        <fieldset class="col-sm-12 col-xs-12 tabela">
                            <div class="row">
                                <h2 class="info-produto">Identificação
                                    <small>Informe seus dados para concluir o seu pedido.</small>
                                </h2>
                            </div>
                            <div class="row contornoDiv">
                                <h2 class="rotulo-Info"><small>Informações pessoais</small></h2>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="nome">Nome Completo:</label>
                                        <input type="text" class="form-control" id="nome" placeholder="Fulano Ribeiro da Silva"maxlength="70" size="75" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rg">RG:</label>
                                        <input type="text" class="form-control" id="rg" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row contornoDiv">
                                <h2 class="rotulo-Info"><small>Informações para contato</small></h2>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="tel">Telefone</label>
                                        <input type="text" class="form-control" id="tel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="cel">Celular:</label>
                                        <input type="text" class="form-control" id="cel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com" size="40">
                                    </div>
                                </div>
                            </div>
                            <div class="row contornoDiv">
                                <h2 class="rotulo-Info"><small>Informações para contato</small></h2>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="tel">Telefone</label>
                                        <input type="text" class="form-control" id="tel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="cel">Celular:</label>
                                        <input type="text" class="form-control" id="cel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com" size="40">
                                    </div>
                                </div>
                            </div>
                            <div class="row contornoDiv">
                                <h2 class="rotulo-Info"><small>Informações para contato</small></h2>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="tel">Telefone</label>
                                        <input type="text" class="form-control" id="tel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="cel">Celular:</label>
                                        <input type="text" class="form-control" id="cel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com" size="40">
                                    </div>
                                </div>
                            </div>
                            <div class="row contornoDiv">
                                <h2 class="rotulo-Info"><small>Informações para contato</small></h2>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="tel">Telefone</label>
                                        <input type="text" class="form-control" id="tel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="cel">Celular:</label>
                                        <input type="text" class="form-control" id="cel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com" size="40">
                                    </div>
                                </div>
                            </div>
                            <div class="row contornoDiv">
                                <h2 class="rotulo-Info"><small>Informações para contato</small></h2>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="tel">Telefone</label>
                                        <input type="text" class="form-control" id="tel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="cel">Celular:</label>
                                        <input type="text" class="form-control" id="cel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com" size="40">
                                    </div>
                                </div>
                            </div>
                            <div class="row contornoDiv">
                                <h2 class="rotulo-Info"><small>Informações para contato</small></h2>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="tel">Telefone</label>
                                        <input type="text" class="form-control" id="tel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="cel">Celular:</label>
                                        <input type="text" class="form-control" id="cel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com" size="40">
                                    </div>
                                </div>
                            </div>
                            <div class="row contornoDiv">
                                <h2 class="rotulo-Info"><small>Informações para contato</small></h2>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="tel">Telefone</label>
                                        <input type="text" class="form-control" id="tel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="cel">Celular:</label>
                                        <input type="text" class="form-control" id="cel" placeholder="" size="30">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" placeholder="jane.doe@example.com" size="40">
                                    </div>
                                </div>
                            </div>
                            <input type="button" class="btn-encomendar next" id="Identificacao" name="Identificacao" value="Proximo">
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
<script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>

<!-- Incluindo o nosso js -->
<script type="text/javascript" src="../JS/custom.js"></script>
</body>

</html>

