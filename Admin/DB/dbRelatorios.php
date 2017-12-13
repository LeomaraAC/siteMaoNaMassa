<?php
require_once '../../DB_Conexoes/conexao.php';

function relatorioEstoqueProd()
{
    //
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT produto.idProd, produto.descricao, produto.estoqueMin, IF((SUM(producao.qtde)) IS NULL,0,SUM(producao.qtde))as qtde, categoria.descricao as cat FROM produto LEFT OUTER JOIN producao ON producao.idProd = produto.idProd INNER JOIN categoria ON categoria.idCategoria = produto.idCategoria GROUP BY idProd ORDER BY produto.descricao") or die("Erro ao buscar o estoque");
        $stmt->execute() or die("Erro ao buscar o estoque");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    } else {
        return NULL;
    }
}

function relatorioEstoqueMP()
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT materiaPrima.idMateriaP, materiaPrima.descricao, materiaPrima.estoqueMin, IF((SUM(estoqueMateriaPrima.quantidade)) IS NULL,0,SUM(estoqueMateriaPrima.quantidade)) as qtde FROM materiaPrima LEFT OUTER JOIN estoqueMateriaPrima ON materiaPrima.idMateriaP = estoqueMateriaPrima.idMateriaP GROUP BY idMateriaP ORDER BY materiaPrima.descricao") or die("Erro ao buscar o estoque");
        $stmt->execute() or die("Erro ao buscar o estoque");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    } else {
        return NULL;
    }
}
function relatorioEntradaSaida(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT idOperacao, dataOperacao, IF(entradaSaida = 'Venda', 'VENDA','DEVOLUÇÃO') as tipo FROM saida_entrada") or die("Erro ao buscar o estoque");
        $stmt->execute() or die("Erro ao buscar o estoque");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    } else {
        return NULL;
    }
}
function produtos($id){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT idOperacao, produto.descricao, qtdeProdutos as qtde FROM movimentacao INNER JOIN producao ON movimentacao.idProducao = producao.idProducao INNER JOIN produto ON produto.idProd = producao.idProd WHERE idOperacao = ? ORDER BY idOperacao") or die("Erro ao buscar o estoque");
        $stmt->bind_param('i',$id);
        $stmt->execute() or die("Erro ao buscar o estoque");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    } else {
        return NULL;
    }
}