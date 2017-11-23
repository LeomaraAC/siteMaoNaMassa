<?php
include "../DB/dbEncomenda.php";
include "../DB/dbEndereco.php";
include "../DB/dbCliente.php";

$numEnc = $_POST["numEnc"];
$dataP = $_POST["dataPrev"];
$obs = $_POST["observacoes"];
$idEndereco = $_POST["idEnd"];
$rua = $_POST["rua"];
$num = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$idCli = $_POST["id"];
$retornoCli = false;
$retornoEnc = false;
$msg = "";
/*Inserir ou alterar o endereço*/
if ($dataP != "") {
    /*Salvar a encomenda*/
    $obs = trim($obs);
    $retornoEnc = editarEncomenda($dataP, $obs, $numEnc);

    /*Salvar o endereço*/
    if ($idEndereco != "") {
        $retornoCli = atualizarEndereco($rua, $num, $bairro, $cidade, $idEndereco);
    } else {
        if ($bairro != "" || $num != "" || $cidade != "" || $rua != "") {
            if ($bairro != "" && $num != "" && $cidade != "" && $rua != "") {
                $idEndereco = inserirEndereco($rua, $num, $bairro, $cidade);
                //Inserir na tabela do cliente
                if ($idEndereco != -1) {
                    $retornoCli = inserirEnderecoCliente($idEndereco, $idCli);
                } else
                    $retornoCli = false;
            } else
                $msg = "Não foi possível inserir o endereço. Por favor preencha todos os campos referente ao endereço.";
        }
    }
    /*If para retorno*/
    if ($retornoCli || $retornoEnc)
        echo "Alterações realizadas com sucesso!";
    else {
        if($msg != "")
            echo $msg;
        else
            echo "Nenhuma alteração realizada!";
    }
} else {
    echo 'Erro: É obrigatório o preenchimento da data prevista para a entrega';
}
