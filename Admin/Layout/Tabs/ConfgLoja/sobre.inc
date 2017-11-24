<form id="<?php echo $tipo ?>">
    <div class="col-sm-12">
        <div class="box-header borda">
            <h3 class="titulo"><?php echo $titulo?></h3>
        </div>
        <input class="hidden" type="text" name="tipo" id="tipo" value="<?php echo $tipo ?>">
        <textarea name="edit" id="edit" required>
            <?php
             lerInfo($tipo);
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