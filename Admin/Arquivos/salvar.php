<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 02/11/2017
 * Time: 23:28
 */
require_once '../../constante.php';
header('content-type:text/html;charset=UTF-8');
$texto = $_POST["edit"];
$aba = $_POST['tipo'];
$caminho = HOME_PATH.'/Txt/'.$aba.'.txt';
$ponteiro = fopen($caminho, "w");
fwrite($ponteiro,$texto);
fclose($ponteiro);
switch ($aba){
    case "Sobre":
        $aba = "quem somos";
        break;
    case "Fabricacao":
        $aba = "como são feitos";
        break;
    case "Contato":
        $aba = "contato";
        break;
    case "Localizacao":
        $aba = "localização";
        break;

}
echo 'Arquivo '.$aba.' foi salvo com sucesso!';
?>