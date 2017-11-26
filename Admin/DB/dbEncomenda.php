<?php
require_once './../../DB_Conexoes/conexao.php';
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $p = (isset($_POST['parametros']) && !empty($_POST['parametros'])) ? $_POST['parametros'] : NULL;
    switch ($action) {
        case 'recusarEncomenda' :
            recusarEncomenda($p);
            break;
        case 'aceitarEncomenda' :
            aceitarEncomenda($p);
            break;
        case 'excluirEncomenda' :
            excluirEncomenda($p);
            break;
        case 'restaurarEncomenda' :
            restaurarEncomenda($p);
            break;
        case 'finalizarEncomenda' :
            finalizarEncomenda($p);
            break;

    }
}
function buscaEncomendasPendentes(){
    $mysqli = conectar();
    if ($mysqli) {
        $select = 'SELECT DISTINCT encomenda.numeroEncomenda as id,cliente.nome as cliente, contato.telefoneFixo as tel, contato.telefoneCelular as cel, contato.email, encomenda.dataEncomenda as data FROM encomenda INNER JOIN cliente ON cliente.idCliente = encomenda.idCliente INNER JOIN contato ON cliente.idContato = contato.idContato WHERE encomenda.status = "Pendente"';
        $stmt = $mysqli->prepare($select) or die("Erro na preparação do SQL");
        $stmt->execute() or die("Erro na busca das encomendas");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    }
}
function buscaEncomendasPendentesLimit(){
    $mysqli = conectar();
    if ($mysqli) {
        $select = 'SELECT DISTINCT encomenda.numeroEncomenda as id,cliente.nome as cliente FROM encomenda INNER JOIN cliente ON cliente.idCliente = encomenda.idCliente INNER JOIN contato ON cliente.idContato = contato.idContato WHERE encomenda.status = "Pendente" ORDER BY `dataEncomenda` DESC LIMIT 3';
        $stmt = $mysqli->prepare($select) or die("Erro na preparação do SQL");
        $stmt->execute() or die("Erro na busca das encomendas");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    }
}
function buscaEncomendaByNumEncomenda($numEncomenda){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT produto.descricao, encomenda.qtdeEncomendada as qtde FROM encomenda INNER JOIN produto ON encomenda.idProd = produto.idProd WHERE encomenda.numeroEncomenda  = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("i",$numEncomenda);
        $stmt->execute() or die("Erro na busca das encomendas");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    }
}
function recusarEncomenda($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE encomenda SET status = 'Recusado' WHERE numeroEncomenda = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("i",$id);
        $stmt->execute() or die("Erro na busca das encomendas");
        if ($mysqli->affected_rows != 0) {
            echo "Encomenda rejeitada com sucesso!";
        } else {
            echo "Nenhuma encomenda rejeitada!";
        }
        $stmt->close();
        $mysqli->close();
    }
}
function aceitarEncomenda($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE encomenda SET status = 'Aceito' WHERE numeroEncomenda = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("i",$id);
        $stmt->execute() or die("Erro na busca das encomendas");
        if ($mysqli->affected_rows != 0) {
            echo "Encomenda aceita com sucesso!";
        } else {
            echo "Nenhuma encomenda aceita!";
        }
        $stmt->close();
        $mysqli->close();
    }
}
function restaurarEncomenda($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE encomenda SET status = 'Pendente' WHERE numeroEncomenda = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("i",$id);
        $stmt->execute() or die("Erro na busca das encomendas");
        if ($mysqli->affected_rows != 0) {
            echo "Encomenda restaurada com sucesso!";
        } else {
            echo "Nenhuma encomenda restaurada!";
        }
        $stmt->close();
        $mysqli->close();
    }
}
function buscaEncomendasRecusado(){
    $mysqli = conectar();
    if ($mysqli) {
        $select = 'SELECT DISTINCT encomenda.numeroEncomenda as id,cliente.nome as cliente, encomenda.dataEncomenda as data FROM encomenda INNER JOIN cliente ON cliente.idCliente = encomenda.idCliente INNER JOIN contato ON cliente.idContato = contato.idContato WHERE encomenda.status = "Recusado"';
        $stmt = $mysqli->prepare($select) or die("Erro na preparação do SQL");
        $stmt->execute() or die("Erro na busca das encomendas");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    }
}
function excluirEncomenda($id){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("DELETE FROM encomenda WHERE numeroEncomenda = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("i",$id);
        $stmt->execute() or die("Erro na busca das encomendas");
        if ($mysqli->affected_rows != 0) {
            echo "Encomenda excluida com sucesso!";
        } else {
            echo "Nenhuma encomenda excluida!";
        }
        $stmt->close();
        $mysqli->close();
    }
}
function buscaEncomendasAtivas()
{
    $mysqli = conectar();
    if ($mysqli) {
        $select = 'SELECT DISTINCT encomenda.numeroEncomenda as id,cliente.nome as cliente, encomenda.dataEncomenda,encomenda.dataEntregaPrev FROM encomenda INNER JOIN cliente ON cliente.idCliente = encomenda.idCliente INNER JOIN contato ON cliente.idContato = contato.idContato WHERE encomenda.status = "Aceito"';
        $stmt = $mysqli->prepare($select) or die("Erro na preparação do SQL");
        $stmt->execute() or die("Erro na busca das encomendas");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    }
}
function finalizarEncomenda($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE encomenda SET status = 'Finalizada', dataFinalEntega = NOW() WHERE numeroEncomenda = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("i",$id);
        $stmt->execute() or die("Erro na busca das encomendas");
        if ($mysqli->affected_rows != 0) {
            echo "Encomenda finalizada com sucesso!";
        } else {
            echo "Nenhuma encomenda finalizada!";
        }
        $stmt->close();
        $mysqli->close();
    }
}
function buscaEncomendasFinalizadas()
{
    $mysqli = conectar();
    if ($mysqli) {
        $select = 'SELECT DISTINCT encomenda.numeroEncomenda as id,cliente.nome as cliente, encomenda.dataEncomenda,encomenda.dataFinalEntega as dataF FROM encomenda INNER JOIN cliente ON cliente.idCliente = encomenda.idCliente INNER JOIN contato ON cliente.idContato = contato.idContato WHERE encomenda.status = "Finalizada"';
        $stmt = $mysqli->prepare($select) or die("Erro na preparação do SQL");
        $stmt->execute() or die("Erro na busca das encomendas");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado;
    }
}
function buscaTodasEncomendasById($id){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT DISTINCT encomenda.idCliente, encomenda.dataEntregaPrev,encomenda.dataFinalEntega, encomenda.Observacao,cliente.nome as cliente, cliente.idEndereco , contato.telefoneFixo as tel, contato.telefoneCelular as cel, contato.email, encomenda.dataEncomenda FROM encomenda INNER JOIN cliente ON cliente.idCliente = encomenda.idCliente INNER JOIN contato ON cliente.idContato = contato.idContato WHERE encomenda.numeroEncomenda = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("i",$id);
        $stmt->execute() or die("Erro na busca das encomendas");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado->fetch_assoc();
    }
}
function editarEncomenda($dataPrev, $obs, $numEnc){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE encomenda SET dataEntregaPrev = ?, Observacao = ?  WHERE numeroEncomenda = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("ssi",$dataPrev,$obs,$numEnc);
        $stmt->execute() or die("Erro na edição da encomenda");
        if ($mysqli->affected_rows != 0) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
        $mysqli->close();
    }
}