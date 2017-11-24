$(function () {
    $(document).on('click', '.remove', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        swal({
            title: 'Tem certeza?',
            text: "A encomenda entrará na lista das encomendas rejeitadas!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Rejeite!',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: './../DB/dbEncomenda.php',
                    data: {action: 'recusarEncomenda', parametros: id},
                    type: 'POST',
                    success: function (dados) {
                        if (dados === "Encomenda rejeitada com sucesso!") {
                            swal(
                                'Sucesso',
                                dados,
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
                                dados,
                                'error'
                            )
                        }
                    },
                    error: function () {
                        swal(
                            'Oops...',
                            'Erro ao tentar recusar a encomenda!',
                            'error'
                        )
                    }
                });
            }
        })

    });

    $(document).on('click', '.aceitar', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        $.ajax({
            url: './../DB/dbEncomenda.php',
            data: {action: 'aceitarEncomenda', parametros: id},
            type: 'POST',
            success: function (dados) {
                if (dados === "Encomenda aceita com sucesso!") {
                    swal(
                        'Sucesso',
                        dados,
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
                        dados,
                        'error'
                    )
                }
            },
            error: function () {
                swal(
                    'Oops...',
                    'Erro ao tentar aceitar a encomenda!',
                    'error'
                )
            }
        });
    });
    $(document).on('click', '.excluir', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        swal({
            title: 'Tem certeza?',
            text: "O processo de exclusão não pode ser revertido!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Delete!',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: './../DB/dbEncomenda.php',
                    data: {action: 'excluirEncomenda', parametros: id},
                    type: 'POST',
                    success: function (dados) {
                        if (dados === "Encomenda excluida com sucesso!") {
                            swal(
                                'Sucesso',
                                dados,
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
                                dados,
                                'error'
                            )
                        }
                    },
                    error: function () {
                        swal(
                            'Oops...',
                            'Erro ao tentar excluir a encomenda',
                            'error'
                        )
                    }
                });
            }
        })
    });
    $(document).on('click', '.restaurar', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        swal({
            title: 'Tem certeza?',
            text: "A encomenda entrará na lista das encomendas pendentes!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Restaure!',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: './../DB/dbEncomenda.php',
                    data: {action: 'restaurarEncomenda', parametros: id},
                    type: 'POST',
                    success: function (dados) {
                        if (dados === "Encomenda restaurada com sucesso!") {
                            swal(
                                'Sucesso',
                                dados,
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
                                dados,
                                'error'
                            )
                        }
                    },
                    error: function () {
                        swal(
                            'Oops...',
                            'Erro ao tentar restaurar a encomenda!',
                            'error'
                        )
                    }
                });
            }
        })
    });
    $(document).on('click', '.finalizar', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        swal({
            title: 'Tem certeza?',
            text: "A encomenda entrará na lista das encomendas finalizadas!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Finalize!',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            $.ajax({
                url: './../DB/dbEncomenda.php',
                data: {action: 'finalizarEncomenda', parametros: id},
                type: 'POST',
                success: function (dados) {
                    if (dados === "Encomenda finalizada com sucesso!") {
                        swal(
                            'Sucesso',
                            dados,
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
                            dados,
                            'error'
                        )
                    }
                },
                error: function () {
                    swal(
                        'Oops...',
                        'Erro ao tentar finalizar a encomenda!',
                        'error'
                    )
                }
            });
        })
    });

    $(".editar").off('click').on('click', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        $('.nav.nav-pills.nav-stacked li').removeClass('active');
        $('.nav.nav-pills.nav-stacked li a').attr('aria-expanded', false);

        $.ajax({
            url: 'editarEncomenda.php?id=' + id,
            type: 'get',
            success: function (output) {
                $("#editar").html(output);

            },
            error: function () {
                swal(
                    'Oops...',
                    'Erro ao tentar editar a encomenda!',
                    'error'
                )
            }
        });
    });

    $(".visualizar").off('click').on('click', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        $('.nav.nav-pills.nav-stacked li').removeClass('active');
        $('.nav.nav-pills.nav-stacked li a').attr('aria-expanded', false);

        $.ajax({
            url: 'visualizarEncomenda.php?id=' + id,
            type: 'get',
            success: function (output) {
                $("#visualizar").html(output);

            },
            error: function () {
                swal(
                    'Oops...',
                    'Erro ao tentar visualizar a encomenda!',
                    'error'
                )
            }
        });
    });

});