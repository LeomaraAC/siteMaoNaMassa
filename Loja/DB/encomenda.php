<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 19/11/2017
 * Time: 14:02
 */
require_once '../../DB_Conexoes/conexao.php';
/*Encomendar*/
function gerarIdEncomenda()
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT numeroEncomenda FROM encomenda ORDER BY numeroEncomenda DESC LIMIT 1") or die("Erro ao preparar o MySQL.");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $linha = $resultado->fetch_assoc();

        if ($linha["numeroEncomenda"] == '')
            $idContato = 1;
        else
            $idContato = $linha["numeroEncomenda"] + 1;
        $stmt->close();
        $mysqli->close();
        return $idContato;
    } else
        echo "Erro ao conectar com o Banco de Dados";
}
function salvaEncomenda($numEncomenda,$idProd, $idCliente, $qtde)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("INSERT INTO encomenda(numeroEncomenda,idProd, idCliente, qtdeEncomendada,dataEncomenda, status) VALUES (?,?,?,?,NOW() ,'Pendente')") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("iiid",$numEncomenda, $idProd, $idCliente,$qtde) or die("Erro ao salvar a encomenda");
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    } else
        echo "Erro ao conectar com o Banco de Dados";
}

/*Contato*/
function salvaContato($cel, $tel, $email)
{
    $mysqli = conectar();
    if ($mysqli) {
        $id = gerarIdContato();
        $stmt = $mysqli->prepare("INSERT INTO contato(idContato, telefoneFixo, telefoneCelular, email) VALUES (?,?,?,?)") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("isss", $id,$tel,$cel,$email) or die("Erro ao salvar o contato");
        $stmt->execute();
        if ($stmt->affected_rows != 0)
            return $id;
        else
            return -1;
        $stmt->close();
        $mysqli->close();
    } else
        return -1;
}
function gerarIdContato(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT idContato FROM contato ORDER BY idContato DESC LIMIT 1") or die("Erro ao preparar o MySQL.");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $linha = $resultado->fetch_assoc();

        if ($linha["idContato"] == '')
            $idContato = 1;
        else
            $idContato = $linha["idContato"] + 1;
        $stmt->close();
        $mysqli->close();
        return $idContato;
    } else
        echo "Erro ao conectar com o Banco de Dados";
}
/*Cliente*/
function salvaCliente($idContato, $nome, $rg)
{
    $mysqli = conectar();
    if ($mysqli) {
        $id = gerarIdCliente();
        $stmt = $mysqli->prepare("INSERT INTO cliente(idCliente, nome, idContato) VALUES (?,?,?)") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("isi", $id,$nome,$idContato) or die("Erro ao salvar o cliente");
        $stmt->execute();
        if ($stmt->affected_rows != 0)
            return $id;
        else
            return -1;
        $stmt->close();
        $mysqli->close();
    } else
        return -1;
}
function gerarIdCliente(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT idCliente FROM cliente ORDER BY idCliente DESC  LIMIT 1") or die("Erro ao preparar o MySQL.");
        $stmt->execute()or die('Erro na execução do sql');
        $resultado = $stmt->get_result();
        $linha = $resultado->fetch_assoc();
        if ($linha["idCliente"] == '')
        {
            $idContato = 1;
        }
        else
            $idContato = $linha["idCliente"] + 1;
        $stmt->close();
        $mysqli->close();
        return $idContato;
    } else
        echo "Erro ao conectar com o Banco de Dados";
}
/*remover contato*/
function removeContato($id){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("DELETE FROM contato WHERE idContato = ?") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("i", $id) or die("Erro ao remover contato");
        $stmt->execute();
        if ($stmt->affected_rows != 0)
            return true;
        else
            return false;
    } else
        echo "Erro ao conectar com o Banco de Dados";
}
//Remover cliente;
function removeCliente($id){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("DELETE FROM cliente WHERE idCliente = ?") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("i", $id) or die("Erro ao remver o cliente");
        $stmt->execute();
        if ($stmt->affected_rows != 0)
            return true;
        else
            return false;
    } else
        echo "Erro ao conectar com o Banco de Dados";
}