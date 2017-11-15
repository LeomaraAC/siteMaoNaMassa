<form method="post" action="../Arquivos/salvar.php?tab=<?php echo $tipo ?>"class="">
    <div class="col-sm-12">
        <div class="box-header borda">
            <h3 class="titulo"><?php echo $titulo?></h3>
        </div>
        <textarea name="edit" id="edit" required>
            <?php
            $conteudo = ler($tipo);
            echo $conteudo;
            ?>
        </textarea>
        <div class="form-group text-right">
            <div class="col-sm-12">
                <button class="btn btn-ativo" type="submit">
                    <i class="glyphicon glyphicon-floppy-disk"></i>
                    Atualizar Destaque
                </button>
            </div>
        </div>
    </div>
</form>