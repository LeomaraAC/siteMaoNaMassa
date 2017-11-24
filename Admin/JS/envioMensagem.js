$("#envioMensagem").submit(function (e) {
    var url = "../PHP/envioEmail.php"; // Qual pagina será chamada

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
                    'Email enviado com sucesso!',
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
$("#descartar").on("click",function () {
    swal({
        title: 'Tem certeza?',
        text: "Todo o conteúdo será perdido!",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, Descarte!',
        cancelButtonText: 'Cancelar'
    }).then(function (result) {
        if (result.value) {
            window.setTimeout(function () {
                location.reload()
            }, 90);
        }
    });
})