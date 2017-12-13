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
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM produto WHERE idProd = ?") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("i", $id) or die("Erro ao busca o produto");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado->fetch_assoc();
    } else
        echo 'Erro de conexão com o Banco de Dados';
}

function produtoByCategoria($idCategoria)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM produto WHERE idCategoria = ? AND visivel = 1 ORDER BY status,dataAtualizadoSite DESC ,descricao") or die("Erro ao preparar o comando MySQL");
        $stmt->bind_param("i", $idCategoria) or die("Erro ai buscar os produtos");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado->num_rows;
    } else
        echo "Erro ao conectar o Banco de Dados";
}
function produtoByCategoriaLimit($idCategoria, $pagina, $itens)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM produto WHERE idCategoria = ? AND visivel = 1 ORDER BY status,dataAtualizadoSite DESC ,descricao LIMIT ?, ?") or die("Erro ao preparar o comando MySQL");
        $stmt->bind_param("iii",$idCategoria,$pagina,$itens);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        if ($resultado->num_rows != 0) {
            return $resultado;
        } else
            return NULL;
    } else
        echo "Erro ao conectar o Banco de Dados";
}

function todosProdutos()
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM produto WHERE visivel = 1 ORDER BY status,dataAtualizadoSite DESC ,descricao") or die("Erro ao preparar o comando MySQL");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado->num_rows;
    } else
        echo "Erro ao conectar o Banco de Dados";
}

function todosProdutosLimit($pagina, $itens)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM produto WHERE visivel = 1 ORDER BY status,dataAtualizadoSite DESC ,descricao LIMIT ?, ?") or die("Erro ao preparar o comando MySQL");
        $stmt->bind_param("ii",$pagina,$itens);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        if ($resultado->num_rows != 0) {
            return $resultado;
        } else
            return NULL;
    } else
        echo "Erro ao conectar o Banco de Dados";
}
/*
function todosProdutosLimit()
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM produto WHERE visivel = 1 ORDER BY status,dataAtualizadoSite DESC ,descricao LIMIT 16") or die("Erro ao preparar o comando MySQL");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        if ($resultado->num_rows != 0) {
            return $resultado;
        } else
            return NULL;
    } else
        echo "Erro ao conectar o Banco de Dados";
}*/

function buscaPreco($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT precoVenda FROM produto WHERE idProd = ?") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("i", $id) or die("Erro ao busca o produto");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado->fetch_assoc();
    } else
        return NULL;
}
