<?php

if ($tipo == "Ativas") {
    echo '<li class="active"><a href="encomendas.php?opcao=Ativas">Ativas</a></li>'
    . '<li><a href="encomendas.php?opcao=Pendentes">Pendentes</a></li>'
    . '<li><a href="encomendas.php?opcao=Finalizadas">Finalizadas</a></li>';
} elseif ($tipo == "Pendentes") {
    echo '<li><a href="encomendas.php?opcao=Ativas">Ativas</a></li>'
    . '<li class="active"><a href="encomendas.php?opcao=Pendentes">Pendentes</a></li>'
    . '<li><a href="encomendas.php?opcao=Finalizadas">Finalizadas</a></li>';
} else {
    echo '<li><a href="encomendas.php?opcao=Ativas">Ativas</a></li>'
    . '<li><a href="encomendas.php?opcao=Pendentes">Pendentes</a></li>'
    . '<li class="active"><a href="encomendas.php?opcao=Finalizadas">Finalizadas</a></li>';
}
?>



