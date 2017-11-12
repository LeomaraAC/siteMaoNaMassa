<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 10/11/2017
 * Time: 18:23
 */
require_once '../../DB_Conexoes/conexao.php';
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $p = (isset($_POST['parametros']) && !empty($_POST['parametros'])) ? $_POST['parametros'] : NULL;
    switch ($action) {
        case 'produtoID' :
            produtoID($p);
            break;
    }
}

function todosProdutos()
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM produto WHERE visivel = 0 ORDER BY idProd;") or die("Erro ao buscar os produtos");
        $stmt->execute() or die("Erro ao buscar os produtos");
        $resultado = $stmt->get_result();
        $stmt->close();
        return $resultado;
    } else {
        return NULL;
    }
}

function produtoID($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT produto.precoVenda,produto.peso,categoria.descricao as cat FROM categoria INNER JOIN produto on categoria.idCategoria = produto.idCategoria WHERE produto.idProd = ?") or die("Erro ao buscar os produtos");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die("Erro ao buscar os produtos");
        /*while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado);
    }    */
        $resultado = $stmt->get_result();
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] = array_map('utf8_encode', $linha);
        }
        $stmt->close();
        echo json_encode($vetor);
    } else {
        return NULL;
    }
}
function produtoUpdate($id, $url, $peso, $status,$unidadeM )
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE produto SET urlImagem = ?, peso = ?, Status = ?, unidadeMedida = ?, visivel = 1 WHERE idProd = ?") or die("Erro ao buscar os produtos");
        $stmt->bind_param("sdssi", $url,$peso,$status,$unidadeM,$id);
        $stmt->execute() or die("Erro ao buscar os produtos");
        if($mysqli->affected_rows != 0)
        {
            echo "Produto inserido na loja com sucesso";
        }
        else
        {
            echo "Nenhum produto inserido na loja.";
        }
    }
}