<form id="atualizaImg">
    <div class="col-sm-12">
        <div class="box-header borda col-sm-12">
            <h1><small>Editar imagens</small></h1>
        </div>
        <div class="col-md-6 col-xs-12">
            <h2 class="text-center"><small>'Quem Somos' e...</small></h2>

            <div class="white-box">
                <div id="foto" class="user-bg">
                    <img id="img-produto" class="img-Sobre" width="100%" src="../../Loja/Imagens/Configuracoes/equipe.png">
                    <div class="trocar-foto-prod">
                        <input type="file" id="image-sobre" name="image-sobre" onchange="readURL(this, '.img-Sobre');" accept="image/*" class="form-control form-input Profile-input-file" >
                        <i class="glyphicon glyphicon-camera"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <h2 class="text-center"><small>'Como São Feitos'</small></h2>
            <div class="white-box">
                <div id="foto" class="user-bg">
                    <img id="img-produto" class="img-Fabricacao" width="100%" src="../../Loja/Imagens/Configuracoes/fabricacao.jpg">
                    <div class="trocar-foto-prod">
                        <input type="file" id="image-fabricacao" name="image-fabricacao" onchange="readURL(this,'.img-Fabricacao');" accept="image/*" class="form-control form-input Profile-input-file" >
                        <i class="glyphicon glyphicon-camera"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <div class="col-sm-12">
                <button class="btn btn-ativo">
                    <i class="glyphicon glyphicon-floppy-disk"></i>
                    Atualizar Imagens
                </button>
            </div>
        </div>
    </div>
</form>