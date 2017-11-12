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
                $tipo = $_GET["opcao"];
                $id = array("Relatórios");
                include("../Layout/localizacao.inc");
                ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-solid">
                            <div class="box-header borda">
                                <h3 class="titulo">Menu</h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <?php
                                    include '../Layout/subMenu/menuRelatorios.inc';
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <h3 class="box-title">Relatório -  
                                    <?php
                                    if ($tipo == "prodMensal") {
                                        echo 'Produção Mensal';
                                    } elseif ($tipo == "prodEncomendados") {
                                        echo 'Produtos encomendados(ativos e finalizados)';
                                    } elseif ($tipo == "prodVendidos") {
                                        echo 'Produtos Vendidos';
                                    } else {
                                        echo 'Despesas/Receita';
                                    }
                                    ?>
                                </h3>
                            </div>
                        </div>
                        <div class='col-sm-11 col-sm-offset-1'>
                            <div class="form-group">
                                <div class="col-sm-3 ">    
                                    De:
                                    <input  type="date" class="form-control">
                                </div>  
                                <div class="col-sm-3 col-sm-offset-1">    
                                    À:
                                    <input  type="date" class="form-control">
                                </div> 
                                <div class="col-sm-4">
                                    <button class="btn btn-ativo">
                                        <i class="glyphicon glyphicon-search"></i>
                                        Filtrar
                                    </button>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 tamanhoMinimo">
                        <canvas class="graficos"></canvas>

                    </div>                      
                </div>

            </div>
            <?php
            include '../Layout/footer.inc';
            ?>
        </div>
        <script src="../Bibliotecas/JQuery/jquery-3.2.1.min.js"></script>
        <script src="../Bibliotecas/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="../Bibliotecas/JQuery/jquery.nicescroll.min.js"></script>
        <script src="../JS/custom.js"></script> 
        <script src="../Bibliotecas/ChartJS/node_modules/chart.js/dist/Chart.min.js"></script>
        <script>
            var pagina = "<?php echo $tipo; ?>";
            var ctx = document.getElementsByClassName("graficos");
            //Type, Data, options
            if (pagina === "prodMensal")
            {
                //Grafico de linha
                var grafico = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                        datasets: [{
                                label: 'Qtde de Produtos',
                                data: [5, 10, 16, 1, 25, 13, 94, 0, 25, 10, 8, 10],
                                //borderWidth: 6,
                                borderColor: 'rgba(77,166,253,0.85)',
                                backgroundColor: 'rgba(77,166,253,0.85)',
                                fill: false
                            }]
                    },
                    options: {
                        maintainAspectRatio: true,
                        title: {
                            display: true,
                            fontSize: 20,
                            text: "Produção Mensal"
                        },
                        scales: {
                            xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Mês'
                                    }
                                }],
                            yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Unidades'
                                    }
                                }]
                        }

                    }
                });
            } else if ((pagina === "prodEncomendados") != (pagina === "prodVendidos")) {
                var grafico = new Chart(ctx, {
                    type: 'doughnut',
                    data: {datasets: [{
                                data: [5, 10, 16, 1, 25, 13],
                                backgroundColor: [
                                    'red',
                                    'orange',
                                    'yellow',
                                    'green',
                                    'blue',
                                    'pink'
                                ]
                            }],
                        labels: [
                            "Red",
                            "Orange",
                            "Yellow",
                            "Green",
                            "Blue",
                            "Pink"
                        ]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            fontSize: 20,
                            text: 'Encomendas(ativas e Finalizadas)'
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                });
            } else {
                var grafico = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                        datasets: [{
                                label: 'Despesas',
                                data: [5, 10, 16, 1, 25, 13, 94, 0, 25, 10, 8, 10],
                                //borderWidth: 6,
                                borderColor: 'rgba(77,166,253,0.85)',
                                backgroundColor: 'rgba(77,166,253,0.85)'
                            }, {
                                label: 'Receitas',
                                data: [5, 10, 16, 1, 25, 13, 94, 0, 25, 10, 8, 10],
                                //borderWidth: 6,
                                borderColor: 'green',
                                backgroundColor: 'green'
                            }]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            fontSize: 20,
                            text: "Produção Mensal"
                        },
                        scales: {
                            xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Mês'
                                    }
                                }],
                            yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Unidades'
                                    }
                                }]
                        }

                    }
                });
            }

        </script>
    </body>
</html>
