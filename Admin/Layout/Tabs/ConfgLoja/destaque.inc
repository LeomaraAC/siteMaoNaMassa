<form id="destaque">
    <div class="col-sm-12">
        <div class="box-header borda">
            <h3 class="titulo">Editar Destaque</h3>
        </div>
        <div class="col-sm-5 col-xs-12">
            <div class="img-Destaque">
                <img id="prodDestaque" class="img-responsive" width="100%" alt="Produto em destaque" src="../Imagens/produtos/padrao.png" >
            </div>
        </div>
        <div class="col-sm-7 col-xs-12">
            <div class="form-group">
                <label for="text" class="col-md-12">Produto</label>
                <div class="col-md-12">
                    <select class="form-control" name="prod" id="prod" onchange="carragarProd(prod.value, 'destaque','')">
                        <option value="">Selecione...</option>
                        <?php
                        $todosProd = todosProdutosVisiveis(true);
                        if($todosProd)
                        {
                            while ($produto = $todosProd->fetch_assoc())
                            {
                                echo "<option value='".$produto["idProd"]."'>".$produto["prod"]."</option>";
                            }
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group text-right">
                <div class="col-sm-12">
                    <button class="btn btn-ativo">
                        <i class="glyphicon glyphicon-floppy-disk"></i>
                        Atualizar Destaque
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>