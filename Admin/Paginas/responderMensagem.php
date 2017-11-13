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
<form method="post" action="../PHP/envioEmail.php">
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
            <a href="Mensagem.php" class="btn btn-default">
                <i class="glyphicon glyphicon-remove"></i>Descartar
            </a>
        </div>
    </div>
</form>