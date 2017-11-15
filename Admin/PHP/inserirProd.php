<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 11/11/2017
 * Time: 00:33
 */
include "../DB/dbProduto.php";
$id = $_POST["produto"];
$peso = $_POST["peso"];
$status = $_POST["status"];
$unidadeM = $_POST["medidas"];
if($id != "-1" && $peso != "" && $status != "" && $unidadeM != "")
{
    if (isset($_FILES['image-prod']['name']) && $_FILES['image-prod']['error'] == 0)
    {
        $caminho_tmp = $_FILES['image-prod']['tmp_name'];
        $nome = $_FILES['image-prod']['name'];
        include "../PHP/recebeUpload.php";
        try
        {
            $caminho = produtoUpload($nome,$caminho_tmp);
            produtoUpdate($id,$caminho[0],$caminho[1],$peso,$status,$unidadeM,"inserirido");

        }
        catch (Exception $e){
            echo 'ERRO: '. $e->getMessage();
        }

    }
    else
        echo 'Insira uma foto para o produto.';
       // echo "<script>alert('Insira uma foto para o produto.')</script>";
}
else
{
   echo 'Erro: Preencha todos os campos';
}