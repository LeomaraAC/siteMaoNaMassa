<?php
session_start();
require_once '../PHP/seguranca.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../Imagens/logo.ico">
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="../Bibliotecas/bootstrap-3.3.7/css/bootstrap.min.css">        
        <link rel="stylesheet" href="../CSS/dashboard-admin.css">
        <link rel="stylesheet" href="../CSS/menu-topo.css">
        <link rel="stylesheet" href="../CSS/footer.css">        
        <link rel="stylesheet" href="../CSS/custom.css">
        <link rel="stylesheet" href="../CSS/mensagens.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>    
        <?php
        include '../Layout/menuTop.inc';
        ?>
        <div class="wrapper">
            <?php
            include '../Layout/menuLateral.inc';
            ?>
            <div id="content">  
                <?php
                $id = array("Perfil");
                include("../Layout/localizacao.inc");
                ?>
                <form method="post" action="php/recebeUpload.php?form=perfil">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="white-box">
                                <div id="foto" class="user-bg"> <img class="img-perfil" width="100%" alt="user" src="../Imagens/user/Perfil.jpg">
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <img src="../Imagens/user/Perfil.jpg?<?php echo time()?>" class=" img-circle img-perfil" alt="img">
                                            <h4 class="text-white">Joane</h4>
                                            <h5 class="text-white">Joane@gmail.com</h5> 
                                            <div class="trocar-foto">
                                                <input type="file" id="image-perfil" name="image-perfil" onchange="readURL(this);" accept="image/*" class="form-control form-input Profile-input-file" >
                                                <i class="glyphicon glyphicon-camera camera"></i>
                                            </div>                                            

                                        </div>                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <div class="form-group">
                                    <label class="col-md-12">Nome Completo</label>
                                    <div class="col-md-12">
                                        <input type="text"class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12">E-mail</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control form-control-line" name="email" id="email" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Senha</label>
                                    <div class="col-md-12">
                                        <input type="password" value="" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group text-right">                                    
                                    <div class="col-sm-12">
                                        <button class="btn btn-ativo">
                                            <i class="glyphicon glyphicon-floppy-disk"></i>
                                            Atualizar Perfil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            include '../Layout/footer.inc';
            ?>
        </div>
        <script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
        <script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
        <script src="../JS/custom.js"></script>
    </body>
</html>
