<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <link rel="stylesheet" href="../Bibliotecas/bootstrap-3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/png" href="../Imagens/logo.ico">
</head>
<body>
<?php
unset($_SESSION['user'],
    $_SESSION['email'],
    $_SESSION['id']);
?>
<div class="login-page">
    <center><img src="../Imagens/logomenor.png" alt=""></center>
    <h1>MÃO NA MASSA </h1>
    <h4>Área Restrita ao Administrador</h4>
    <div class="form">
        <form class="login-form" method="POST" action="../PHP/login.php">
            <h5 class="text-danger"><?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?></h5>
            <input type="text" placeholder="usuário" id="usuario" name="usuario" required autofocus/>
            <input type="password" placeholder="senha" id="senha" name="senha" required/>
            <button type="submit" name="btnLogin" id="btnLogin" value="Login">Login</button>
            <p class="message"><a href="../../Loja/Paginas/index.php">Voltar</a></p>
        </form>
    </div>
</div>
</body>
</html>
