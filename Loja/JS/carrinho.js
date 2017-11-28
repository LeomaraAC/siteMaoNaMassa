function validaEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail))
        return true
    else
        return false
}

$(function () {
    var atual_fs, next_fs, prev_fs;

    /*Função responsavel por fazer a ação next dos botões do carrinho*/

    function next(botao) {
        atual_fs = $(botao).parent();
        next_fs = $(botao).parent().next();

        $('#progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide(800);
        next_fs.show(800);
    };
    $('input[name = next1]').on("click", function () {
        next($(this));
    });

    $('input[name = next2]').on("click", function () {
        var form = $('form[name = formCarrinho]');
        var array = form.serializeArray();
        var tam = array.length;
        if ((array[tam-4].value != "")){ //Verifica se o nome foi informado
            if (array[tam-3].value == "" && array[tam-2].value == "" && array[tam-1].value == ""){ // verifica se algum contato foi informado
                swal(
                    'Oops...',
                    'Deve ser informado algum tipo de contato para avançar!',
                    'error'
                )
            }else if(array[tam-1].value != ""){
                if (validaEmail($('#email').val()))
                    next($(this));
                else {
                    swal(
                        'Oops...',
                        'Email inválido!',
                        'error'
                    )
                }
            }
            else
                next($(this));
        }
        else{
            swal(
                'Oops...',
                'O campo "Nome" deve ser preenchido para avançar!',
                'error'
            )
        }
    });

    /*Função responsavel por fazer a ação prev dos botões do carrinho*/
    $(".prev").on("click", function () {
        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();

        $('#progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        atual_fs.hide(800);
        prev_fs.show(800);
    });
    /*Função responsavel por fazer o submit do form, via ajax*/
    $("#Finalizar").on("click", function (e) {
        var url = "../PHP/enviarPedido.php"; // Qual pagina será chamada
        var form = $('#formCarrinho')[0];
        var data = new FormData(form);
        //var data = jQuery("formCarrinho").serialize();
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
                        'Pedido realizado com sucesso',
                        'Entraremos em contato para confirmar!',
                        'success'
                    ).then(function () {
                        window.setTimeout(function () {
                            window.location = 'index.php';
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
                    'Erro Catastrófico!',
                    'error'
                )
            }
        });
        e.preventDefault();
    });

});
//**/
