$("#formproduto").submit(function (e) {
    var url = "../PHP/inserirProd.php"; // Qual pagina será chamada
    var form = $('#formproduto')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: url,
        data: data, // serializa os elementos do form
        processData: false,
        contentType: false,
        success: function (data) {
            if (data === "Produto inserido na loja com sucesso!") {
                swal(
                    'Sucesso',
                    data,
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
                    data,
                    'error'
                )
            }
        },
        error: function () {
            swal(
                'Oops...',
                'Erro ao tentar  inserir na loja',
                'error'
            )
        }
    });

    e.preventDefault(); // evita o envio do form
});
$(function () {
    $(document).on('click', '#remove', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        swal({
            title: 'Tem certeza?',
            text: "O produto não será removido do sistema desktop!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Restaure!',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value){
                $.ajax({
                    url: './../DB/dbProduto.php',
                    data: {action: 'removeProduto', parametros: id},
                    type: 'POST',
                    success: function (dados) {
                        if (dados === "Produto removido da loja com sucesso!") {
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
                            'Erro ao tentar remover!',
                            'error'
                        )
                    }
                });
            }
        });
        e.preventDefault();
    });
});

function carragarProd(id, form, cont) {
    if (id == "-1" || id == "-2" || id == "-3" || id == "-4" || id == "-5") {
        switch (id) {
            case "-1": /*Id da pagina de produtos*/
                $("#descricao").attr("value", "Categoria...");
                $("#peso").attr("value", "");
                $("#preco").attr("value", "0.00");
                break;
            case "-2": /*Produto 1 do carrossel*/
                $("#img0").attr("src","../Imagens/produtos/padrao.png");
                break;
            case "-3": /*Produto 2 do carrossel*/
                $("#img1").attr("src","../Imagens/produtos/padrao.png");
                break;
            case "-4": /*Produto 3 do carrossel*/
                $("#img2").attr("src","../Imagens/produtos/padrao.png");
                break;
            case "-5": /*Destaque*/
                $("#prodDestaque").attr("src", "../Imagens/produtos/padrao.png");
                break;
        }
    }
    else {
        $.ajax({
            url: './../DB/dbProduto.php',
            data: {action: 'produtoID', parametros: id},
            dataType: 'json',
            type: 'post',
            success: function (dados) {
                switch (form){
                    case "addProd":
                        $("#descricao").attr("value", dados[0].cat);
                        $("#peso").attr("value", dados[0].peso);
                        $("#preco").attr("value", dados[0].precoVenda);
                        /*var url = dados[i].url;
                        if (url != "")
                        {
                            $("#img-produto").attr("src",dados[0].url);
                        }*/
                        break;
                    case "destaque":
                        $("#prodDestaque").attr("src", dados[0].url);
                        break;
                    case "carrossel":
                        for (var i = 0; dados.length > i; i++) {
                            switch (cont) {
                                case 0:
                                    $("#img0").attr("src",dados[i].url);
                                    break;
                                case 1:
                                    $("#img1").attr("src", dados[i].url);
                                    break;
                                case 2:
                                    $("#img2").attr("src", dados[i].url);
                                    break;
                            }
                        }
                        break;
                }

            },
            error: function () {
                swal(
                    'Oops...',
                    'Erro ao tentar buscar o produto!',
                    'error'
                )
            }
        });
    }
}

$(function () {
    $(".editar").off('click').on('click', function (e) {
        var id = $(this).closest('tr').find('td[data-id]').data('id');
        $('.nav.nav-pills.nav-stacked li').removeClass('active');
        $('.nav.nav-pills.nav-stacked li a').attr('aria-expanded', false);

        $.ajax({
            url: 'editaProd.php?id=' + id,
            type: 'get',
            success: function (output) {
                var conteudo = output;
                $("#edit").html(conteudo);

            },
            error: function () {
                swal(
                    'Oops...',
                    'Erro ao tentar Editar o produto!',
                    'error'
                )
            }
        });
    });
});
