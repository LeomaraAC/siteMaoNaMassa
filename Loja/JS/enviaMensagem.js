$("#envioMensagem").submit(function (e) {
    var url = "../DB/Mensagem.php"; // Qual pagina será chamada

    var form = $('#envioMensagem')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data === "OK") {
                swal(
                    'Sucesso',
                    'Mensagem enviada com sucesso!',
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