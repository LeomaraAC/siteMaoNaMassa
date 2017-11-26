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
            encomendasMensalFiltro($p[0],$p[1]);
            break;
    }
}

function producaoMensal(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT date_format(dataFabricacao, '%m/%Y') AS mes, SUM(qtde) as qtde FROM producao GROUP BY mes ORDER BY extract(year FROM dataFabricacao) , extract(month FROM dataFabricacao)") or die("Erro na busca produção mensal");
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
        $stmt = $mysqli->prepare("SELECT date_format(dataFabricacao, '%m/%Y') AS mes, SUM(qtde) as qtde FROM producao WHERE date_format(dataFabricacao, '%Y-%m') BETWEEN ? AND ? GROUP BY mes ORDER BY extract(year FROM dataFabricacao) , extract(month FROM dataFabricacao)") or die("Erro na busca produção mensal");
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
        $stmt = $mysqli->prepare("SELECT date_format(dataFinalEntega, '%m/%Y') AS mes, SUM(qtdeEncomendada) as qtde FROM encomenda WHERE status = 'Finalizada' GROUP BY mes ORDER BY extract(year FROM dataFinalEntega) , extract(month FROM dataFinalEntega)") or die("Erro na busca produção mensal");
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
        $stmt = $mysqli->prepare("SELECT date_format(dataFinalEntega, '%m/%Y') AS mes, SUM(qtdeEncomendada) as qtde FROM encomenda WHERE status = 'Aceito' GROUP BY mes ORDER BY extract(year FROM dataFinalEntega) , extract(month FROM dataFinalEntega)") or die("Erro na busca produção mensal");
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
function encomendasMensalFiltro($de, $ate){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT date_format(dataFinalEntega, '%m/%Y') AS mes, SUM(qtdeEncomendada) as qtde FROM encomenda WHERE status = 'Finalizada' AND date_format(dataFinalEntega, '%Y-%m') BETWEEN ? AND ? GROUP BY mes ORDER BY extract(year FROM dataFinalEntega) , extract(month FROM dataFinalEntega)") or die("Erro na busca produção mensal");
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