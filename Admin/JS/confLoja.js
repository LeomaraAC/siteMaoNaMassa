$("#destaque").submit(function (e) {
    var id = $("#prod").val();
    if (id != "")
    {
        $.ajax({
            url: './../Arquivos/confgLoja.php',
            data: {action: 'destaque', parametros: id},
            type: 'post',
            success: function (output) {
                if (output === "Destaque salvo com sucesso!") {
                    swal(
                        'Sucesso',
                        output,
                        'success'
                    ).then(function () {
                        window.setTimeout(function () {
                            location.reload();
                        }, 90);
                    })
                }
                else {

                    swal(
                        'Oops...',
                        output,
                        'error'
                    )
                }
            },
            error: function () {
                swal(
                    'Oops...',
                    'Erro ao tentar salvar destaque!',
                    'error'
                )
            }
        });
    }else {
        swal(
            'Oops...',
            'Selecione um produto para destaque',
            'error'
        )
    }

    e.preventDefault();
});
$("#atualizaImg").submit(function (e) {

    var sobre = $("#image-sobre").val();
    var fabricacao = $("#image-fabricacao").val();
    if (sobre != "" || fabricacao != "")
    {
        var form = $('#atualizaImg')[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            enctype: "multipart/form-data",
            url: './../PHP/img_confgLoja.php',
            data: data,
            processData: false,
            contentType: false,
            success: function (output) {
                if (output === "OK") {
                    swal(
                        'Sucesso',
                        'Alterações realizadas com sucesso',
                        'success'
                    ).then(function () {
                        window.setTimeout(function () {
                            location.reload();
                        }, 90);
                    })
                }
                else {

                    swal(
                        'Oops...',
                        output,
                        'error'
                    )
                }
            },
            error: function () {
                swal(
                    'Oops...',
                    'Erro ao tentar altualizar as imagens!',
                    'error'
                )
            }
        });
    }else {
        swal(
            'Oops...',
            'Nenhuma imagem foi modificada!',
            'error'
        )
    }

    e.preventDefault();
});
$("#Sobre").submit(function (e){
    var url = "../Arquivos/salvar.php";
    var form = $('#Sobre')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.localeCompare("OK") == 0) {
                swal(
                    'Sucesso',
                    'Arquivo quem somos foi salvo com sucesso!',
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
                'Erro ao tentar salvar o arquivo \'Sobre!\'',
                'error'
            )
        }
    });
    e.preventDefault();
});
$("#Fabricacao").submit(function (e){
    var url = "../Arquivos/salvar.php";
    var form = $('#Fabricacao')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.localeCompare("OK") == 0) {
                swal(
                    'Sucesso',
                    'Arquivo como são feitos foi salvo com sucesso!',
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
                'Erro ao tentar salvar o arquivo \'Fabricação!\'',
                'error'
            )
        }
    });
    e.preventDefault();
});
$("#Contato").submit(function (e){
    var url = "../Arquivos/salvar.php";
    var form = $('#Contato')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
            //if ({
            if (data.localeCompare("OK") == 0)  {
                swal(
                    'Sucesso',
                    'Arquivo contato foi salvo com sucesso!',
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
                'Erro ao tentar salvar o arquivo \'Contato!\'',
                'error'
            )
        }
    });
    e.preventDefault();
});
$("#Localizacao").submit(function (e){
    var url = "../Arquivos/salvar.php";
    var form = $('#Localizacao')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.localeCompare("OK") == 0) {
                swal(
                    'Sucesso',
                    'Arquivo localização foi salvo com sucesso!',
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
                'Erro ao tentar salvar o arquivo \'Localização!\'',
                'error'
            )
        }
    });
    e.preventDefault();
});
$("#carrossel").submit(function (e) {
    var id0 = $("#produto0").val();
    var id1 = $("#produto1").val();
    var id2 = $("#produto2").val();
    if (id0 != "" && id1 != "" && id2 != "")
    {
        var array = new Array();
        array.push(id0,id1,id2);
        $.ajax({
            url: './../Arquivos/confgLoja.php',
            data: {action: 'carrossel', parametros: array},
            type: 'post',
            success: function (output) {
                if (output === "Carrossel salvo com sucesso!") {
                    swal(
                        'Sucesso',
                        output,
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
                        output,
                        'error'
                    )
                }
            },
            error: function () {
                swal(
                    'Oops...',
                    'Erro ao tentar apagar mensagem!',
                    'error'
                )
            }
        });
    }else {
        swal(
            'Oops...',
            'Selecione um produto para cada item do carrossel!',
            'error'
        )
    }
    e.preventDefault();
});


