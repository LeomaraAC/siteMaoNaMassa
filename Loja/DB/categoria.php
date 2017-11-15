<?php
/**
 * Created by PhpStorm.
 * User: Leomara
 * Date: 14/11/2017
 * Time: 12:55
 */
require_once '../../DB_Conexoes/conexao.php';
function todasCategorias()
{
    $mysqli = conectar();
    if ($mysqli){
        $stmt = $mysqli->prepare("SELECT * FROM categoria ORDER BY descricao")or die("Erro na preparação do SQL");
        $stmt->execute() or die("Erro na busca das categorias");
        $resultado = $stmt->get_result();
        return $resultado;
    }
    else
    {
        echo "Erro na conexão com o Banco de Dados";
        return NULL;
    }
}