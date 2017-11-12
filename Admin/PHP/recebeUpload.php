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

function perfil() {
    // verifica se foi enviado um arquivo
    if (isset($_FILES['image-perfil']['name']) && $_FILES['image-perfil']['error'] == 0) {

        $arquivo_tmp = $_FILES['image-perfil']['tmp_name']; // Pega o caminho temporario da imagem
        $nome = $_FILES['image-perfil']['name']; // Pega o nome do arquivo
        // Pega a extensão
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);


        // Verifica a extensão do arquivo enviado, sendo permitido somente imagens, .jpg;.jpeg;.png
        if (strstr('.jpg;.jpeg;.png', $extensao)) {
            $novoNome = 'Perfil.jpg'; //Define o nome de como a img será salva
            // Concatena a pasta com o nome
            $destino = '../imagens/user/' . $novoNome;
            /*                    /*echo "<script>"
              . "alert(Arquivo salvo com sucesso em :".$destino. ");"
              . "</script>"; */
            // tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino)) {
                echo '<script type="text/javascript">alert("Arquivo salvo com sucesso");</script>';
            } else
                echo '<script type="text/javascript">alert("Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita");</script>';
        } else
            echo '<script type="text/javascript">alert("Você poderá enviar apenas arquivos *.jpg;*.jpeg;*.png);</script>';
    } else
        echo '<script type="text/javascript">alert("Você não enviou nenhum arquivo!");</script>';
/*
    header("Location:../index.php"); //Recarrega a página */
}

/* * **********************************Função para Inserir Produto *********************************** */

function produtoUpload($nome, $arquivo_tmp) {
    // Pega a extensão
    $extensao = pathinfo($nome, PATHINFO_EXTENSION);
    // Verifica a extensão do arquivo enviado, sendo permitido somente imagens, .jpg;.jpeg;.png
    if (strstr('.jpg;.jpeg;.png', $extensao)) {
        // destino da imagem
        //C:\wamp64\www\ProjetoInterdisciplinar\Loja\Imagens\UploadUsuario
        $destino = 'C:/wamp64/www/ProjetoInterdisciplinar/Loja/Imagens/UploadUsuario/';
        /**/
        if (file_exists('../../Loja/Imagens/UploadUsuario/'. $nome)) {
            //Atribui um novo nome
            $posicao = (strpos($nome,$extensao))-1; // Posição onde começa a extensão
            //$posicao = $posicao - 1;
            $nomeAleatorio = substr($nome, 0, $posicao); // retira a estensão
            $nomeAleatorio .= rand(); // concatena o nome c/ um num aleatorio
            $nomeAleatorio .= ".".$extensao; // concatena o novo nome com a extensão
            $destino .= $nomeAleatorio; // concatena o nome da img com o destino
            //tenta copiar
            if (@move_uploaded_file($arquivo_tmp, $destino)) {
                return $destino;
            } else
                throw new Exception('Sem permissão de escrita');
        }
        else {
            // tenta copiar o arquivo para o destino
            $destino .= $nome;
            // tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino)) {
                return $destino;
            } else
                throw new Exception('Sem permissão de escrita');
        }
    } else
        throw new Exception('Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.png');
}

/* * **********************************Função para Inserir Categoria *********************************** */

function cadastraCategoria() {
    $categoria = $_POST["categoria"];
    $caminho = '../imagens/produtos/' . strtolower($categoria);
    if (file_exists($caminho)) {
        echo 'Essa categoria já existe';
    } else {
        ler('../arquivos/Categorias.txt', $categoria);
        /* salvaArquivo('../arquivos/Categorias', $categoria);
          mkdir($caminho) or die("erro ao criar diretório"); */
    }
}

/**/

function salvaArquivo($caminho, $conteudo) {
    // Abre ou cria o arquivo
    // "a" representa que o arquivo é aberto para ser escrito
    $fp = fopen($caminho . '.txt', "a");
    // Escreve no arquivo   
    $escreve = fwrite($fp, $conteudo . "\r\n");
    // Fecha o arquivo
    fclose($fp);
}

function ler($caminho, $conteudo) {
    $linhas = file($caminho, 'r');

    foreach ($linhas as $numero => $linha) {
        if (ereg($conteudo, $linha)):
            $linha_ocorrencia = ($linha + 1);
            break;
        endif;
    }

    echo 'linha encontrada: ' . $linhas[$linha_ocorrencia] . "<br>\n";
    echo 'proxima linha: ' . $linhas[($linha_ocorrencia + 1)];
}
