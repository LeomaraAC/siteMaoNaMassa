$("#formTrocaSenha").submit(function (e) {
    var senhaAntiga = $("#senhaAntiga").val();
    var senhaNova = $("#senhaNova").val();
    var senhaConfirma = $("#confirmaSenha").val();
    var id = $("#senhaAntiga").data("id");// pega o atributo data-id que esta no campo senhaAntiga
    if (senhaConfirma != "" || senhaNova != "" || senhaAntiga != "") {
        var informacoesEnviar = new Array();
        informacoesEnviar.push(senhaAntiga, senhaNova, id);
        if (senhaNova == senhaConfirma) {
            $.ajax({
                url: './../DB/dbUsuario.php',
                data: {action: 'trocarSenha', parametros: informacoesEnviar},
                type: 'post',
                success: function (output) {
                    if (output === "Senha alterada com sucesso!") {
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
                        'Erro ao tentar trocar senha!',
                        'error'
                    )
                }
            });
        }
        else{
            swal(
                'Oops...',
                'Os campos \'Senha\' e \'Confirma senha\' devem ser iguais!',
                'error'
            )
        }
    }
    else {
        swal(
            'Oops...',
            'Obrigatório o preenchimento de todos os campos!',
            'error'
        )
    }
    e.preventDefault();
});
$("#formperfil").submit(function (e) {
    var user = $("#nome").val();
    var email = $("#email").val();
    if (email != "" && user != "")
    {
        var form = $('#formperfil')[0];
        var data = new FormData(form);
        //var  data = jQuery( this ).serialize();
        $.ajax({
            url: './../PHP/editaPerfil.php',
            enctype: "multipart/form-data",
            data: data,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (output) {
                if (output === "Perfil alterado com sucesso!") {
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
                    'Erro ao tentar editar o perfil!',
                    'error'
                )
            }
        });
    }
    else
    {
        swal(
            'Oops...',
            'Obrigatório o preenchimento de todos os campos!',
            'error'
        )
    }
    e.preventDefault();
});