$("#formeditado").ready(function () {
    var id = $("#idProduto").val();
    $.ajax({
        url: '../DB/dbProduto.php',
        encoding:"UTF-8",
        data: {action: 'produtoID', parametros: id},
        dataType: 'json',
        type: 'post',
        success: function (dados) {
            $("#pesoEdit").attr("value", dados[0].peso);
            $("#statusEdit").val(dados[0].Status);
            $("#medidasEdit").val(dados[0].unidade);

        },
        error: function () {
            alert('Erro ao tentar carregar o carrossel!');
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
            alert(data); // mostra o retorno do script php
            if (data === "Produto editado com sucesso") {
                //Recarrega a pagina
                window.location.reload();
            }


        }
    });
    e.preventDefault();
});