<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li>
            <?php
            include '../Cookie/Tema/logo.inc';
            ?>
        </li>
        <!-- Uma linha -->
        <li class="clearfix text-center">
            <a class="grupo-img-item" href="index.php" data-toggle="tooltip" title="Home"><i class="glyphicon glyphicon-home"></i> </a>
            <a class="grupo-img-item" href="sobre.php" data-toggle="tooltip" title="Quem somos"><i class="glyphicon glyphicon-info-sign"></i></a>
            <a class="grupo-img-item" href="contato.php" data-toggle="tooltip" title="Fale conosco"><i class="glyphicon glyphicon-phone-alt"></i></a>
            <a class="grupo-img-item" href="#" data-toggle="tooltip" title="Carrinho"><i class="glyphicon glyphicon-shopping-cart"></i></a>
        </li>

        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="botao">
                <i class="glyphicon glyphicon-th-list"></i>
                Categorias
            </a>
            <ul class="collapse list-unstyled btn-submenu" id="homeSubmenu">
                <li><a href="#">Bolo</a></li>
                <li><a href="#">Bolo no pote</a></li>
                <li><a href="#">Ovo de Páscoa</a></li>
                <li><a href="#">Truffas</a></li>
            </ul>
        </li>
        <li class="">
            <a href="#produtosSubmenu" data-toggle="collapse" aria-expanded="false" class="botao">
                <i class="glyphicon glyphicon-barcode"></i>
                Produtos
            </a>
            <ul class="collapse list-unstyled btn-submenu" id="produtosSubmenu">
                <li><a href="categoriasProdutos.php">Todos</a></li>
                <li><a href="fabricacao.php">Como são feitos?</a></li>
            </ul>
        </li>
        <li class="">
            <a href="#EmpresaSubmenu" data-toggle="collapse" aria-expanded="false" class="botao">
                <i class="glyphicon glyphicon-briefcase"></i>
                Empresa
            </a>
            <ul class="collapse list-unstyled btn-submenu" id="EmpresaSubmenu">
                <li><a href="localizacao.php">Localização</a>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#AdminSubmenu" data-toggle="collapse" aria-expanded="false" class="botao">
                <i class="glyphicon glyphicon-lock"></i>
                Admin
            </a>
            <ul class="collapse list-unstyled btn-submenu" id="AdminSubmenu">
                <li><a href="../../Admin/Paginas/login.php">Login</a></li>
            </ul>
        </li>
    </ul>
</div>
