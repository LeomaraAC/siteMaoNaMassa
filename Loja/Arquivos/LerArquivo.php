<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 13/11/2017
 * Time: 22:12
 */
require_once '../../constante.php';
function lerDestaque()
{
    $caminho = HOME_PATH.'/Txt/destaque.txt';
    $conteudo = file_get_contents($caminho,"r");
    return $conteudo;
}
function lerCarrossel()
{
    $caminho = HOME_PATH.'/Txt/carrossel.txt';

    if (!file_exists($caminho)) {
        return false;
    }

    $arquivo = fopen($caminho,"r");
    $cont = 0;

    while(! feof($arquivo)) //Enquanto não chegar no fim fim do arquivo
    {
        $ids[$cont] = fgets($arquivo);
        $cont++;
    }
    fclose($arquivo);
    return$ids;
}
function lerInfo($tipo)
{
    $caminho = HOME_PATH.'/Txt/'.$tipo.'.txt';
    $conteudo = file_get_contents($caminho,"r");
    return $conteudo;
}