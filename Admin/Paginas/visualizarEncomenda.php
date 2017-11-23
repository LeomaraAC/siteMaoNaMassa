<?php
require_once '../DB/dbEncomenda.php';
if (!isset($_GET["id"]))
    header("Location: erro.php");
else {
    $idProduto = $_GET["id"];
    $linha = buscaTodasEncomendasById($idProduto);
}
?>
<link rel="stylesheet" href="../Bibliotecas/bootstrap-3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../CSS/encomenda.css">
<link rel="stylesheet" href="../CSS/dashboard-admin.css">

<h3 class="box-title">Editar encomenda</h3>
<div class="col-md-12 col-xs-12">
    <div class="contornoDiv">
        <h1>
            <small>Informações do pedido</small>
        </h1>
        <div class="form-inline">
            <div class="form-group">
                <label for="numEnc">Nº da encomenda</label>
                <input type="text" class="form-control" id="numEnc" name="numEnc" value="<?php echo $idProduto ?>"
                       size="3" readonly>
            </div>
            <div class="form-group">
                <label for="dataEnc">Data da encomenda:</label>
                <!--$date = new DateTime($date);
 -->
                <input type="text" class="form-control" id="dataEnc" name="dataEnc"
                       value="<?php $date = new DateTime($linha["dataEncomenda"]);
                       echo $date->format('d/m/Y'); ?>" size="7" readonly>
            </div>
            <div class="form-group">
                <label for="dataPrev">Data da entrega:</label>
                <input type="text" class="form-control" id="dataEnc" name="dataEnc"
                       value="<?php if ($linha["dataFinalEntega"] != "") {
                           $date = new DateTime($linha["dataFinalEntega"]);
                           echo $date->format('d/m/Y');
                       } else {
                           if ($linha["dataEntregaPrev"] != "")
                           {
                               $date = new DateTime($linha["dataEntregaPrev"]);
                               echo $date->format('d/m/Y');
                           }
                       } ?>" size="7" readonly>
            </div>
        </div>
    </div>
    <div class="contornoDiv">
        <h1>
            <small>Informações do cliente</small>
        </h1>
        <div class="form-inline">
            <div class="form-group">
                <label for="nomeCli">Nome:</label>
                <input type="text" class="form-control" id="nomeCli" name="nomeCli"
                       value="<?php echo $linha["cliente"] ?>" readonly>
            </div>
        </div>
    </div>
    <div class="contornoDiv">
        <h1>
            <small>Contato do Cliente</small>
        </h1>
        <div class="form-inline">
            <div class="form-group">
                <label for="cel">Celular:</label>
                <input type="text" class="form-control" id="cel" name="cel"
                       value="<?php echo empty($linha["cel"]) ? "--" : $linha["cel"] ?>" size="15" readonly>
            </div>
            <div class="form-group">
                <label for="tel">Telefone:</label>
                <input type="text" class="form-control" id="tel" name="tel"
                       value="<?php echo empty($linha["tel"]) ? "--" : $linha["tel"] ?>" size="15" readonly>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" size="35"
                       value="<?php echo empty($linha["email"]) ? "--" : $linha["email"] ?>" readonly>
            </div>
        </div>
    </div>
    <div class="contornoDiv">
        <h1>
            <small>Endereço do Cliente</small>
        </h1>
        <?php
        include '../DB/dbEndereco.php';
        $endereco = buscaEndereco($linha["idEndereco"]);
        ?>
        <div class="form-inline">
            <div class="form-group hidden">
                <label for="cel">Id:</label>
                <input type="text" class="form-control" id="idEnc" name="idEnd"
                       value="<?php echo $linha["idEndereco"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cel">Rua:</label>
                <input type="text" class="form-control" id="rua" name="rua" value="<?php echo empty($endereco["rua"] ) ? "--" : $endereco["rua"]  ?>"
                       size="55" readonly>
            </div>
            <div class="form-group">
                <label for="tel">Número:</label>
                <input type="text" class="form-control" id="numero" name="numero"
                       value="<?php echo empty($endereco["numero"] ) ? "--" : $endereco["numero"] ?>" size="5" readonly>
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" size="35"
                       value="<?php echo empty($endereco["bairro"] ) ? "--" : $endereco["bairro"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" size="35"
                       value="<?php echo empty($endereco["cidade"] ) ? "--" : $endereco["cidade"] ?>" readonly>
            </div>
        </div>
    </div>
    <!--*************************************************-->
    <div class="contornoDiv">
        <?php
        $prod_qtde = buscaEncomendaByNumEncomenda($idProduto);
        ?>
        <h1>
            <small>Produtos encomendados</small>
        </h1>
        <div class="table-responsive">
            <table id="prod-encomendas" class="table">
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($prod = $prod_qtde->fetch_assoc()) {
                    echo '<tr>';
                    echo "<td>" . $prod["descricao"] . "</td>";
                    echo "<td>" . $prod["qtde"] . "</td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="contornoDiv">
        <h1>
            <small>Observações</small>
        </h1>
        <textarea name="observacoes" id="observacoes" readonly><?php echo $linha["Observacao"] ?></textarea>
    </div>
</div>