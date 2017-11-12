<?php
if ($tipo == "Adicionar") {
    echo '<li class="active"><a href="adicionarProduto.php">Adicionar</a></li>'
    . '<li><a href="todosProduto.php">Todos</a></li>';
} else {
    echo '<li><a href="adicionarProduto.php">Adicionar</a></li>'
    . '<li class="active"><a href="todosProduto.php">Todos</a></li>';
}
?>
