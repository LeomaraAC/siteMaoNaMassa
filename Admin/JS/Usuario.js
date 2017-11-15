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
                    alert(output);
                    if(output === "Senha alterada com sucesso")
                        window.location.reload();
                },
                error: function () {
                    alert('Erro ao tentar trocar senha!');
                }
            });
        }
        else
            alert("Os campos 'Senha' e 'Confirma senha' devem ser iguais.");
    }
    else {
        alert("Obrigatório o preenchimento de todos os campos.");
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
                alert(output);
                if(output === "Perfil alterado com sucesso")
                    window.location.reload();
            },
            error: function () {
                alert('Erro ao tentar editar o perfil!');
            }
        });
    }
    else
        alert("Obrigatório o preenchimento de todos os campos.");
    e.preventDefault();
});