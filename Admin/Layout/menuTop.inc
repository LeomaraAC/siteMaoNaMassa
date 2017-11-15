<nav id="menu-topo" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header col-sm-6 col-xs-6">
            <button type="button" id="sidebarCollapse" class="btn btn-ativo navbar-btn">
                <i class="glyphicon glyphicon-align-left"></i>
            </button>
        </div>

        <div class="col-sm-6 col-xs-6" >
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-xs hidden-sm ">
                    <form role="search" class="app-search m-r-10">
                        <input type="text" placeholder="Busca..." class="form-control"> 
                        <a href=""><i class="glyphicon glyphicon-search"></i></a>
                    </form>
                </li>
                <li class="perfil">
                    <a class="profile-pic" href="usuario.php">
                        <img src="../Imagens/user/Perfil.jpg?<?php echo time()?>" alt="user-img" width="36" class="img-circle lateral"><b class="hidden-xs"><?php echo $_SESSION['user']?></b></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

