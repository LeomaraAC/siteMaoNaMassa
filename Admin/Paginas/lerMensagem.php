<?php
require_once '../DB/dbMensagem.php';
if(!isset($_GET["id"]))
    header("Location: erro.php");
else
{
    $idMensagem = $_GET["id"];
    $linha = mensagemId($idMensagem);
}
?>
<div class="box box-primary">
    <div class="box-header borda">
        <h3 class="titulo">Ler e-mail</h3>
    </div>
    <div class="box-body no-padding">
        <div class="mailbox-read-info">
            <h3><?php echo $linha["assunto"]?></h3>
            <h5><?php echo $linha["nome"];
                if($linha["email"] != "")
                {
                    echo "<\"". $linha["email"] ."\">";
                }
                ?>
                <span class="data-mensagem pull-right"><?php echo $linha["dataEnvio"]?></span></h5>
        </div>
        <div class="padding-email borda text-center">
            <div class="btn-group">
                <?php
                if ($linha["status"] != "Lixeira")
                {
                    echo '<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Deletar e-mail" onclick="deletarMensagem()">';
                    echo '<i class="glyphicon glyphicon-trash"></i>';
                    echo '</button>';
                    if($linha["email"] != "")
                    {
                        echo "<a onclick='responderM()' data-toggle=\"tab\" href='#responder'  class=\"btn btn-default btn-sm\" data-toggle=\"tooltip\" data-container=\"body\" title=\"Responder e-mail\" >";
                        echo '<i class="fa fa-mail-reply"></i>';
                        echo '</a>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="mailbox-read-message">
            <p id="idMensagemLida" class="hidden"><?php echo $idMensagem?></p>
            <?php echo $linha["mensagem"];
            if($linha["telefone"] != "")
            {
                echo "<p>Telefone: ".$linha["telefone"]."</p>";
            }
            ?>

        </div>
    </div>
</div>