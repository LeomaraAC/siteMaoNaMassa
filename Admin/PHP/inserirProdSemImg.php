<?php
include "../DB/dbProduto.php";
$id = $_POST["produto"];
$peso = $_POST["peso"];
$status = $_POST["status"];
$unidadeM = $_POST["medidas"];
if($id != "-1" && $peso != "" && $status != "" && $unidadeM != "")
{

    produtoUpdate($id,false,false,$peso,$status,$unidadeM,"inserirido");
    echo "OK";
}
else
{
    echo 'Erro: Preencha todos os campos!';
}