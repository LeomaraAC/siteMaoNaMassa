<?php
require_once '../../DB_Conexoes/conexao.php';
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $p = (isset($_POST['parametros']) && !empty($_POST['parametros'])) ? $_POST['parametros'] : NULL;
    switch ($action) {
        case 'producaoMensalFiltro' :
            producaoMensalFiltro($p[0],$p[1]);
            break;
        case 'producaoMensal' :
            producaoMensal();
            break;
        case 'encomendasMensal' :
            encomendasMensal();
            break;
        case 'encomendasMensalAtivas' :
            encomendasMensalAtivas();
            break;
        case 'encomendasMensalFiltro' :
            encomendasMensalFiltro($p[0],$p[1],$p[2]);
            break;
        case 'entradaSaida' :
            if ($p[0] == 'normal')
                entradaSaida($p[1]);
            else
                entradaSaidaFIltro($p[1],$p[2],$p[3]);
            break;
        case 'receita' :
            receita();
            break;
        case 'despesas' :
            despesas();
            break;
        case 'receitaFiltro' :
            receitaFiltro($p[0],$p[1]);
            break;
        case 'despesasFiltro' :
            despesasFiltro($p[0],$p[1]);
            break;
    }
}

function producaoMensal(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT date_format(dataFabricacao, '%m/%Y') AS mes, SUM(qtde) as qtde, extract(year FROM dataFabricacao) as ano, extract(month FROM dataFabricacao) as mesGB FROM historicoProducao GROUP BY mes,ano , mesGB ORDER BY ano , mesGB") or die("Erro na busca produção mensal");
        $stmt->execute() or die("Erro na atualização do cliente");
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}

function producaoMensalFiltro($de, $ate){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT date_format(dataFabricacao, '%m/%Y') AS mes, SUM(qtde) as qtde, extract(year FROM dataFabricacao) as ano , extract(month FROM dataFabricacao) as mesGB FROM historicoProducao WHERE date_format(dataFabricacao, '%Y-%m') BETWEEN ? AND ? GROUP BY mes,ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca produção mensal");
        $stmt->bind_param("ss",$de, $ate);
        $stmt->execute() or die("Erro na atualização do cliente");
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}

function encomendasMensal(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT date_format(dataFinalEntrega, '%m/%Y') AS mes, SUM(qtdeEncomendada) as qtde, extract(year FROM dataFinalEntrega) as ano , extract(month FROM dataFinalEntrega) as mesGB FROM encomenda WHERE status = 'Finalizada' GROUP BY mes, ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca produção mensal");
        $stmt->execute() or die("Erro na atualização do cliente");
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}
function encomendasMensalAtivas(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT date_format(dataEncomenda, '%m/%Y') AS mes, SUM(qtdeEncomendada) as qtde,extract(year FROM dataEncomenda) as ano , extract(month FROM dataEncomenda) as mesGB FROM encomenda WHERE status = 'Aceito' GROUP BY mes,ano , mesGB ORDER BY ano , mesGB") or die("Erro na busca produção mensal");
        $stmt->execute() or die("Erro na atualização do cliente");
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}
function encomendasMensalFiltro($status,$de, $ate){
    $mysqli = conectar();
    if ($mysqli) {
        if ($status == 'Aceito')
            $stmt = $mysqli->prepare("SELECT date_format(dataEncomenda, '%m/%Y') AS mes, SUM(qtdeEncomendada) as qtde,extract(year FROM dataEncomenda) as ano , extract(month FROM dataEncomenda) as mesGB FROM encomenda WHERE status = ? AND date_format(dataEncomenda, '%Y-%m') BETWEEN ? AND ? GROUP BY mes,ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca produção mensal");
        else
            $stmt = $mysqli->prepare("SELECT date_format(dataFinalEntrega, '%m/%Y') AS mes, SUM(qtdeEncomendada) as qtde,extract(year FROM dataFinalEntrega) as ano , extract(month FROM dataFinalEntrega) as mesGB FROM encomenda WHERE status = ? AND date_format(dataFinalEntrega, '%Y-%m') BETWEEN ? AND ? GROUP BY mes,ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca produção mensal");
        $stmt->bind_param("sss",$status,$de, $ate);
        $stmt->execute() or die("Erro na atualização do cliente");
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}


function encomendasPopulares(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT produto.descricao,SUM(qtdeEncomendada) as qtde FROM encomenda INNER JOIN produto ON produto.idProd = encomenda.idProd WHERE encomenda.status = 'Aceito' OR encomenda.status = 'Finalizada' GROUP BY encomenda.idProd ORDER BY qtde DESC LIMIT 5") or die("Erro na busca produção mensal");
        $stmt->execute() or die("Erro na atualização do cliente");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    }
}
function entradaSaida($tipo){
    $mysqli = conectar();
    if ($mysqli){
        $stmt = $mysqli->prepare("SELECT date_format(dataOperacao, '%m/%Y') AS mes, SUM(movimentacao.qtdeProdutos) AS qtde, extract(year FROM dataOperacao) as ano , extract(month FROM dataOperacao) as mesGB FROM saida_entrada INNER JOIN movimentacao ON saida_entrada.idOperacao = movimentacao.idOperacao WHERE saida_entrada.entradaSaida = ? GROUP BY mes,ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca das entradas e saidas");
        $stmt->bind_param('s',$tipo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}
function entradaSaidaFIltro($tipo,$de, $ate){
    $mysqli = conectar();
    if ($mysqli){
        $stmt = $mysqli->prepare("SELECT date_format(dataOperacao, '%m/%Y') AS mes, SUM(movimentacao.qtdeProdutos) AS qtde, extract(year FROM dataOperacao) as ano , extract(month FROM dataOperacao) as mesGB FROM saida_entrada INNER JOIN movimentacao ON saida_entrada.idOperacao = movimentacao.idOperacao WHERE saida_entrada.entradaSaida = ? AND date_format(dataOperacao, '%Y-%m') BETWEEN ? AND ? GROUP BY mes,ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca das entradas e saidas");
        $stmt->bind_param('sss',$tipo,$de,$ate);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}
function despesas(){
    $mysqli = conectar();
    if ($mysqli){
        $stmt = $mysqli->prepare("SELECT date_format(historicoEstoqueMP.dataCompra, '%m/%Y')as data, SUM((historicoEstoqueMP.quantidade / materiaprima.peso) * materiaprima.precoUnitario) as preco, extract(year FROM historicoEstoqueMP.dataCompra) as ano , extract(month FROM historicoEstoqueMP.dataCompra) as mesGB FROM materiaprima INNER JOIN historicoEstoqueMP on historicoEstoqueMP.idMateriaP = materiaprima.idMateriaP GROUP BY format(historicoEstoqueMP.dataCompra, '%m/%Y'), ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca as despesas");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}
function receita(){
    $mysqli = conectar();
    if ($mysqli){
        $stmt = $mysqli->prepare("SELECT Date_format(dataoperacao, '%m/%Y')AS data,TRUNCATE(Sum( case when (saida_entrada.entradaSaida = 'Devolução') THEN movimentacao.precovenda * movimentacao.qtdeProdutos * -1 else movimentacao.precovenda * movimentacao.qtdeprodutos end ),2) AS preco, extract(year FROM dataoperacao) as ano , extract(month FROM dataoperacao) as mesGB FROM saida_entrada INNER JOIN movimentacao ON saida_entrada.idoperacao = movimentacao.idoperacao GROUP BY Date_format(dataoperacao, '%m/%Y'), ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca as despesas");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}
function despesasFiltro($de, $ate){
    $mysqli = conectar();
    if ($mysqli){
        $stmt = $mysqli->prepare("SELECT date_format(historicoEstoqueMP.dataCompra, '%m/%Y')as data, SUM((historicoEstoqueMP.quantidade / materiaprima.peso) * materiaprima.precoUnitario) as preco, extract(year FROM historicoEstoqueMP.dataCompra) as ano , extract(month FROM historicoEstoqueMP.dataCompra) as mesGB FROM materiaprima INNER JOIN historicoEstoqueMP on historicoEstoqueMP.idMateriaP = materiaprima.idMateriaP WHERE date_format(historicoEstoqueMP.dataCompra, '%Y-%m') BETWEEN ? AND ? GROUP BY format(historicoEstoqueMP.dataCompra, '%m/%Y'), ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca as despesas");
        $stmt->bind_param("ss",$de, $ate);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}
function receitaFiltro($de, $ate){
    $mysqli = conectar();
    if ($mysqli){
        $stmt = $mysqli->prepare("SELECT Date_format(dataoperacao, '%m/%Y')AS data,TRUNCATE(Sum( case when (saida_entrada.entradaSaida = 'Devolução') THEN movimentacao.precovenda * movimentacao.qtdeProdutos * -1 else movimentacao.precovenda * movimentacao.qtdeprodutos end ),2) AS preco, extract(year FROM dataoperacao) as ano , extract(month FROM dataoperacao) as mesGB FROM saida_entrada INNER JOIN movimentacao ON saida_entrada.idoperacao = movimentacao.idoperacao WHERE date_format(dataOperacao, '%Y-%m') BETWEEN ? AND ?  GROUP BY Date_format(dataoperacao, '%m/%Y'), ano, mesGB ORDER BY ano, mesGB") or die("Erro na busca as despesas");
         $stmt->bind_param("ss",$de, $ate);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $cont = 0;
        while ($linha = $resultado->fetch_assoc()) {
            $vetor[] =  $linha;
            $cont++;
        }
        $stmt->close();
        $mysqli->close();
        if ($cont == 0)
        {
            $vetor[0] = "ERRO";
        }
        echo json_encode($vetor);
    }
}