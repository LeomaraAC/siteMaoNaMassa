<div class="box box-primary">
    <div class="box-header borda">
        <h3 class="titulo">Entadas</h3>
    </div>
    <div class="box-body no-padding">
        <div class="padding-email">
            <button type="button" class="btn btn-default btn-sm todos" data-toggle="tooltip" title="Marcar todos"><i class="glyphicon glyphicon-unchecked"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deletar" onclick="deletar()"><i class="glyphicon glyphicon-trash"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Recarregar" onclick="atualizar()"><i class="glyphicon glyphicon-refresh"></i></button>
        </div>
        <div class="table-responsive">
            <table id="tabela-entrada" class="table table-hover table-striped" align="left">
                <tbody>
                <?php
                require_once '../DB/dbMensagem.php';
                $resultado = todasMensagem();
                if ($resultado) {
                    while ($linha = $resultado->fetch_assoc()) { //
                        echo '<tr>';
                        echo "<td style='display: none' data-id = '".$linha["idMensagem"]."'>".$linha["idMensagem"]."</td>";
                        echo '<td class="tamanhoTd"><input type="checkbox" id="mensagem"></td>';
                        echo "<td class=\"nome\"><a data-toggle=\"tab\" href='#ler' class='ler'>" . ucfirst($linha["nome"]) . "</a></td>";
                        echo "<td class=\"mensagem\"><a data-toggle=\"tab\" href='#ler' class='ler'>" . $linha["assunto"] . "<span class=\"data-mensagem\"> -" . substr($linha["mensagem"], 0, 25) . "...</span></a>";
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>