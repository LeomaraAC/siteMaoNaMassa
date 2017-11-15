<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 13/11/2017
 * Time: 17:49
 */

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $p = (isset($_POST['parametros']) && !empty($_POST['parametros'])) ? $_POST['parametros'] : NULL;
    switch ($action) {
        case 'destaque' :
            destaque($p);
            break;
        case 'carrossel' :
            carrossel($p);
            break;
        case 'lerDestaque':
            lerDestaque();
            break;
        case 'lerCarrossel':
            lerCarrossel();
            break;
    }
}
function destaque($id)
{
    //Irá salvar em txt o id do destaque;
    //C:\wamp64\www\ProjetoInterdisciplinar\Txt
    $ponteiro = fopen("C:\\wamp64\\www\\ProjetoInterdisciplinar\\Txt\\destaque.txt","w") or die('Erro ao abrir destaque para escrita');
    fwrite($ponteiro,$id)or die('Erro ao salvar destaque');
    fclose($ponteiro);
    echo 'Arquivo salvo com sucesso';
}

function carrossel($id)
{
    $frase = $id[0]."\r\n".$id[1]."\r\n".$id[2];
    $ponteiro = fopen("C:\\wamp64\\www\\ProjetoInterdisciplinar\\Txt\\carrossel.txt","w") or die('Erro ao abrir carrossel para escrita');
    fwrite($ponteiro,$frase)or die('Erro ao salvar carrossel');
    fclose($ponteiro);
    echo 'Arquivo salvo com sucesso\n';
}
function lerDestaque()
{
    $id = file_get_contents("C:\\wamp64\\www\\ProjetoInterdisciplinar\\Txt\\destaque.txt","r");
    echo $id;
}

function lerCarrossel()
{
    $arquivo = fopen("C:\\wamp64\\www\\ProjetoInterdisciplinar\\Txt\\carrossel.txt","r");
    $cont = 0;
    while(! feof($arquivo)) //Enquanto não chegar no fim fim do arquivo
    {
        $str = fgets($arquivo);
        $str = trim($str);

        $ids[$cont] = $str;//fgets($arquivo);
        $cont++;
    }
    fclose($arquivo);
    echo json_encode($ids);
}