<nav id="sidebar">
    <div class="sidebar-header text-center">
        <img src="../Imagens/logomenor.png" class="img-Logo">
        <h3>Mão Na Massa</h3>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="index.php" >
                <i class="glyphicon glyphicon-home"></i>
                Início
            </a>
        </li>
        <li>
            <a href="usuario.php">
                <i class="glyphicon glyphicon-user"></i>
                Perfil
            </a>
        </li>
        <li>
            <a href="encomendas.php">
                <i class="fa fa-shopping-basket"></i>
                Encomendas
            </a>
        </li>
        <li>
            <a href="Produto.php" >
                <i class="glyphicon glyphicon-barcode"></i>
                Produtos
            </a>
        </li>
        <li>
            <a href="configuracaoLoja.php" >
                <i class="fa fa-industry"></i>
                Configurações da Loja
            </a>
        </li>
        <li>
            <a href="Mensagem.php">
                <i class="glyphicon glyphicon-envelope"></i>
                Mensagens
            </a>
        </li>
        <li>
            <a href="graficos.php">
                <i class="fa fa-bar-chart"></i>
                Gráficos
            </a>
        </li>
        <li>
            <a href="#relatoriosSubmenu" data-toggle="collapse" aria-expanded="false">
                <i class="fa fa-file-pdf-o"></i>
                Relatórios
            </a>
            <ul class="collapse list-unstyled" id="relatoriosSubmenu">
                <li><a href="relatorioEstoqueProd.php" target="_blanck">Estoque de Produto</a></li>
                <li><a href="relatorioEstoqueMP.php" target="_blanck">Estoque de Materiais</a></li>
                <li><a href="relatorioMovimentacao.php" target="_blanck">Revenda/Venda</a></li>
            </ul>
        </li>
        <li>
            <a href="../PHP/logout.php">
                <i class="glyphicon glyphicon-log-out"></i>
                Sair
            </a>
        </li>
    </ul>
</nav>