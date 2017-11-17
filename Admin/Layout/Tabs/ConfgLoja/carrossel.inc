<form id="carrossel">
    <div class="col-sm-12">
        <div class="row edit-carrossel">
            <h3 class="titulo">Editar Carrossel</h3>
        </div>

        <?php
        $cont = 0;
        while ($cont < 3) {
            $id = 'img' . $cont;
            $prod = 'produto' . $cont;
            echo '<div class="row">';
            echo '<div class="box-header borda">';
            switch ($cont) {
                case 0:
                    echo '<p><b>Primeiro produto do carrossel</b></p>';
                    break;
                case 1:
                    echo '<p><b>Segundo produto do carrossel</b></p>';
                    break;
                case 2:
                    echo '<p><b>Terceiro produto do carrossel</b></p>';
                    break;
            }
            echo '<div class="col-sm-5 col-xs-12">';
            echo '<div class="img-Destaque">';
            echo '<img id="' . $id . '" class="img-responsive" width="100%" alt="user" src="../Imagens/produtos/padrao.png" >';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-sm-7 col-xs-12">';
            echo '<div class="form-group">';
            echo '<label for="text" class="col-md-12">Produto</label>';
            echo '<div class="col-md-12">';
            echo "<select class='form-control' name='$prod' id='$prod' onchange='carragarProd($prod.value,\"carrossel\",$cont)'>";
            echo '<option value="">Selecione...</option>';
            $todosProd = todosProdutosVisiveis(true);
            if ($todosProd) {
                while ($produto = $todosProd->fetch_assoc()) {
                    echo "<option value='" . $produto["idProd"] . "'>" . $produto["prod"] . "</option>";
                }
            }
            echo '</select>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $cont++;
        }
        ?>
        <div class="form-group text-right">
            <div class="col-sm-12">
                <button class="btn btn-ativo">
                    <i class="glyphicon glyphicon-floppy-disk"></i>
                    Atualizar Destaque
                </button>
            </div>
        </div>
    </div>
</form>