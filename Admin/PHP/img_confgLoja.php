<?php
include "../PHP/recebeUpload.php";
$uploadS = false;
$uploadF = false;
if ((isset($_FILES['image-sobre']['name']))&& $_FILES['image-sobre']['error'] == 0){
    $caminho_tmp = $_FILES['image-sobre']['tmp_name'];
    $nome = $_FILES['image-sobre']['name'];
    try{
        $uploadS = sobreUpload($nome,$caminho_tmp);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
if ((isset($_FILES['image-fabricacao']['name']))&& $_FILES['image-fabricacao']['error'] == 0){
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