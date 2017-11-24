<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 13/11/2017
 * Time: 17:49
 */
require_once '../../constante.php';

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
    if ($id > -1) {
        $caminho = HOME_PATH . '/Txt/destaque.txt';
        //Irá salvar em txt o id do destaque;
        $ponteiro = fopen($caminho, "w") or die('Erro ao abrir destaque para escrita');
        fwrite($ponteiro, $id) or die('Erro ao salvar destaque');
        fclose($ponteiro);
        echo 'Destaque salvo com sucesso!';
    } else {
        echo 'Selecione um produto para o destaque';
    }
}

function carrossel($id)
{
    if ($id[0] > -1 && $id[1] > -1 && $id[2] > -1)
    {
        $caminho = HOME_PATH . '/Txt/carrossel.txt';
        $frase = $id[0] . "\r\n" . $id[1] . "\r\n" . $id[2];
        $ponteiro = fopen($caminho, "w") or die('Erro ao abrir carrossel para escrita');
        fwrite($ponteiro, $frase) or die('Erro ao salvar carrossel');
        fclose($ponteiro);
        echo 'Carrossel salvo com sucesso!';
    }else{
        echo 'Selecione os produtos para o carrossel';
    }
}

function lerDestaque()
{
    $caminho = HOME_PATH . '/Txt/destaque.txt';
    $id = file_get_contents($caminho, "r") or die("Erro ao abrir para leitura");
    echo $id;
}

function lerCarrossel()
{
    $caminho = HOME_PATH . '/Txt/carrossel.txt';
    $arquivo = fopen($caminho, "r");
    $cont = 0;
    while (!feof($arquivo)) //Enquanto não chegar no fim fim do arquivo
    {
        $str = fgets($arquivo);
        $str = trim($str);

        $ids[$cont] = $str;//fgets($arquivo);
        $cont++;
    }
    fclose($arquivo);
    echo json_encode($ids);
}

function lerInfo($tipo)
{
    $conteudo = file_get_contents(HOME_PATH . "/Txt/$tipo.txt", "r");
    echo $conteudo;
}