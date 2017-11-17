$(function () {
    var atual_fs, next_fs, prev_fs;
    $(".next").on("click", function () {
        atual_fs = $(this).parent();
        next_fs = $(this).parent().next();

        $('#progresso li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide(800);
        next_fs.show(800);
    });
    $(".prev").on("click", function () {
        atual_fs = $(this).parent();
        prev_fs = $(this).parent().prev();

        $('#progresso li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        atual_fs.hide(800);
        prev_fs.show(800);
    });

});
//**/
