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
            if (data === "Alterações realizadas com sucesso!") {
                // Caso a alteração tenha sido um sucesso, abre-se um alert exibindo a messagem e recarrega a pagina.
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
        }
    });
    e.preventDefault();
});