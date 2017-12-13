/**
 * Função para criar o grafico de Linhas
 */
function criarGraficoLinhas(ctx,txtLabe, dadosX, dadosY, eixoX, eixoY, titulo) {
    return new Chart(ctx, {
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
function gerarProdMensal(mes, qtde) {
    var ctx = document.getElementsByClassName("graficosMensal");
    if (typeof window.grafico_prodMensal === 'undefined'){
        window.grafico_prodMensal  = criarGraficoLinhas(ctx,"Qtde de Produtos",mes,qtde,"Mês","Unidades", "Produção Mensal");
    }
    else {
        let data = {
            labels: mes,
            datasets: [{
                label: "Qtde de Produtos",
                data: qtde,
                borderColor: 'rgba(77,166,253,0.85)',
                backgroundColor: 'rgba(77,166,253,0.85)',
                fill: false
            }]
        };
        window.grafico_prodMensal.config.data = data;
        window.grafico_prodMensal.update();
    }
}
function prodMensal() {
    $.ajax({
        url:  "../DB/dbBuscasGraficos.php",
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
                gerarProdMensal(mes,qtde);
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
    if (de == "" || ate == ""){
        swal(
            'Oops...',
            'Preencha o intervalo da data para poder filtrar!',
            'error'
        )
    }
    else{
        var datas = [de,ate];
        $.ajax({
            url:  "../DB/dbBuscasGraficos.php",
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
                    gerarProdMensal(mes,qtde);
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
    }
    e.preventDefault();
});


/**
 * Carregamento da tab com o grafico das encomendas
 */
$('input:radio[name="opcoes"]').change(
    function(){
        $("#deEnc").val("");
        $("#paraEnc").val("");
        if (this.checked && this.value == 'Finalizada') {
            encomendasFinalizadas();
        }else {
            encomendasAtivas();
        }
    });
function gerarEncomenda(mes,qtde, titulo) {
    var ctx = document.getElementsByClassName("graficosEncomendas");

    if (typeof window.grafico_encomenda === 'undefined'){
        window.grafico_encomenda  =
            criarGraficoLinhas(ctx,"Qtde de Encomendas",mes,qtde,"Mês","Unidades", titulo);
    }
    else {
        let data = {
            labels: mes,
            datasets: [{
                label: "Qtde de Encomendas",
                data: qtde,
                borderColor: 'rgba(77,166,253,0.85)',
                backgroundColor: 'rgba(77,166,253,0.85)',
                fill: false
            }]
        };
        window.grafico_encomenda.config.data = data;
        window.grafico_encomenda.update();
    }
}
function encomendasFinalizadas() {
    $.ajax({
        url:  "../DB/dbBuscasGraficos.php",
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
                gerarEncomenda(mes,qtde,"Quantidades mensais de encomendas finalizadas");
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
        url:  "../DB/dbBuscasGraficos.php",
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
                gerarEncomenda(mes,qtde,"Quantidades mensais de encomendas aceitas");
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
    var status = $("input[name='opcoes']:checked").val();
    if (de == "" || ate == ""){
        swal(
            'Oops...',
            'Preencha o intervalo da data para poder filtrar!',
            'error'
        )
    }
    else {
        var datas = [status,de,ate];
        $.ajax({
            url:  "../DB/dbBuscasGraficos.php",
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
                    gerarEncomenda(mes,qtde,"Quantidades mensais de encomendas finalizadas")
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
    }
    e.preventDefault();
});
/**
 * Criando gráficos de barras
 */
function criarGraficosBarras(ctx,txtLabe1,txtLabe2, dadosX, dadosY1,dadosY2, eixoX, eixoY, titulo) {
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dadosX,
            datasets: [{
                label: txtLabe1,
                data: dadosY1,
                borderColor: 'rgba(77,166,253,0.85)',
                backgroundColor: 'rgba(77,166,253,0.85)'
            }, {
                label: txtLabe2,
                data: dadosY2,
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

/** Função responsavel por montar o array dos mes */
function comparaMes(mes1, mes2) {
    var cont = 0;
    var cont2 = 0;
    var controle = false;
    if (mes1.length > mes2.length){
        var mes = mes2;
        while (cont < mes1.length){
            while (cont2 < mes.length && controle == false){
                if (mes1[cont] != mes[cont2]){
                    controle = false;
                }
                else
                    controle = true;
                cont2++;
            }
            if(!controle)
                mes.push(mes1[cont]);
            cont++;
            cont2 = 0;
            controle = false;
        }
    }else {
        var mes = mes1;
        while (cont < mes2.length){
            while (cont2 < mes.length && controle == false){
                if (mes2[cont] != mes[cont2]){
                    controle = false;
                }
                else{
                    controle = true;
                }
                cont2++;
            }
            if(!controle)
                mes.push(mes2[cont]);
            cont++;
            cont2 = 0;
            controle = false;
        }
    }
    mesOrder = mes.sort(function(a,b) {
        a = a.split("/");
        b = b.split("/")
        return new Date(a[1], a[0], 1) - new Date(b[1], b[0], 1)
    })
    return mesOrder;
}
/**
  Montando o grafico de revenda e devolução
 * */
function vendaSaida(tipo) {
    var retorno;
    $.ajax({
        url:  "../DB/dbBuscasGraficos.php",
        data: {action: 'entradaSaida', parametros: tipo},
        dataType: 'json',
        type: "POST",
        async: false,
        success: function (data) {
            if (data[0] != "ERRO")
            {
                retorno = data;
            }else {
                retorno = 'sem dado';
            }

        },
        error: function() {
            retorno = 'erro';
        }
    });
    return retorno;
}
function recebeDados(saida, entrada) {
    if (saida != "erro" || entrada != "erro"){
        if (saida != "sem dado" || entrada != "sem dado"){
            var ctx = document.getElementsByClassName("graficosVenda");
            var mesS = new Array();
            var mesE = new Array();
            var cont = 0;
            while (cont < saida.length){
                mesS.push(saida[cont].mes);
                cont++;
            }
            cont = 0;
            while (cont < entrada.length){
                mesE.push(entrada[cont].mes);
                cont++;
            }
            var mesOrdenado = comparaMes(mesE,mesS);
            var dadosSaida = saidaEntradaDados(saida,mesOrdenado);
            var dadosEntrada = saidaEntradaDados(entrada,mesOrdenado);

            if (typeof window.grafico_vendas === 'undefined') {
                window.grafico_vendas = criarGraficosBarras(ctx,'Revenda de produtos','Devolução de produtos',mesOrdenado,dadosSaida,dadosEntrada,'Mês','Quantidade','Quantidades mensais de revendas/devoluções');
            } else {
                let data = {
                    labels: mesOrdenado,
                        datasets: [{
                        label: 'Revenda de produtos',
                        data: dadosSaida,
                        borderColor: 'rgba(77,166,253,0.85)',
                        backgroundColor: 'rgba(77,166,253,0.85)'
                    }, {
                        label: 'Devolução de produtos',
                        data: dadosEntrada,
                        borderColor: 'green',
                        backgroundColor: 'green'
                    }]
                };
                window.grafico_vendas.config.data = data;
                window.grafico_vendas.update();
            }

        }
    }else {
        swal(
            'Oops...',
            'Erro ao tentar buscar os dados das revendas e devoluções!',
            'error'
        )
    }
}
function saidaEntradaDados(dados, mes) {
    var cont = 0;
    var cont2 = 0;
    var controle = false;
    var qtde = new Array();

    while (cont < mes.length){
        while (cont2 < dados.length && controle == false){
            if (dados[cont2].mes == mes[cont]){
                controle = true;
                qtde.push(dados[cont2].qtde);
            }
            cont2++;
        }
        if (!controle)
            qtde.push(0);

        cont2 = 0;
        controle = false;
        cont++;
    }
    return qtde;
}
function iniciaGrafico(saida, entrada) {
    var saida = vendaSaida(saida);
    var entrada = vendaSaida(entrada);
    recebeDados(saida,entrada);
}
$("#prodVend").ready(function () {
    iniciaGrafico(['normal','Venda'],['normal','Devolução']);
});
$("#relatorioVenda").submit(function (e) {
    var de = $("#deV").val();
    var ate = $("#paraV").val();
    if (de == "" || ate == ""){
        swal(
            'Oops...',
            'Preencha o intervalo da data para poder filtrar!',
            'error'
        )
    }
    else{
        iniciaGrafico(['filtro','Venda',de,ate],['filtro','Devolução',de,ate]);
    }
    e.preventDefault();
});

/**
 Montando o grafico Despesas/Receitas
 */
$("#relatorioDespesasReceita").submit(function (e) {
    var de = $("#deR").val();
    var ate = $("#paraR").val();
    if (de == "" || ate == ""){
        swal(
            'Oops...',
            'Preencha o intervalo da data para poder filtrar!',
            'error'
        )
    }
    else{
        var receita = receitaDespesas('receitaFiltro',[de,ate]);
        var despesas = receitaDespesas('despesasFiltro',[de,ate]);
        recebeDadosES(receita,despesas);
    }
    e.preventDefault();
});

$("#despesas_receitas").ready(function () {
    var receita = receitaDespesas('receita');
    var despesas = receitaDespesas('despesas');
    recebeDadosES(receita,despesas);

});

function receitaDespesas(tipo, filtro) {
    var retorno;
    $.ajax({
        url:  "../DB/dbBuscasGraficos.php",
        data: {action: tipo,parametros: filtro},
        dataType: 'json',
        type: "POST",
        async: false,
        success: function (data) {
            if (data[0] != "ERRO")
            {
                retorno = data;
            }else {
                retorno = 'sem dado';
            }

        },
        error: function() {
            retorno = 'erro';
        }
    });
    return retorno;
}
function recebeDadosES(receita, despesas) {
    if (receita != "erro" || despesas != "erro"){
        if (receita != "sem dado" || despesas != "sem dado"){
            var ctx = document.getElementsByClassName("graficosReceita");
            var mesR = new Array();
            var mesD = new Array();
            var cont = 0;
            while (cont < receita.length){
                mesR.push(receita[cont].data);
                cont++;
            }
            cont = 0;
            while (cont < despesas.length){
                mesD.push(despesas[cont].data);
                cont++;
            }
            var mes = comparaMes(mesD, mesR);
            var dadosR = receitaDespesasDados(receita,mes);
            var dadosD = receitaDespesasDados(despesas,mes);
            if (typeof  window.grafico_receita === 'undefined'){
                window.grafico_receita = criarGraficosBarras(ctx,'Receita','Despesas',mes,dadosR,dadosD,'Mês','Valor (R$)','Receita/Despesas mensais');
            }else {
                let data = {
                    labels: mes,
                    datasets: [{
                        label: 'Receita',
                        data: dadosR,
                        borderColor: 'rgba(77,166,253,0.85)',
                        backgroundColor: 'rgba(77,166,253,0.85)'
                    }, {
                        label: 'Despesas',
                        data: dadosD,
                        borderColor: 'green',
                        backgroundColor: 'green'
                    }]
                };
                window.grafico_receita.config.data = data;
                window.grafico_receita.update();
            }
        }
    }else {
        swal(
            'Oops...',
            'Erro ao tentar buscar os dados das revendas e devoluções!',
            'error'
        )
    }
}
/** Função responavel por montar os arrays de despesas e receitas*/
function receitaDespesasDados(dados, mes) {
    var cont = 0;
    var cont2 = 0;
    var controle = false;
    var preco = new Array();

    while (cont < mes.length){
       while (cont2 < dados.length && controle == false){
           if (dados[cont2].data == mes[cont]){
               controle = true;
               preco.push(dados[cont2].preco);
           }
           cont2++;
       }
       if (!controle)
           preco.push(0);

       cont2 = 0;
       controle = false;
       cont++;
    }
    return preco;
}