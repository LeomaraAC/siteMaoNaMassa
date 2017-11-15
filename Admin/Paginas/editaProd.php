<?php
require_once '../DB/dbProduto.php';
if (!isset($_GET["id"]))
    header("Location: erro.php");
else {
    $idProduto = $_GET["id"];
    $linha = produtoEditID($idProduto);
    $url = $linha["url"];
    $_SESSION['urlImg'] = $url;
}
?>
<form id="formeditado">

    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div id="foto" class="user-bg">
                <img id="img-prod" class="img-perfil" width="100%" alt="Produto" src="<?php echo $url ?>">
                <div class="trocar-foto-prod">
                    <input type="file" id="image-prod" name="image-prod" onchange="readURL(this);" accept="image/*"
                           class="form-control form-input Profile-input-file">
                    <i class="glyphicon glyphicon-camera"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="form-group">
            <label class="col-md-12">Produto</label>
            <div class="col-md-12">
                <input id="prodEdit" name="prodEdit" type="text" class="form-control" readonly placeholder="Produto..."
                       value="<?php echo $linha["prod"] ?>">
            </div>
        </div>
        <input type="text" id="idProduto" name="idProduto" value="<?php echo $idProduto ?>" hidden/>
        <div class="form-group">
            <label for="text" class="col-md-12">Categoria</label>
            <div class="col-md-12">
                <input id="descricaoEdit" name="descricaoEdit" type="text" class="form-control" readonly
                       placeholder="Categoria..." value="<?php echo $linha["cat"] ?>">
            </div>
        </div>
        <div class="col-md-12 form-produto">
            <div class="form-group col-md-6 col-xs-12">
                <label for="text" class="col-md-12">Preço Unitário</label>
                <div class="col-md-12">
                    <label class="sr-only" for="preco">Preço</label>
                    <div class="input-group">
                        <div class="input-group-addon">R$</div>
                        <input type="text" class="form-control" id="precoEdit" name="precoEdit" placeholder="0.00"
                               readonly value="<?php echo $linha["precoVenda"] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6 col-xs-12 form-lateral">
                <label for="text" class="col-md-12">Status</label>
                <select class="form-control" id="statusEdit" name="statusEdit">
                    <option value="">Selecione...</option>
                    <option value="Disponível">Disponível</option>
                    <option value="Indisponível">Indisponível</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 form-produto">
            <div class="form-group col-md-6 col-xs-12">
                <label class="col-xs-12">Peso</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" id="pesoEdit" name="pesoEdit" value="">
                </div>
            </div>
            <div class="form-group col-md-6 col-xs-12 form-lateral">
                <label for="text" class="col-md-12">Unidade de Medida</label>
                <select class="form-control" id="medidasEdit" name="medidasEdit">
                    <option value="">Selecione...</option>
                    <option value="Unidade(s)">Unidade(s)</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                </select>
            </div>
        </div>
        <div class="form-group text-right">
            <div class="col-sm-12">
                <button class="btn btn-ativo">
                    <i class="glyphicon glyphicon-plus"></i>
                    Alterar Produto
                </button>
            </div>
        </div>
    </div>
</form>
<script src="../JS/editProd.js"></script>