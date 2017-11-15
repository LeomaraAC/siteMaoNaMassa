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
            alert(data); // mostra o retorno do script php
            if (data === "Produto inserido na loja com sucesso") {
                //Recarrega a pagina
                window.location.reload();
            }


        }
    });

    e.preventDefault(); // evita o envio do form
});
$(function () {
    $(document).on('click', '#remove', function (e) {
        var confirmacao = confirm("Tem certeza que deseja remover o produto selecionado da loja?\nO produto não será removido do sistema desktop.");
        if (confirmacao) {
            var id = $(this).closest('tr').find('td[data-id]').data('id');
            $.ajax({
                url: './../DB/dbProduto.php',
                data: {action: 'removeProduto', parametros: id},
                type: 'POST',
                success: function (dados) {
                    alert(dados);
                    if (dados === "Produto removido da loja com sucesso") {
                        //Recarrega a pagina
                        window.location.reload();
                    }
                },
                error: function () {
                    alert('Erro ao tentar remover!');
                }
            });
        }
    });
});

function carragarProd(id, form, cont) {
    if (id != "-1") {
        $.ajax({
            url: './../DB/dbProduto.php',
            data: {action: 'produtoID', parametros: id},
            dataType: 'json',
            type: 'post',
            success: function (dados) {
                if (form === "addProd") {
                    for (var i = 0; dados.length > i; i++) {
                        $("#descricao").attr("value", dados[i].cat);
                        $("#peso").attr("value", dados[i].peso);
                        $("#preco").attr("value", dados[i].precoVenda);
                        $("#img-produto").attr("src",dados[i].url);
                    }
                }
                else {
                    if (form === "destaque") {
                        for (var i = 0; dados.length > i; i++) {
                            $("#prodDestaque").attr("src", dados[i].url);
                        }
                    } else {
                        if (form === "carrossel") {
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
                        }
                    }
                }

            },
            error: function () {
                alert('Erro ao tentar buscar!');
            }
        });
    }
    else {
        $("#descricao").attr("value", "Categoria...");
        $("#peso").attr("value", "");
        $("#preco").attr("value", "0.00");
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
                alert('Erro ao tentar Editar o produto!');
            }
        });
    });
});
