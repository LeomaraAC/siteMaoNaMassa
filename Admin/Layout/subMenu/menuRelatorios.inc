<?php

if ($tipo == "prodMensal") {
    echo '<li class="active"><a href="relatorios.php?opcao=prodMensal">Produção Mensal</a></li>'
    . '<li><a href="relatorios.php?opcao=prodEncomendados">Produtos encomendados</a></li>'
    . '<li><a href="relatorios.php?opcao=prodVendidos">Produtos Vendidos</a></li>'
    . '<li><a href="relatorios.php?opcao=despesas">Despesas/Receita</a></li>';
} elseif ($tipo == "prodEncomendados") {
    echo '<li><a href="relatorios.php?opcao=prodMensal">Produção Mensal</a></li>'
    . '<li class="active"><a href="relatorios.php?opcao=prodEncomendados">Produtos encomendados</a></li>'
    . '<li><a href="relatorios.php?opcao=prodVendidos">Produtos Vendidos</a></li>'
    . '<li><a href="relatorios.php?opcao=despesas">Despesas/Receita</a></li>';
} elseif ($tipo == "prodVendidos") {
    echo '<li><a href="relatorios.php?opcao=prodMensal">Produção Mensal</a></li>'
    . '<li><a href="relatorios.php?opcao=prodEncomendados">Produtos encomendados</a></li>'
    . '<li class="active"><a href="relatorios.php?opcao=prodVendidos">Produtos Vendidos</a></li>'
    . '<li><a href="relatorios.php?opcao=despesas">Despesas/Receita</a></li>';
} else {
    echo '<li><a href="relatorios.php?opcao=prodMensal">Produção Mensal</a></li>'
    . '<li><a href="relatorios.php?opcao=prodEncomendados">Produtos encomendados</a></li>'
    . '<li><a href="relatorios.php?opcao=prodVendidos">Produtos Vendidos</a></li>'
    . '<li class="active"><a href="relatorios.php?opcao=despesas">Despesas/Receita</a></li>';
}
?>




