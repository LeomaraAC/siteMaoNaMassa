<?php

require_once '../../DB_Conexoes/conexao.php';
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
if ($telefone == "" && $email == "") {
    echo 'Deve-se preencher o campo de email ou o campo de telefone';
} elseif ($nome == "" || $assunto == "" || $mensagem == "") {
    echo 'Deve-se preencher os campo obrigatórios';
} else {
    $mysqli = conectar();
    $sql = "INSERT INTO mensagem(nome,email,telefone,assunto,mensagem,dataEnvio, status) VALUES('$nome','$email','$telefone','$assunto','$mensagem',NOW(),'Recebido')";
    $stmt = $mysqli->prepare($sql) or die("Erro ao inserir");
    $stmt->execute() or die("Erro ao inserir");
    if($mysqli->affected_rows != 0)
    {
        echo 'OK';
    }
    else
    {
        echo 'Erro ao enviar a mensagem';
    }
}
?>
