<form id="formproduto">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div id="foto" class="user-bg">
                <img id="img-produto" class="img-perfil" width="100%" alt="Produto" src="../Imagens/produtos/padrao.png">
                <div class="trocar-foto-prod">
                    <input type="file" id="image-prod" name="image-prod" onchange="readURL(this, '.img-perfil');" accept="image/*" class="form-control form-input Profile-input-file" >
                    <i class="glyphicon glyphicon-camera"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
            <div class="form-group">
                <label class="col-md-12">Produto</label>
                <div class="col-md-12">
                    <select class="form-control" name="produto" id="produto" onchange="carragarProd(produto.value, 'addProd')">
                        <option value="-1">Selecione...</option>
                        <?php
                        $todosProd = todosProdutosInvisiveis();
                        if($todosProd)
                        {
                            while ($produto = $todosProd->fetch_assoc())
                            {
                                echo "<option value='".$produto["idProd"]."'>".$produto["descricao"]."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="text" class="col-md-12">Categoria</label>
                <div class="col-md-12">
                    <input id="descricao" name="descricao" type="text"class="form-control" readonly placeholder="Categoria...">
                </div>
            </div>
            <div class="col-md-12 form-produto">
                <div class="form-group col-md-6 col-xs-12">
                    <label for="text" class="col-md-12">Preço Unitário</label>
                    <div class="col-md-12">
                        <label class="sr-only" for="preco">Preço</label>
                        <div class="input-group">
                            <div class="input-group-addon">R$</div>
                            <input type="text" class="form-control" id="preco" name="preco" placeholder="0.00" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12 form-lateral">
                    <label for="text" class="col-md-12">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">Selecione...</option>
                        <option value="D">Disponível</option>
                        <option value="I">Indisponível</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 form-produto">
                <div class="form-group col-md-6 col-xs-12">
                    <label class="col-xs-12">Peso</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control pesoProd" id="peso" name="peso" maxlength="12">
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12 form-lateral">
                    <label for="text" class="col-md-12">Unidade de Medida</label>
                    <select class="form-control" id="medidas" name="medidas">
                        <option value="">Selecione...</option>
                        <option value="UN">Unidade(s)</option>
                        <option value="KG">kg</option>
                        <option value="G">g</option>
                        <option value="MG">mg</option>
                        <option value="L">Litro(s)</option>
                        <option value="ML">ml</option>
                    </select>
                </div>
            </div>
            <div class="form-group text-right">
                <div class="col-sm-12">
                    <button class="btn btn-ativo">
                        <i class="glyphicon glyphicon-plus"></i>
                        Inserir Produto
                    </button>
                </div>
            </div>
        </div>
</form>