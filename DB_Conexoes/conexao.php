<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function conectar() {
    try {
        $mysqli = new mysqli('localhost', 'root', '', 'maonamassa');
        $mysqli->set_charset("utf8");
        return $mysqli;
    } catch (Exception $e) {
        throw new Exception('ERRO DE CONEXÃO:' . $e->getMessage());
        return NULL;
    }
}

?>
