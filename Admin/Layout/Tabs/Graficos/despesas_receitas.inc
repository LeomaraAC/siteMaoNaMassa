<div class="row margin-bottom-30">
    <div class="col-sm-12">
        <h1>
            <small>
                Relatório - Despesas/Receita
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
        <canvas class="graficosReceita"></canvas>

    </div>
</div>
<script src="../Bibliotecas/ChartJS/node_modules/chart.js/dist/Chart.min.js"></script>
<script>
    var ctx = document.getElementsByClassName("graficosReceita");
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
</script>
