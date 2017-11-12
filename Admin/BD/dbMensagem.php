<?php

require_once '../../DB_Conexoes/conexao.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $p = (isset($_POST['parametros']) && !empty($_POST['parametros'])) ? $_POST['parametros'] : NULL;
    switch ($action) {
        case 'apagarMensagensByID' : apagarMensagensByID($p);
            break;
    }
}

function apagarMensagensByID($param) {
    //percorrer array parametros
    //foreach ($param as $value) {
    //query apagava valor
    //delete from message where id in (?);
    //}
    $mysqli = conectar();
    if($mysqli)
    {
        $sql = "DELETE FROM mensagem WHERE idMensagem = ".implode(" OR idMensagem = ",$param).";";
        $stmt = $mysqli->prepare($sql) or die("Erro ao deletar");
        $stmt->execute() or die("Erro ao deletar");
        if($mysqli->affected_rows != 0)
        {
            echo "Mensagem excluida com sucesso";
        }
        else
        {
            echo "Nenhuma mensagem apagada. ";
        }
    }

}

function todasMensagem() {
    $mysqli = conectar();
    if ($mysqli) {
        //Prepara o sql
        $stmt = $mysqli->prepare("SELECT * FROM mensagem ORDER BY 'dataEnvio', 'idMensagem'") or die("Erro ao buscar as mensagens");
        $stmt->execute() or die("Erro ao buscar as mensagens"); // execulta o comando
        $resultado = $stmt->get_result(); //pega o resultado
        $stmt->close();
        return $resultado;
    } else {
        return NULL;
    }
}
function mensagemId($id){
    $mysqli = conectar();
    if($mysqli){
        $stmt = $mysqli->prepare("SELECT * FROM mensagem WHERE idMensagem = ?") or die("Erro na leitura da mensagem1");
        $stmt->bind_param("i",$id); /*s*/
        $stmt->execute() or die("Erro na leitura da mensagem");
        $resultado = $stmt->get_result();
        $stmt->close();
        return $resultado->fetch_assoc();
    }else{
        return NULL;
    }
}

?>