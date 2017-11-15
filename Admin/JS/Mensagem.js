function atualizar() {
    window.location = 'Mensagem.php';
}

function deletar() {
    var array_apagar = new Array();

    $("#tabela-entrada tbody tr").each(function () {
        var id = $(this).children('td:first-child').text();
        var selecionado = $(this).find('input:checkbox')[0].checked;

        if (selecionado) {
            array_apagar.push(id);
        }

    });

    if (array_apagar.length > 0) {
        var confirmacao = confirm("Tem certeza que deseja apagar as mensagens selecionadas?");
        if (confirmacao) {
            $.ajax({
                url: './../DB/dbMensagem.php',
                data: {action: 'apagarMensagensByID', parametros: array_apagar},
                type: 'post',
                success: function (output) {
                    alert(output);
                    atualizar();
                },
                error: function () {
                    alert('Erro ao tentar apagar mensagem!');
                }
            });
        } else
            atualizar();

    } else {
        alert("Selecione a mensagem a ser apagada.");
    }
}

function deletarLixeira() {
    var array_apagar = new Array();

    $("#tabela-Lixeira tbody tr").each(function () {
        var id = $(this).children('td:first-child').text();
        var selecionado = $(this).find('input:checkbox')[0].checked;

        if (selecionado) {
            array_apagar.push(id);
        }

    });

    if (array_apagar.length > 0) {
        var confirmacao = confirm("Tem certeza que deseja apagar permanentemente as mensagens selecionadas?");
        if (confirmacao) {
            $.ajax({
                url: './../DB/dbMensagem.php',
                data: {action: 'apagarMensagensLixeiraByID', parametros: array_apagar},
                type: 'post',
                success: function (output) {
                    alert(output);
                    atualizar();
                },
                error: function () {
                    alert('Erro ao tentar apagar mensagem!');
                }
            });
        } else
            atualizar();

    } else {
        alert("Selecione a mensagem a ser apagada.");
    }
}

$(function () {
    $(".ler").off('click').on('click', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        $('.nav.nav-pills.nav-stacked li').removeClass('active');
        $('.nav.nav-pills.nav-stacked li a').attr('aria-expanded', false);

        $.ajax({
            url: 'lerMensagem.php?id=' + id,
            type: 'get',
            success: function (output) {
                var conteudo = output;
                $("#msgconteudo").html(conteudo);

            },
            error: function () {
                alert('Erro ao tentar apagar mensagem!');
            }
        });
    });
});

function responderM() {
    var idMensagemLida = document.getElementById('idMensagemLida').firstChild.nodeValue;
    $('.nav.nav-pills.nav-stacked li').removeClass('active');
    $('.nav.nav-pills.nav-stacked li a').attr('aria-expanded', false);

    $.ajax({
        url: 'responderMensagem.php?id=' + idMensagemLida,
        type: 'get',
        success: function (output) {
            var conteudo = output;
            $("#respondermsg").html(conteudo);

        },
        error: function () {
            alert('Erro ao tentar apagar mensagem!');
        }
    });
}
