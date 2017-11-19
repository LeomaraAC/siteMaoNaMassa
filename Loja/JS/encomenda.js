/*Acrescenta o produto ao carrinho. Quando clicado mais de uma vez em cima do btn será adicionado + 1 a qtde do produto*/
$(function () {
    $(".btn-encomendarProd").on("click",function () {
        var id = $(this).attr('id');
        var parametro = new Array(id, "Loja");
        $.ajax({
            url: '../PHP/addCarrinho.php',
            encoding:"UTF-8",
            data: {action: 'addCarrinho', parametros: parametro},
            type: 'post',
            success: function (dados) {
                alert(dados);
                window.location = 'index.php';
            },
            error: function () {
                alert('Erro ao tentar encomendar o produto!');
            }
        });
    });
});
/*Remove uma unidade do produto selecionado*/
function diminui(id) {
    $.ajax({
        url: '../PHP/addCarrinho.php',
        encoding:"UTF-8",
        data: {action: 'removeCarrinho', parametros: id},
        dataType: 'json',
        type: 'post',
        success: function (dados) {
            var  idUni, subtotal, total, idTbl = '#qtde'+id;
            idUni = 'subT'+id;
            subtotal = document.getElementById(idUni).innerHTML;
            subtotal = convertToFloatNumber(subtotal);
            subtotal -= parseFloat(dados[1]);
            subtotal = formatNumber(subtotal);
            document.getElementById(idUni).innerHTML = subtotal;

            total = document.getElementById("total").innerHTML;
            total = convertToFloatNumber(total);
            total -= parseFloat(dados[1]);
            total = formatNumber(total);
            document.getElementById("total").innerHTML = total;

            $(idTbl).attr("value", dados[0]);
            if (dados[0] <= 0){
                var tr = '#tr'+id;
                $(tr).remove();
            }

        },
        error: function () {
            alert('Erro ao tentar remover um produto do carrinho!');
        }
    });
}
/*Acrescenta uma unidade ao produto*/
function acrescenta(id) {
    var parametro = new Array(id, "Carrinho");
    $.ajax({
        url: '../PHP/addCarrinho.php',
        encoding:"UTF-8",
        data: {action: 'addCarrinho', parametros: parametro},
        dataType: 'json',
        type: 'post',
        success: function (dados) {
            var idTbl, idUni, subtotal, total,
            idTbl = '#qtde'+id;
            idUni = 'subT'+id;
            subtotal = document.getElementById(idUni).innerHTML;
            subtotal = convertToFloatNumber(subtotal);
            subtotal = subtotal + parseFloat(dados[1]);
            subtotal = formatNumber(subtotal);
            document.getElementById(idUni).innerHTML = subtotal;

            total = document.getElementById("total").innerHTML;
            total = convertToFloatNumber(total);
            total = total + parseFloat(dados[1]);
            total = formatNumber(total);
            document.getElementById("total").innerHTML = total;

            $(idTbl).attr("value", dados[0]);

        },
        error: function () {
            alert('Erro ao tentar adicionar mais o produto ao carrinho!');
        }
    });
}
/*Essa função é responsavel por excluir uma linha da tabela e també da session*/
function remove(id) {
    $.ajax({
        url: '../PHP/addCarrinho.php',
        encoding:"UTF-8",
        data: {action: 'excluiCarrinho', parametros: id},
        type: 'post',
        success: function (dados) {
            var total;
            total = document.getElementById("total").innerHTML;
            total = convertToFloatNumber(total);
            total = total - parseFloat(dados);
            total = formatNumber(total);
            document.getElementById("total").innerHTML = total;
            var tr = '#tr'+id;
            $(tr).remove();
        },
        error: function () {
            alert('Erro ao tentar remover o produto do carrinho!');
        }
    });
}
/*Essa fuunção é responsavel por adição ou subtração de Produto. Ela é chamada quando o o text de qtde perde o foco.
É chamado o php que contem funções do carrinho e obtem como retorno o novo subtotal.
Caso o subtotal atual seja maior do anterior, a diferença será subtraida do valor Total.
Caso contrario, a diferença será adicionada ao valor total. No caso de a qtde ser 0, será removido da tabela. Em caso de números
impares é apresentado uma mensagem de erro.*/
function addProdDigitado(id) {
    var qtdDig = $("#qtde"+id).val();
    if (qtdDig > 0)
    {
        var parametro = new Array(id, qtdDig);
        $.ajax({
            url: '../PHP/addCarrinho.php',
            encoding:"UTF-8",
            data: {action: 'addCarrinhoDig', parametros: parametro},
            type: 'post',
            success: function (dados) {
                var idUni, subtotal, total,

                idUni = 'subT'+id;
                subtotal = document.getElementById(idUni).innerHTML;
                subtotal = convertToFloatNumber(subtotal);
                total = document.getElementById("total").innerHTML;
                total = convertToFloatNumber(total);
                dados = convertToFloatNumber(dados);
                if (dados > subtotal){
                    var diferenca = dados - subtotal;
                    subtotal += diferenca;
                    total += diferenca;
                    subtotal = formatNumber(subtotal);
                    total = formatNumber(total);
                    document.getElementById(idUni).innerHTML = subtotal;
                    document.getElementById("total").innerHTML = total;
                }
                else {
                    if (dados < subtotal){
                        var diferenca = subtotal - dados;
                        subtotal -= diferenca;
                        total -= diferenca;
                        subtotal = formatNumber(subtotal);
                        total = formatNumber(total);
                        document.getElementById(idUni).innerHTML = subtotal;
                        document.getElementById("total").innerHTML = total;
                    }
                }
            },
            error: function () {
                alert('Erro ao tentar remover o produto do carrinho!');
            }
        });
    }
    else {
        if (qtdDig == 0)
        {
            remove(id);
        }else {
            alert("O valor digitado é inválido");
        }
    }
}

/*Funções das mascaras de real*/
//Converte uma string em float.
var convertToFloatNumber = function(value) {
    value = value.toString();
    if (value.indexOf('.') !== -1 || value.indexOf(',') !== -1) {
        if (value.indexOf('.') >  value.indexOf(',')) {
            //inglês
            return parseFloat(value.replace(/,/gi,''));
        } else {
            //português
            return parseFloat(value.replace(/\./gi,'').replace(/,/gi,'.'));
        }
    } else {
        return parseFloat(value);
    }
};

//prototype para formatar a saída
Number.prototype.formatMoney = function (c, d, t) {
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

//Formata um número float utilizando máscara monetária
function formatNumber(value, decimals = 2) {
    value = convertToFloatNumber(value);
    return value.formatMoney(decimals, ',', '.');
}