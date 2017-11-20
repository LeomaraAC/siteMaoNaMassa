<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 18/11/2017
 * Time: 00:24
 */
session_start();
require_once '../DB/Produtos.php';
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $p = (isset($_POST['parametros']) && !empty($_POST['parametros'])) ? $_POST['parametros'] : NULL;
    switch ($action) {
        case 'addCarrinho' :
            addCarrinho($p[0], $p[1], '');
            break;
        case 'addCarrinhoDig' :
            addCarrinho($p[0], '', $p[1]);
            break;
        case 'removeCarrinho' :
            removeCarrinho($p);
            break;
        case 'excluiCarrinho' :
            excluiCarrinho($p[0],$p[1]);
            break;

    }
}
function addCarrinho($id, $tipo, $qtde)
{
    if ($qtde == '') {
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] += 1;
        } else {
            $_SESSION['carrinho'][$id] = 1;
        }

        if (strcmp($tipo, "Loja") == 0)
            echo "Produto adicionado ao carrinho com sucesso.";
        else {
            // echo ;
            $precoUnit = buscaPreco($id);
            $retorno = array($_SESSION['carrinho'][$id], $precoUnit["precoVenda"]);
            echo json_encode($retorno);
        }
    }else{
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = $qtde;
        }
        $precoUnit = buscaPreco($id);
        $precoTotal = $qtde * $precoUnit["precoVenda"];
        echo $precoTotal;

    }

}

function removeCarrinho($id)
{
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] -= 1;
    }
    $precoUnit = buscaPreco($id);
    $retorno = array($_SESSION['carrinho'][$id], $precoUnit["precoVenda"]);
    if ($_SESSION['carrinho'][$id] == 0) {
        unset($_SESSION['carrinho'][$id]);
    }
    echo json_encode($retorno);

}

function excluiCarrinho($id,$qtdeLinha)
{
    $precoUnit = buscaPreco($id);
    $precoTotal = $_SESSION['carrinho'][$id] * $precoUnit["precoVenda"];
    if($qtdeLinha > 2)
    {
        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }
    else{
        session_destroy();
    }

    echo $precoTotal;
}