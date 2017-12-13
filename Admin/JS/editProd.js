$("#formeditado").ready(function () {
    var id = $("#idProduto").val();
    $.ajax({
        url: '../DB/dbProduto.php',
        encoding: "UTF-8",
        data: {action: 'produtoID', parametros: id},
        dataType: 'json',
        type: 'post',
        success: function (dados) {
            $("#pesoEdit").attr("value", dados[0].peso);
            $("#statusEdit").val(dados[0].status);
            $("#medidasEdit").val(dados[0].unidade);

        },
        error: function () {
            swal(
                'Oops...',
                'Erro ao tentar carregar o produto!',
                'error'
            )
        }
    });
});
$("#formeditado").submit(function (e) {
    var url = "../PHP/editarProd.php"; // Qual pagina será chamada
    var form = $('#formeditado')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data === "Produto editado com sucesso!") {
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
                'Erro ao tentar editar o produto!',
                'error'
            )
        }
    });
    e.preventDefault();
});