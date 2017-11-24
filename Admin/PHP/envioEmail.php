<?php

use PHPMailer\PHPMailer\PHPMailer;

/* Criando variavel com os dados do form */
$destinatario = $_POST["para"];
$assunto = utf8_decode($_POST["assunto"]);
$mensagem = utf8_decode($_POST["mensagem"]);
/* Validação dos campos*/
if ($destinatario != "" && $assunto != "" && $mensagem != "") {
    require '../Bibliotecas/PhpMiller/vendor/autoload.php';
    $email = new PHPMailer();
    $email->IsSMTP(); // define que será utilizado o smtp para o envio
    $email->isHTML(TRUE); // aceita html
    $email->Charset = 'UTF-8';
    $email->SMTPAuth = true; // autenticação smtp
    //$email->SMTPDebug = 2;
    $email->SMTPSecure = 'ssl'; // tipo de encriptação que será utilizado
    $email->Host = gethostbyname('smtp.gmail.com'); //servidor smtp
    $email->Port = 465; //porta
    $email->Username = 'alerrandra.mcgregor@gmail.com'; //usuario
    $email->Password = 'KacAcRu7'; //senha
    $email->From = 'alerrandra.mcgregor@gmail.com'; // email do remetente
    $email->FromName = 'alerrandra mcgregor'; //Nome do remetente
    $email->addAddress($destinatario, 'John Doe'); // email e nome do destinatario
    $email->Subject = $assunto; //assunto
    $email->Body = $mensagem; //Mensagem
    $email->SMTPOptions['ssl'] = [
        "verify_peer"=>false,
        "verify_peer_name"=>false,
        "allow_self_signed"=>true
    ];

    if ($email->Send()) { // Envia a mensagem
        echo 'OK';
    } else {
        echo 'Erro: '.$email->ErrorInfo;
    }
} else {
    echo 'É necessario preencher todos os campos.';
}
?>