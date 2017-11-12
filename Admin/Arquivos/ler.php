<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 03/11/2017
 * Time: 00:09
 */
function ler($tipo)
{
    $conteudo = file_get_contents("C:\\wamp64\\www\\ProjetoInterdisciplinar\\Txt\\$tipo.txt","r");
    return $conteudo;
}
