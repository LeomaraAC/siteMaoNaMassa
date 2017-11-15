<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 12/11/2017
 * Time: 11:43
 */
require_once '../../DB_Conexoes/conexao.php';
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $p = (isset($_POST['parametros']) && !empty($_POST['parametros'])) ? $_POST['parametros'] : NULL;
    switch ($action) {
        case 'trocarSenha' :
            trocarSenha($p[0],$p[1],$p[2]);
            break;
    }
}
function Login($usuario, $senha)
{
    $mysqli = conectar();
    if($mysqli)
    {
        $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE nomeUsuario = ? AND senhaUser = MD5(?)LIMIT 1")or die("Erro ao preparar o comando Sql");
        $stmt->bind_param("ss", $usuario, $senha)or die("Erro ao buscar os usuario");
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
function trocarSenha($senhaAntiga, $novaSenha, $idUsuario)
{
    $mysqli = conectar();
    if($mysqli)
    {
        $stmt = $mysqli->prepare("UPDATE usuario SET senhaUser = MD5(?) WHERE idUser = ? AND senhaUser = MD5(?)")or die("Erro ao preparar o comando Sql");
        $stmt->bind_param("sis",$novaSenha,$idUsuario,$senhaAntiga)or die("Erro ao alterar senha");
        $stmt->execute();
        if ($stmt->affected_rows != 0)
            echo "Senha alterada com sucesso";
        else
            echo "A senha não foi alterada. Verifique o preenchimento dos campos.";
    }
}
function atualizaPerfil($usuario, $id, $email){
    $mysqli = conectar();
    if($mysqli)
    {
        $stmt = $mysqli->prepare("UPDATE usuario SET nomeUsuario = ?, emailUser = ? WHERE idUser = ?")or die("Erro ao preparar o comando Sql");
        $stmt->bind_param("ssi",$usuario,$email,$id)or die("Erro ao alterar o perfil");
        $stmt->execute();
        if ($stmt->affected_rows != 0)
            return "Perfil alterado com sucesso";
        else
            return "O perfil não foi alterado. Verifique o preenchimento dos campos.";
    }
}