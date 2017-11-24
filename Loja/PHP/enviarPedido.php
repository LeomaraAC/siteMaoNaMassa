<?php
session_start();
require_once '../DB/encomenda.php';

$nome = $_POST["nome"];
$tel = $_POST["tel"];
$cel = $_POST["cel"];
$email = $_POST["email"];
if ($nome != ""){
    if ($tel != "" || $cel != "" || $email != "")
    {
        if (isset($_SESSION['carrinho'])){
            /*Inserir o contato e pegar o id*/
            $idContato = salvaContato($cel,$tel,$email);
            /*Salvar o cliente*/
            $idCliente = salvaCliente($idContato,$nome);
            //Salvar o pedido
            $idEnc = gerarIdEncomenda();
            $cont = 0;
            foreach ($_SESSION['carrinho'] as $idProduto => $qtde){
                $cont++;
                salvaEncomenda($idEnc,$idProduto,$idCliente,$qtde);
            }
            if ($cont == 0){
                if (removeCliente($idCliente)== true && removeContato($idContato) == true)
                    echo "Não há nenhum produto no carrinho";
                else
                    echo "Erro ao tentar ecomendar o produto";
            }
            else{
                session_destroy();
                echo "OK";
            }
        }
    }else
        echo "É obrigatório o preenchimento de pelo menos um tipo de contato";
}else
    echo "É obrigatório o preenchimento dos campos 'Nome'";