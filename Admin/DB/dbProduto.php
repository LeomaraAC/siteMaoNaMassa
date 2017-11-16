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
        case 'removeProduto':
            produtoRemover($p);
            break;
    }
}

function todosProdutosInvisiveis()
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

function todosProdutosVisiveis($disponivel)
{
    $mysqli = conectar();
    if ($mysqli) {
        if ($disponivel) {
            $stmt = $mysqli->prepare("SELECT produto.idProd, categoria.descricao as cat, produto.descricao as prod, produto.idProd FROM produto INNER JOIN categoria on categoria.idCategoria = produto.idCategoria WHERE visivel = 1 AND  Status = 'Disponível' ORDER BY idProd;") or die("Erro ao buscar os produtos");
            $stmt->execute() or die("Erro ao buscar os produtos");
        } else {
            $stmt = $mysqli->prepare("SELECT produto.idProd, categoria.descricao as cat, produto.descricao as prod, produto.idProd FROM produto INNER JOIN categoria on categoria.idCategoria = produto.idCategoria WHERE visivel = 1 ORDER BY idProd;") or die("Erro ao buscar os produtos");
            $stmt->execute() or die("Erro ao buscar os produtos");
        }

        $resultado = $stmt->get_result();
        $stmt->close();
        return $resultado;
    } else {
        return NULL;
    }
}

function produtoID($id) //Busca por ID com o retorno no formato json
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT produto.Status,produto.unidadeMedida as unidade,produto.idProd, produto.urlImagem as url, produto.precoVenda,produto.peso,categoria.descricao as cat FROM categoria INNER JOIN produto on categoria.idCategoria = produto.idCategoria WHERE produto.idProd = ?") or die("Erro ao buscar os produtos");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die("Erro ao buscar os produtos");
        $resultado = $stmt->get_result();
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
        }
        $stmt->close();
        echo json_encode($vetor);
    } else {
        return NULL;
    }
}

function produtoEditID($id) // Busca por id com o retorno "normal"
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT produto.Status,produto.unidadeMedida as unidade,produto.descricao as prod, produto.precoVenda,produto.peso, produto.urlImagem as url,categoria.descricao as cat FROM categoria INNER JOIN produto on categoria.idCategoria = produto.idCategoria WHERE produto.idProd = ?") or die("Erro ao buscar os produtos");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die("Erro ao buscar os produtos");
        $resultado = $stmt->get_result();
        $stmt->close();
        return $resultado->fetch_assoc();
    } else {
        return NULL;
    }
}

function produtoUpdate($id, $url, $urlLoja, $peso, $status, $unidadeM, $action)
{
    $mysqli = conectar();
    if ($mysqli) {
        /*$url é false quando o caminho da imagem não será alterado*/
        if ($url != false) {
            $stmt = $mysqli->prepare("UPDATE produto SET urlImagem = ?,urlImgLoja = ?, peso = ?, Status = ?, unidadeMedida = ?, visivel = 1, dataAtualizadoSite = NOW() WHERE idProd = ?") or die("Erro ao buscar os produtos");
            $stmt->bind_param("ssdssi", $url, $urlLoja, $peso, $status, $unidadeM, $id);
        } else {
            $stmt = $mysqli->prepare("UPDATE produto SET peso = ?, Status = ?, unidadeMedida = ?, visivel = 1, dataAtualizadoSite = NOW() WHERE idProd = ?") or die("Erro ao buscar os produtos");
            $stmt->bind_param("dssi", $peso, $status, $unidadeM, $id);
        }

        $stmt->execute() or die("Erro ao buscar os produtos");
        if (($mysqli->affected_rows != 0)) {
            if ($action != "inserirido")
                echo "Produto editado com sucesso";
        } else {
            echo "Nenhum produto " . $action . ".";
        }
        $stmt->close();
    }
}

function produtoRemover($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE produto SET visivel = 0 WHERE idProd = ?") or die("Erro na exclusão");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die("Erro na exclusão");
        if ($mysqli->affected_rows != 0) {
            echo "Produto removido da loja com sucesso";
        } else {
            echo "Nenhum produto removido da loja";
        }
        $stmt->close();
    }
}