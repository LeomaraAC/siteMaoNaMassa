<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 13/11/2017
 * Time: 22:12
 */
function lerDestaque()
{
    $conteudo = file_get_contents("C:\\wamp64\\www\\ProjetoInterdisciplinar\\Txt\\destaque.txt","r");
    return $conteudo;
}
function lerCarrossel()
{
    $arquivo = fopen("C:\\wamp64\\www\\ProjetoInterdisciplinar\\Txt\\carrossel.txt","r");
    $cont = 0;
    while(! feof($arquivo)) //Enquanto não chegar no fim fim do arquivo
    {
        $ids[$cont] = fgets($arquivo);
        $cont++;
    }
    fclose($arquivo);
    return$ids;
}