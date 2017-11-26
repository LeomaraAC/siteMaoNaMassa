<?php
$dados = encomendasPopulares();
?>
<div class="row margin-bottom-30">
    <div class="col-sm-12">
        <h1>
            <small>
                Relatório - Produtos
            </small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 tamanhoMinimo">
        <canvas class="graficosMaisVenda"></canvas>

    </div>
</div>
<script src="../Bibliotecas/ChartJS/node_modules/chart.js/dist/Chart.min.js"></script>
<script>
    var produtos = new Array();
    var qtde = new Array();
</script>
<?php
while ($r = $dados->fetch_assoc()){
    echo "<script>produtos.push('".$r["descricao"]."')</script>";
    echo "<script>qtde.push('".$r["qtde"]."')</script>";
}
?>
<script>
    var cores = new Array();
    var cont = 0;

    while(cont < produtos.length)
    {
        var cor = gerarCor();
        cores.push(cor);
        cont++;
    }

    var ctx = document.getElementsByClassName("graficosMaisVenda");
    var grafico = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: qtde,
                backgroundColor: cores
            }],
            labels: produtos
        },
        options: {
            maintainAspectRatio: true,
            legend: {
                position: 'top'
            },
            title: {
                display: true,
                fontSize: 20,
                text: 'Encomendas populares no site'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });

    function gerarCor(){
        r = [(Math.floor( Math.random() * 255)), (Math.floor( Math.random() * 255)),(Math.floor( Math.random() * 255))];


        color_aleatorio = 'rgb('+r[0]+', '+r[1]+', '+r[2]+')';
        //alert(color_aleatorio);
        return color_aleatorio
    }
</script>
