<?php
require_once '../../DB_Conexoes/conexao.php';

function buscaEndereco($idEndereco){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT rua,bairro, cidade, numero FROM endereco WHERE idEndereco = ?") or die("Erro na preparação do SQL");
        $stmt->bind_param("i",$idEndereco);
        $stmt->execute() or die("Erro na busca do endereço");
        $resultado = $stmt->get_result();
        $stmt->close();
        $mysqli->close();
        return $resultado->fetch_assoc();
    }
}
function inserirEndereco($rua,$numero,$bairro,$cidade){
    //retorna ID
    $mysqli = conectar();
    if ($mysqli) {
        $id = gerarId();
        $stmt = $mysqli->prepare("INSERT INTO endereco(idEndereco, rua, bairro,cidade, numero) VALUES (?,?,?,?,?)") or die("Erro ao preparar o MySQL.");
        $stmt->bind_param("isssi", $id,$rua,$numero,$bairro,$cidade) or die("Erro ao salvar o cliente");
        $stmt->execute();
        if ($stmt->affected_rows != 0){
            $stmt->close();
            $mysqli->close();
            return $id;
        }
        else{
            $stmt->close();
            $mysqli->close();
            return -1;
        }
    } else
        return -1;
}
function atualizarEndereco($rua,$numero,$bairro,$cidade, $id){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE endereco SET rua = ?, bairro =?, cidade = ?, numero= ? WHERE idEndereco = ?") or die("Erro na exclusão");
        $stmt->bind_param("sssii",$rua,$bairro,$cidade,$numero,$id);
        $stmt->execute() or die("Erro na atualização do endereço");
        if ($mysqli->affected_rows != 0) {
            $stmt->close();
            $mysqli->close();
            return true;
        } else {
            $stmt->close();
            $mysqli->close();
            return false;
        }
    }
}
function gerarId(){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT idEndereco FROM endereco ORDER BY idEndereco DESC  LIMIT 1") or die("Erro ao preparar o MySQL.");
        $stmt->execute()or die('Erro na execução do sql');
        $resultado = $stmt->get_result();
        $linha = $resultado->fetch_assoc();
        if ($linha["idEndereco"] == '')
        {
            $idEndereco = 1;
        }
        else
            $idEndereco = $linha["idEndereco"] + 1;
        $stmt->close();
        $mysqli->close();
        return $idEndereco;
    } else
        echo "Erro ao conectar com o Banco de Dados";
}
