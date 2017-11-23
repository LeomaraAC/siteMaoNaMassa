$("#editEncomenda").submit(function (e) {
    var url = "../PHP/editarEncomenda.php"; // Qual pagina será chamada

    var form = $('#editEncomenda')[0];
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
            if (data === "Alterações realizadas com sucesso!") {
                //Recarrega a pagina
                window.location.reload();
            }


        }
    });
    e.preventDefault();
});