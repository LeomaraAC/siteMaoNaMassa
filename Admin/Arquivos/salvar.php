<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 02/11/2017
 * Time: 23:28
 */
header('content-type:text/html;charset=UTF-8');
$texto = $_POST["edit"];
$aba = $_GET["tab"];
$ponteiro = fopen("C:\\wamp64\\www\\ProjetoInterdisciplinar\\Txt\\$aba.txt", "w");
fwrite($ponteiro,$texto);
fclose($ponteiro);
echo "<script>
        alert('Arquivo salvo com sucesso');
        window.location = '../Paginas/configuracaoLoja.php';
      </script>";
?>