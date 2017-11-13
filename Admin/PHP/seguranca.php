<?php
ob_start();
if (($_SESSION['user'] == "") || ($_SESSION['email'] == "") || ($_SESSION['id'] == "")) {
    unset($_SESSION['user'],
        $_SESSION['email'],
        $_SESSION['id']);
    $_SESSION['msg'] = "Área Restrita! Por favor efetue login para acessa-la.";
    header("Location: ../Paginas/login.php");
}
?>