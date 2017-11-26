<div class="row margin-bottom-30">
    <div class="col-sm-12">
        <h1>
            <small>
                Relatório - Produtos Vendidos
            </small>
        </h1>
    </div>
    <div class='col-sm-11 col-sm-offset-1'>
        <div class="form-inline text-center">
            <div class="form-group">
                <label for="de">De:</label>
                <input type="date" class="form-control" id="de" name="de">
            </div>
            <div class="form-group">
                <label for="para">À:</label>
                <input type="date" class="form-control" id="para" name="para">
            </div>
            <div class="form-group padding-bottom-17">
                <button class="btn btn-ativo">
                    <i class="glyphicon glyphicon-search"></i>
                    Filtrar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 tamanhoMinimo">
        <canvas class="graficosVenda"></canvas>

    </div>
</div>
<script src="../Bibliotecas/ChartJS/node_modules/chart.js/dist/Chart.min.js"></script>
<script>
    var ctx = document.getElementsByClassName("graficosVenda");
    var grafico = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [5, 10, 13],
                backgroundColor: [
                    '#00FFFF',
                    '#FF69B4',
                    '#A020F0'
                ]
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow"
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
</script>
