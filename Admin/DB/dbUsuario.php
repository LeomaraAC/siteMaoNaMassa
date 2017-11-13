<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 12/11/2017
 * Time: 11:43
 */
require_once '../../DB_Conexoes/conexao.php';
function Login($usuario)
{
    $mysqli = conectar();
    if($mysqli)
    {
        $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE nomeUsuario = ? LIMIT 1")or die("Erro ao buscar os usuario");
        $stmt->bind_param("s", $usuario)or die("Erro ao buscar os usuario");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();
        return $resultado->fetch_assoc();
    }
    else
    {
        return NULL;
    }
}