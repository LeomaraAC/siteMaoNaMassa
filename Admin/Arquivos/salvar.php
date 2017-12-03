<?php
require_once '../../constante.php';
require_once '../PHP/localizacao.php';
header('content-type:text/html;charset=UTF-8');
$texto = $_POST["edit"];
$aba = $_POST['tipo'];
$caminho = HOME_PATH.'/Txt/'.$aba.'.txt';
if ($aba == "Localizacao")
{
    try{
        $coordenadas = coordenadas($texto);
        salvarCoordenadas($coordenadas);
        salvarTxt($caminho,$texto);
        echo 'OK';
    }catch (Exception $e){
        echo $e->getMessage();
    }
}else{
    salvarTxt($caminho,$texto);
    echo 'OK';
}
function salvarTxt($caminho, $texto)
{
    $ponteiro = fopen($caminho, "w");
    fwrite($ponteiro,$texto);
    fclose($ponteiro);
}
function salvarCoordenadas($coordenadas){
    $frase = "lat=".$coordenadas[0]."\r\n";
    $frase .= "lng=".$coordenadas[1];
    $caminhoC = HOME_PATH.'/Txt/coordenadas.ini';

    $ponteiro = fopen($caminhoC, "w");
    fwrite($ponteiro,$frase);
    fclose($ponteiro);
}
?>