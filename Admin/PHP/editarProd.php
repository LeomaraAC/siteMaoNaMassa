<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 13/11/2017
 * Time: 16:30
 */
include "../DB/dbProduto.php";
$id = $_POST["idProduto"];
$peso = $_POST["pesoEdit"];
$status = $_POST["statusEdit"];
$unidadeM = $_POST["medidasEdit"];
if ($id != "-1" && $peso != "" && $status != "" && $unidadeM != "") {
    if ((isset($_FILES['image-prod']['name']))&& $_FILES['image-prod']['error'] == 0) {
        $caminho_tmp = $_FILES['image-prod']['tmp_name'];
        $nome = $_FILES['image-prod']['name'];
        include "../PHP/recebeUpload.php";
        try {
            $caminho = produtoUpload($nome, $caminho_tmp);
            //Update do produto quando a imagem foi trocada
            produtoUpdate($id,$caminho[0],$caminho[1],$peso,$status,$unidadeM, "editado");
        } catch (Exception $e) {
            echo 'ERRO: ' . $e->getMessage();
        }
    } else {
        //Update do produto quando a imagem não foi trocada
        produtoUpdate($id,false,false,$peso,$status,$unidadeM, "editado");
    }
} else {
    echo 'Erro: Preencha todos os campos';
}