<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 12/11/2017
 * Time: 12:10
 */
session_start();
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if ($btnLogin) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    if (!empty($usuario) && !empty($senha)) {
        require_once '../DB/dbUsuario.php';
        $conectado = Login($usuario, $senha);
        if ($conectado) {
            if (password_verify($senha, $conectado["senhaUser"])) {
                $_SESSION['user'] = $conectado["nomeUsuario"];
                $_SESSION['email'] = $conectado["emailUser"];
                $_SESSION['id'] = $conectado["idUser"];
                header("Location: ../Paginas/index.php");
            } else {
                $_SESSION['msg'] = "Login ou senha incorreto!";
                header("Location: ../Paginas/login.php");
            }
        } else {
            $_SESSION['msg'] = "Login ou senha incorreto!";
            header("Location: ../Paginas/login.php");
        }
    }
} else {
    header("Location: ../Paginas/erro.php");
}