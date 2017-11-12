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
                $id = array("Produtos", "Adicionar Produto");
                include("../Layout/localizacao.inc");
                ?>
                <form id="formproduto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-solid">
                                <div class="box-header borda">
                                    <h3 class="titulo">Menu</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <?php
                                        $tipo = "Adicionar";
                                        include '../Layout/subMenu/menuProdutos.inc';
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-------- Inicío -------- -->
                            <div class="col-md-4 col-xs-12">
                                <div class="white-box">
                                    <div id="foto" class="user-bg"> 
                                        <img class="img-perfil" width="100%" alt="user" src="../Imagens/produtos/padrao.png">
                                        <div class="trocar-foto-prod">
                                            <input type="file" id="image-prod" name="image-prod" onchange="readURL(this);" accept="image/*" class="form-control form-input Profile-input-file" >
                                            <i class="glyphicon glyphicon-camera"></i>
                                        </div>                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <div class="white-box">
                                    <div class="form-group">
                                        <label class="col-md-12">Produto</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="produto" id="produto" onchange="carragarProd()">
                                                <option value="-1">Selecione...</option>
                                                <?php
                                                    require_once '../BD/dbProduto.php';
                                                    $todosProd = todosProdutos();
                                                    if($todosProd)
                                                    {
                                                        while ($produto = $todosProd->fetch_assoc())
                                                        {
                                                            echo "<option value='".$produto["idProd"]."'>".$produto["descricao"]."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="col-md-12">Categoria</label>
                                        <div class="col-md-12">
                                            <input id="descricao" name="descricao" type="text"class="form-control" readonly placeholder="Categoria...">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-produto">
                                        <div class="form-group col-md-6 col-xs-12">
                                            <label for="text" class="col-md-12">Preço Unitário</label>
                                            <div class="col-md-12">
                                                <label class="sr-only" for="preco">Preço</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">R$</div>
                                                    <input type="text" class="form-control" id="preco" name="preco" placeholder="0.00" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12 form-lateral">
                                            <label for="text" class="col-md-12">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="">Selecione...</option>
                                                <option value="Disponível">Disponível</option>
                                                <option value="Indisponível">Indisponível</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-produto">
                                        <div class="form-group col-md-6 col-xs-12">
                                            <label class="col-xs-12">Peso</label>
                                            <div class="col-md-12">
                                                <input type="text"class="form-control" id="peso" name="peso" >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12 form-lateral">
                                            <label for="text" class="col-md-12">Unidade de Medida</label>
                                            <select class="form-control" id="medidas" name="medidas">
                                                <option value="">Selecione...</option>
                                                <option value="Unidade(s)">Unidade(s)</option>
                                                <option value="kg">kg</option>
                                                <option value="g">g</option>
                                            </select>
                                        </div>
                                    </div>                              
                                    <div class="form-group text-right">
                                        <div class="col-sm-12">
                                            <button class="btn btn-ativo">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                Inserir Produto
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                include '../Layout/footer.inc';
                ?>
            </div>

        </div>
        <script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
        <script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
        <script src="../JS/custom.js"></script>

        <script>
            $("#formproduto").submit(function(e) {

                var url = "../PHP/inserirProd.php"; // Qual pagina será chamada
                var form = $('#formproduto')[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    enctype:"multipart/form-data",
                    url: url,
                    data: data, // serializa os elementos do form
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        alert(data); // mostra o retorno do script php
                        if(data === "Produto inserido na loja com sucesso")
                        {
                            //Recarrega a pagina
                           window.location.reload();
                        }


                    }
                });

                e.preventDefault(); // evita o envio do form
            });

            function carragarProd(){
                var id = document.getElementById("produto").value;
                if(id != "-1")
                {
                    $.ajax({url: './../BD/dbProduto.php',
                        data: {action: 'produtoID', parametros: id},
                        dataType: 'json',
                        type: 'post',
                        success: function (dados) {
                            for(var i=0;dados.length>i;i++){
                                $("#descricao").attr("value", dados[i].cat);
                                $("#peso").attr("value",dados[i].peso);
                                $("#preco").attr("value", dados[i].precoVenda);
                            }
                        },
                        error: function() {
                            alert('Erro ao tentar buscar!');
                        }
                    });
                }
                else {
                    $("#descricao").attr("value", "Categoria...");
                    $("#peso").attr("value","");
                    $("#preco").attr("value", "0.00");
                }
            }
        </script>
    </body>
</html>
