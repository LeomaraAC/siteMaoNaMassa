<?php
/*
$tipoForm = $_GET["form"];
header('Content-type:text/html; charset=UTF-8');
if ($tipoForm == "perfil") {
    perfil();
} elseif ($tipoForm == "prod") {
    produto();
} elseif ($tipoForm == "cat") {
    cadastraCategoria();
}
*/
/* * **********************************Função para atualizar Perfil************************************* */


function perfilUpload($nome, $arquivo_tmp) {

    $extensao = pathinfo($nome, PATHINFO_EXTENSION);
    if (strstr('.jpg;.jpeg;.png', $extensao))
    {
        $novoNome = 'Perfil.jpg';
        $destino = '../imagens/user/' . $novoNome;
        if (@move_uploaded_file($arquivo_tmp, $destino)) {
            return true;
        } else
            throw new Exception('Erro ao tentar atualizar a imagem');
    }
    else
        throw new Exception('Você poderá enviar apenas imagens "*.jpg;*.jpeg;*.png');
}

/* * **********************************Função para Inserir Produto *********************************** */

function produtoUpload($nome, $arquivo_tmp) {
    // Pega a extensão
    $extensao = pathinfo($nome, PATHINFO_EXTENSION);
    // Verifica a extensão do arquivo enviado, sendo permitido somente imagens, .jpg;.jpeg;.png
    if (strstr('.jpg;.jpeg;.png', $extensao)) {
        //$destino = 'C:/wamp64/www/ProjetoInterdisciplinar/Loja/Imagens/UploadUsuario/';
        /**/
        $destino = './../../Loja/Imagens/UploadUsuario/';
        $destinoLoja = './../Imagens/UploadUsuario/'; //Destino que será utilizado na loja;
        if (file_exists('../../Loja/Imagens/UploadUsuario/'. $nome)) {
            $posicao = (strpos($nome,$extensao))-1; // Posição onde começa a extensão
            //$posicao = $posicao - 1;
            $nomeAleatorio = substr($nome, 0, $posicao); // retira a estensão
            $nomeAleatorio .= rand(); // concatena o nome c/ um num aleatorio
            $nomeAleatorio .= ".".$extensao; // concatena o novo nome com a extensão
            $destino .= $nomeAleatorio; // concatena o nome da img com o destino
            $destinoLoja .= $nomeAleatorio;

            //tenta copiar
            if (@move_uploaded_file($arquivo_tmp, $destino)) {
                //return $destino;
            } else
                throw new Exception('Sem permissão de escrita');
        }
        else {
            // tenta copiar o arquivo para o destino
            $destino .= $nome;
            $destinoLoja .= $nome;
            // tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino)) {
                //return $destino;
            } else
                throw new Exception('Sem permissão de escrita');
        }
        $arrayDestino = array($destino, $destinoLoja);
        return $arrayDestino;
    } else
        throw new Exception('Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.png');
}