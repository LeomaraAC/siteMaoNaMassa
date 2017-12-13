<?php
include "../PHP/recebeUpload.php";
$uploadS = false;
$uploadF = false;
$entraS = verificaErro($_FILES['image-sobre']['error']);
$entraF = verificaErro($_FILES['image-fabricacao']['error']);
function verificaErro($erro)
{
    $r = false;
    switch ($erro){
        case 1:
            echo 'Tamanho acima do permitido';
            break;
        case 2:
            echo 'Tamanho acima do permitido';
            break;
        case 3:
            echo 'O upload do arquivo foi feito parcialmente';
            break;
        case 6:
            echo 'Pasta temporária ausênte';
            break;
        case 7:
            echo 'Falha em escrever o arquivo em disco';
            break;
        default:
            $r = true;
            break;
    }
    return $r;
}
if ((isset($_FILES['image-sobre']['name']))&& $_FILES['image-sobre']['error'] == 0 && $entraS == true){
    $caminho_tmp = $_FILES['image-sobre']['tmp_name'];
    $nome = $_FILES['image-sobre']['name'];
    try{
        $uploadS = sobreUpload($nome,$caminho_tmp);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
if ((isset($_FILES['image-fabricacao']['name']))&& $_FILES['image-fabricacao']['error'] == 0 && $entraF == true){
    $caminho_tmp = $_FILES['image-fabricacao']['tmp_name'];
    $nome = $_FILES['image-fabricacao']['name'];
    try{
        $uploadF = fabricacaoUpload($nome,$caminho_tmp);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
if ($uploadF || $uploadS)
{
    echo "OK";
}