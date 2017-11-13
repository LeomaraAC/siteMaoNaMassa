<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 12/11/2017
 * Time: 18:41
 */
session_start();
session_destroy();
unset($_SESSION['user'],
    $_SESSION['email'],
    $_SESSION['id']);
header("Location: ../../Loja/Paginas/index.php");