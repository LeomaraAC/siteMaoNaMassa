$(function () {
    $(document).on('click', '.remove', function (e) {
        var confirmacao = confirm("Tem certeza que deseja rejeitar essa encomenda?");
        if (confirmacao) {
            var id = $(this).closest('tr').find('td[data-id]').data('id');
            $.ajax({
                url: './../DB/dbEncomenda.php',
                data: {action: 'recusarEncomenda', parametros: id},
                type: 'POST',
                success: function (dados) {
                    alert(dados);
                    if (dados === "Encomenda rejeitada com sucesso!") {
                        //Recarrega a pagina
                        window.location.reload();
                    }
                },
                error: function () {
                    alert('Erro ao tentar rejeitar encomenda!');
                }
            });
        }
    });

    $(document).on('click', '.aceitar', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        $.ajax({
            url: './../DB/dbEncomenda.php',
            data: {action: 'aceitarEncomenda', parametros: id},
            type: 'POST',
            success: function (dados) {
                alert(dados);
                if (dados === "Encomenda aceita com sucesso!") {
                    //Recarrega a pagina
                    window.location.reload();
                }
            },
            error: function () {
                alert('Erro ao tentar aceitar encomenda!');
            }
        });
    });
    $(document).on('click', '.excluir', function (e) {
        var confirmacao = confirm("Tem certeza que deseja excluir essa encomenda?");
        if (confirmacao) {
            var id = $(this).closest('tr').find('td[data-id]').data('id');
            $.ajax({
                url: './../DB/dbEncomenda.php',
                data: {action: 'excluirEncomenda', parametros: id},
                type: 'POST',
                success: function (dados) {
                    alert(dados);
                    if (dados === "Encomenda excluida com sucesso!") {
                        //Recarrega a pagina
                        window.location.reload();
                    }
                },
                error: function () {
                    alert('Erro ao tentar aceitar encomenda!');
                }
            });
        }
    });
    $(document).on('click', '.restaurar', function (e) {
        var confirmacao = confirm("Tem certeza que deseja restaurar essa encomeda para a lista de pendentes?");
        if (confirmacao) {
            var id = $(this).closest('tr').find('td[data-id]').data('id');
            $.ajax({
                url: './../DB/dbEncomenda.php',
                data: {action: 'restaurarEncomenda', parametros: id},
                type: 'POST',
                success: function (dados) {
                    alert(dados);
                    if (dados === "Encomenda restaurada com sucesso!") {
                        //Recarrega a pagina
                        window.location.reload();
                    }
                },
                error: function () {
                    alert('Erro ao tentar aceitar encomenda!');
                }
            });
        }
    });
    $(document).on('click', '.finalizar', function (e) {
        var confirmacao = confirm("Tem certeza que deseja finalizar essa encomeda?");
        if (confirmacao) {
            var id = $(this).closest('tr').find('td[data-id]').data('id');
            $.ajax({
                url: './../DB/dbEncomenda.php',
                data: {action: 'finalizarEncomenda', parametros: id},
                type: 'POST',
                success: function (dados) {
                    alert(dados);
                    if (dados === "Encomenda finalizada com sucesso!") {
                        //Recarrega a pagina
                        window.location.reload();
                    }
                },
                error: function () {
                    alert('Erro ao tentar aceitar encomenda!');
                }
            });
        }
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
                 alert('Erro ao tentar Editar o produto!');
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
                alert('Erro ao tentar Editar o produto!');
            }
        });
    });

});