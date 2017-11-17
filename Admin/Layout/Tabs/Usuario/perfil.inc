<form id="formperfil">
    <div class="col-md-5 col-xs-12">
        <div class="white-box">
            <div id="foto" class="user-bg"><img class="img-perfil" width="100%" alt="user" src="../Imagens/user/Perfil.jpg">
                <div class="overlay-box">
                    <div class="user-content">
                        <img id="img-user" name="img-user" src="../Imagens/user/Perfil.jpg?<?php echo time() ?>" class=" img-circle img-perfil" alt="img">
                        <h4 class="text-white"><?php echo $_SESSION['user'] ?></h4>
                        <h5 class="text-white"><?php echo $_SESSION['email'] ?></h5>
                        <div class="trocar-foto">
                            <input type="file" id="image-perfil" name="image-perfil" onchange="readURL(this);"
                                   accept="image/*" class="form-control form-input Profile-input-file">
                            <i class="glyphicon glyphicon-camera camera"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-xs-12">
        <div class="white-box">
            <div class="form-group">
                <input id="id" name="id" type="text" class="form-control form-control-line hidden" readonly
                       value="<?php echo $_SESSION['id']?>">
            </div>
            <div class="form-group">
                <label class="col-md-12">Nome Completo</label>
                <div class="col-md-12">
                    <input id="nome" name="nome" type="text" class="form-control form-control-line" required
                           value="<?php echo $_SESSION['user'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-12">E-mail</label>
                <div class="col-md-12">
                    <input type="email" class="form-control form-control-line" name="email" id="email" required
                           value="<?php echo $_SESSION['email'] ?>">
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
        </div>
    </div>
</form>