<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 13/11/2017
 * Time: 22:16
 */
require_once '../../DB_Conexoes/conexao.php';
function produtoById($id)
{
    $mysqli = conectar();
    if($mysqli)
    {
        $stmt = $mysqli->prepare("SELECT * FROM produto WHERE idProd = ?") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("i", $id)or die("Erro ao busca o produto");
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
    else
        echo 'Erro de conexão com o Banco de Dados';
}