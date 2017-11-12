<?php

require_once '../../DB_Conexoes/conexao.php';
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
if ($telefone == "" && $email == "") {
    echo "<script>
    alert('Deve-se preencher o campo de email ou o campo de telefone');
    window.location = '../Paginas/contato.php';
    </script>";
} elseif ($nome == "" || $assunto == "" || $mensagem == "") {
    echo "<script>
    alert('Deve-se preencher os campo obrigatórios');
    window.location = '../Paginas/contato.php';
    </script>";
} else {
    $mysqli = conectar();
    $sql = "INSERT INTO mensagem(nome,email,telefone,assunto,mensagem,dataEnvio) VALUES('$nome','$email','$telefone','$assunto','$mensagem',NOW())";
    $stmt = $mysqli->prepare($sql) or die("Erro ao inserir");
    $stmt->execute() or die("Erro ao inserir");
    if($mysqli->affected_rows != 0)
    {
        echo "<script>
        alert('Mensagem enviada com sucesso');
        window.location = '../Paginas/contato.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Erro ao enviar a mensagem');
        </script>";
    }
}
?>
