$(function () {
    var atual_fs, next_fs, prev_fs;
    /*Função responsavel por fazer a ação next dos botões do carrinho*/
    $(".next").on("click", function () {
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();

        $('#progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide(800);
        next_fs.show(800);
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
                alert(data);
                // mostra o retorno do script php
                if (data === "Pedido realizado com sucesso. Entraremos em contato para confirmar") {
                    //Recarrega a pagina
                    window.location = 'index.php';
                }

            },
            error: function () {
                alert('Erro Catastrófico!');
            }
        });
        e.preventDefault();
    });

});
//**/
