<?php
require_once './../../DB_Conexoes/conexao.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $p = (isset($_POST['parametros']) && !empty($_POST['parametros'])) ? $_POST['parametros'] : NULL;
    switch ($action) {
        case 'apagarMensagensByID' :
            apagarMensagensByID($p);
            break;
        case 'apagarMensagensLixeiraByID':
            apagarMensagensLixeiraByID($p);
    }
}

function apagarMensagensByID($param)
{
    $mysqli = conectar();
    if ($mysqli) {
        $status = "Lixeira";
        $cont = 0;
        foreach ($param as $id)
        {
            $stmt = $mysqli->prepare("UPDATE mensagem SET status = ? , dataExclusao = NOW() WHERE idMensagem = ?") or die("Erro ao deletar");
            $stmt->bind_param("si", $status, $id);
            $stmt->execute() or die("Erro ao deletar");
            if ($mysqli->affected_rows != 0)
                $cont++;
        }
        if ($cont != 0) {
            echo "Mensagem excluida com sucesso";
        } else {
            echo "Nenhuma mensagem apagada. ";
        }
    }

}

function apagarMensagensLixeiraByID($param)
{
    $mysqli = conectar();
    if ($mysqli) {
        $cont = 0;
        $sql = "= " . implode(" OR idMensagem = ", $param) . ";";
        foreach ($param as $id)
        {
            $stmt = $mysqli->prepare("DELETE FROM mensagem WHERE idMensagem  = ?") or die("Erro ao deletar");
            $stmt->bind_param("i", $id);
            $stmt->execute() or die("Erro ao deletar");
            if ($mysqli->affected_rows != 0)
                $cont++;
        }
        if ($cont != 0) {
            echo "Mensagem excluida com sucesso";
        } else {
            echo "Nenhuma mensagem excluida. ";
        }
    }

}

function todasMensagem()
{
    $mysqli = conectar();
    if ($mysqli) {
        //Prepara o sql
        $stmt = $mysqli->prepare("SELECT * FROM mensagem WHERE status ='Recebido' OR status ='Lido' ORDER BY idMensagem DESC") or die("Erro ao buscar as mensagens");
        $stmt->execute() or die("Erro ao buscar as mensagens"); // execulta o comando
        $resultado = $stmt->get_result(); //pega o resultado
        $stmt->close();
        return $resultado;
    } else {
        return NULL;
    }
}

function leitura($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        //UPDATE mensagem SET status ='Lido',dataLeitura = NOW()  WHERE idMensagem = 34 AND (status ='Recebido' OR status = 'Lido')
        $stmt = $mysqli->prepare("UPDATE mensagem SET status ='Lido',dataLeitura = NOW()  WHERE idMensagem = ? AND (status ='Recebido' OR status = 'Lido')") or die("Erro na leitura da mensagem1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die("Erro na leitura da mensagem");
        return true;
    } else {
        return false;
    }
}

function mensagemId($id)
{
    $mysqli = conectar();
    if ($mysqli) {
        $stmt = $mysqli->prepare("SELECT * FROM mensagem WHERE idMensagem = ?") or die("Erro na leitura da mensagem");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die("Erro na leitura da mensagem");
        $resultado = $stmt->get_result();
        $stmt->close();
        if (leitura($id)) {
            return $resultado->fetch_assoc();
        } else
            return NULL;
    } else {
        return NULL;
    }
}

function lixeira()
{
    $mysqli = conectar();
    if ($mysqli) {
        //Prepara o sql
        $stmt = $mysqli->prepare("SELECT * FROM mensagem WHERE status = 'Lixeira' ORDER BY dataExclusao DESC ") or die("Erro ao buscar as mensagens excuidas");
        $stmt->execute() or die("Erro ao buscar as mensagens excuidas"); // execulta o comando
        $resultado = $stmt->get_result(); //pega o resultado
        $stmt->close();
        return $resultado;
    } else {
        return NULL;
    }
}

?>