<?php
require_once '../../DB_Conexoes/conexao.php';
function inserirEnderecoCliente($idEndereco, $idCliente){
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("UPDATE cliente SET idEndereco = ? WHERE idCliente = ?") or die("Erro na exclusão");
        $stmt->bind_param("ii",$idEndereco, $idCliente);
        $stmt->execute() or die("Erro na atualização do cliente");
        $stmt->close();
        if ($mysqli->affected_rows != 0) {
            return true;
        } else {
            return false;
        }
    }
}