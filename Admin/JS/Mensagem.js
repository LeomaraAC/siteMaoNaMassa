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
        swal({
            title: 'Tem certeza?',
            text: "As mesagens irão para a lixeira!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Apague!',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: './../DB/dbMensagem.php',
                    data: {action: 'apagarMensagensByID', parametros: array_apagar},
                    type: 'post',
                    success: function (output) {
                        if (output === "Mensagem excluida com sucesso!") {
                            swal(
                                'Sucesso',
                                output,
                                'success'
                            ).then(function () {
                                window.setTimeout(function () {
                                    location.reload()
                                }, 90);
                            })
                        }
                        else {
                            swal(
                                'Oops...',
                                output,
                                'error'
                            )
                        }
                    },
                    error: function () {
                        swal(
                            'Oops...',
                            'Erro ao tentar apagar mensagem!',
                            'error'
                        )
                    }
                });
            }else {
                window.setTimeout(function () {
                    location.reload()
                }, 190);
            }
        });

    } else {
        swal(
            'Oops...',
            'Selecione a mensagem a ser apagada!',
            'error'
        )
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
        swal({
            title: 'Tem certeza?',
            text: "As mesagens selecionadas serão apagadas permanentemente!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Apague!',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: './../DB/dbMensagem.php',
                    data: {action: 'apagarMensagensLixeiraByID', parametros: array_apagar},
                    type: 'post',
                    success: function (output) {
                        if (output === "Mensagem excluida da lixeira com sucesso!") {
                            swal(
                                'Sucesso',
                                output,
                                'success'
                            ).then(function () {
                                window.setTimeout(function () {
                                    location.reload()
                                }, 90);
                            })
                        }
                        else {
                            swal(
                                'Oops...',
                                output,
                                'error'
                            )
                        }
                    },
                    error: function () {
                        swal(
                            'Oops...',
                            'Erro ao tentar apagar mensagem!',
                            'error'
                        )
                    }
                });
            }else {
                window.setTimeout(function () {
                    location.reload()
                }, 190);
            }
        });


    } else {
        swal(
            'Oops...',
            'Selecione a mensagem a ser apagada!',
            'error'
        )
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
                swal(
                    'Oops...',
                    'Erro ao tentar abrir a mensagem para ler!',
                    'error'
                )
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
            swal(
                'Oops...',
                'Erro ao tentar abrir a mensagem para responder!',
                'error'
            )
        }
    });
}
