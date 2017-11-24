<?php
require_once '../DB/dbMensagem.php';
if (!isset($_GET["id"]))
    header("Location: erro.php");
else
{
    $idMensagem = $_GET["id"];
    $linha = mensagemId($idMensagem);
}
?>
<link rel="stylesheet" href="../Bibliotecas/node_modules/sweetalert2/dist/sweetalert2.css">
<form id="envioMensagem">
    <div class="box box-primary">
        <div class="box-header borda">
            <h3 class="titulo">Nova Mensagem</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <input type="email" name="para" class="form-control" placeholder="Para:" value="<?php echo $linha["email"]?>" required>
            </div>
            <div class="form-group">
                <input type="text" name="assunto" class="form-control" placeholder="Assunto:" value="RE: <?php echo $linha["assunto"]?>" required>
            </div>
            <div class="form-group">
                <textarea name="mensagem" id="mensagem" class="form-control" style="height: 300px"></textarea>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i> Enviar</button>
            </div>
            <a class="btn btn-default" id="descartar">
                <i class="glyphicon glyphicon-remove"></i>Descartar
            </a>
        </div>
    </div>
</form>
<script src="../JS/envioMensagem.js"></script>
<script src="../Bibliotecas/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>