/**
 * Função para criar o grafico de Linhas
 */
function criarGraficoLinhas(ctx,txtLabe, dadosX, dadosY, eixoX, eixoY, titulo) {
    var grafico = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dadosX,
            datasets: [{
                label: txtLabe,
                data: dadosY,
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
                text: titulo
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: eixoX
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: eixoY
                    }
                }]
            }
        }
    });
}
function prodMensal() {
    $.ajax({
        url:  "../DB/dbBuscasRelatorios.php",
        data: {action: 'producaoMensal'},
        dataType: 'json',
        type: "POST",
        success: function (data) {
            if (data[0] != "ERRO")
            {
                var mes = new Array();
                var qtde = new Array();
                var cont = 0;
                while (cont < data.length){
                    mes.push(data[cont].mes);
                    qtde.push(data[cont].qtde);
                    cont++;
                }
                var ctx = document.getElementsByClassName("graficosMensal");
                criarGraficoLinhas(ctx,"Qtde de Produtos",mes,qtde,"Mês","Unidades", "Produção Mensal");
            }else {
                swal(
                    'Oops...',
                    'Nenhum registro encontrado no banco de dados!',
                    'error'
                )
            }

        },
        error: function() {
            swal(
                'Oops...',
                'Erro ao tentar buscar o produto!',
                'error'
            )
        }
    });
}

/**
 * Carregamento da tab com o grafico da produção mensal
 */
$("#prodMensal").ready(function () {
    prodMensal();
});
$("#graficoIndex").ready(function () {
    prodMensal();
});
$("#relatorioMensal").submit(function (e) {
    var de = $("#de").val();
    var ate = $("#para").val();
    var datas = [de,ate];
    $.ajax({
        url:  "../DB/dbBuscasRelatorios.php",
        data: {action: 'producaoMensalFiltro', parametros: datas},
        dataType: 'json',
        type: "POST",
        success: function (data) {
            if (data[0] != "ERRO")
            {
                var mes = new Array();
                var qtde = new Array();
                var cont = 0;
                while (cont < data.length){
                    mes.push(data[cont].mes);
                    qtde.push(data[cont].qtde);
                    cont++;
                }
                var ctx = document.getElementsByClassName("graficosMensal");
                criarGraficoLinhas(ctx,"Qtde de Produtos",mes,qtde,"Mês","Unidades", "Produção Mensal");
            }else {
                swal(
                    'Oops...',
                    'Nenhum dado registrado nessa data!',
                    'error'
                ).then(function () {
                    window.setTimeout(function () {
                        location.reload()
                    }, 70);
                })
            }
        },
        error: function () {
            swal(
                'Oops...',
                'Erro ao tentar gerar o gráfico de produção mensal!',
                'error'
            )
        }
    });
    e.preventDefault();
});


/**
 * Carregamento da tab com o grafico das encomendas
 */
$('input:radio[name="opcoes"]').change(
    function(){
        if (this.checked && this.value == 'Finalizadas') {
            encomendasFinalizadas();
        }else {
            encomendasAtivas();
        }
    });
function encomendasFinalizadas() {
    $.ajax({
        url:  "../DB/dbBuscasRelatorios.php",
        data: {action: 'encomendasMensal'},
        dataType: 'json',
        type: "POST",
        success: function (data) {
            if (data[0] != "ERRO")
            {
                var mes = new Array();
                var qtde = new Array();
                var cont = 0;
                while (cont < data.length){
                    mes.push(data[cont].mes);
                    qtde.push(data[cont].qtde);
                    cont++;
                }
                var ctx = document.getElementsByClassName("graficosEncomendas");
                criarGraficoLinhas(ctx,"Qtde de Encomendas",mes,qtde,"Mês","Unidades", "Quantidades mensais de encomendas finalizadas");
            }else {
                swal(
                    'Oops...',
                    'Nenhum registro encontrado no banco de dados!',
                    'error'
                )
            }

        },
        error: function() {
            swal(
                'Oops...',
                'Erro ao tentar buscar o produto!',
                'error'
            )
        }
    });
}
function encomendasAtivas() {
    $.ajax({
        url:  "../DB/dbBuscasRelatorios.php",
        data: {action: 'encomendasMensalAtivas'},
        dataType: 'json',
        type: "POST",
        success: function (data) {
            if (data[0] != "ERRO")
            {
                var mes = new Array();
                var qtde = new Array();
                var cont = 0;
                while (cont < data.length){
                    mes.push(data[cont].mes);
                    qtde.push(data[cont].qtde);
                    cont++;
                }
                var ctx = document.getElementsByClassName("graficosEncomendas");
                criarGraficoLinhas(ctx,"Qtde de Encomendas",mes,qtde,"Mês","Unidades", "Quantidades mensais de encomendas aceitas");
            }else {
                swal(
                    'Oops...',
                    'Nenhum registro encontrado no banco de dados!',
                    'error'
                )
            }

        },
        error: function() {
            swal(
                'Oops...',
                'Erro ao tentar buscar o produto!',
                'error'
            )
        }
    });
}
$("#prodEnc").ready(function () {
    encomendasFinalizadas();
});

$("#relatorioEncomendas").submit(function (e) {
    var de = $("#deEnc").val();
    var ate = $("#paraEnc").val();
    var datas = [de,ate];
    $.ajax({
        url:  "../DB/dbBuscasRelatorios.php",
        data: {action: 'encomendasMensalFiltro', parametros: datas},
        dataType: 'json',
        type: "POST",
        success: function (data) {
            if (data[0] != "ERRO")
            {
                var mes = new Array();
                var qtde = new Array();
                var cont = 0;
                while (cont < data.length){
                    mes.push(data[cont].mes);
                    qtde.push(data[cont].qtde);
                    cont++;
                }
                var ctx = document.getElementsByClassName("graficosEncomendas");
                criarGraficoLinhas(ctx,"Qtde de Encomendas",mes,qtde,"Mês","Unidades", "Quantidades mensais de encomendas finalizadas");
            }else {
                swal(
                    'Oops...',
                    'Nenhum dado registrado nessa data!',
                    'error'
                ).then(function () {
                    window.setTimeout(function () {
                        location.reload()
                    }, 70);
                })
            }
        },
        error: function () {
            swal(
                'Oops...',
                'Erro ao tentar gerar o gráfico de encomendas mensais!',
                'error'
            )
        }
    });
    e.preventDefault();
});