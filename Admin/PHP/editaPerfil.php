<?php
require_once '../DB/dbUsuario.php';
session_start();
$user = $_POST["nome"];
$email = $_POST["email"];
$idUser = $_POST["id"];

if ((isset($_FILES['image-perfil']['name']))&& $_FILES['image-perfil']['error'] == 0){
    //Faz upload da nova imagem e salva os dados no banco
    $caminho_tmp = $_FILES['image-perfil']['tmp_name'];
    $nome = $_FILES['image-perfil']['name'];
    include "../PHP/recebeUpload.php";
    try
    {
        $upload = perfilUpload($nome,$caminho_tmp);
        $perfil = atualizaPerfil($user,$idUser,$email);
        if ($upload == true || strcmp($perfil,"Perfil alterado com sucesso!") == 0)
        {
            echo "Perfil alterado com sucesso!";
            unset($_SESSION['user'],
                $_SESSION['email']);
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $email;
        }
        else
            echo "Não foi possível atualizar o perfil!";
    }
    catch (Exception $e){
        echo 'ERRO: '. $e->getMessage();
    }
}
else{
    //Salva os dados no banco sem fazer o upload da imagem
    $perfil = atualizaPerfil($user,$idUser,$email);
    if (strcmp($perfil,"Perfil alterado com sucesso!") == 0)
    {
        echo "Perfil alterado com sucesso!";
        unset($_SESSION['user'],
            $_SESSION['email']);
        $_SESSION['user'] = $user;
        $_SESSION['email'] = $email;
    }
    else
        echo "Não foi possível atualizar o perfil!";
}