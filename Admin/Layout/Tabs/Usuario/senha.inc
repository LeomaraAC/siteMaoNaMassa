<form id="formTrocaSenha">

    <div class="form-group">
        <label class="col-md-12">Senha Antiga</label>
        <div class="col-md-12">
            <input data-id="<?php echo $_SESSION['id']?>" type="password" value="" class="form-control form-control-line" id="senhaAntiga" name="senhaAntiga"
                   required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-12">Senha</label>
        <div class="col-md-12">
            <input type="password" value="" class="form-control form-control-line" id="senhaNova" name="senhaNova"
                   required maxlength="50">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Confirma senha</label>
        <div class="col-md-12">
            <input type="password" value="" class="form-control form-control-line" id="confirmaSenha"
                   name="confirmaSenha" required maxlength="50">
        </div>
    </div>
    <div class="form-group text-right">
        <div class="col-sm-12">
            <button class="btn btn-ativo">
                <i class="glyphicon glyphicon-floppy-disk"></i>
                Atualizar Perfil
            </button>
        </div>
    </div>
</form>