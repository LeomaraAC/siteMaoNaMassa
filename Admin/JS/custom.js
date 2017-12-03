var ps = new PerfectScrollbar('#sidebar');
$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#menu-topo').toggleClass('active');
        $('#content').toggleClass('active');
        $('#footer').toggleClass('active');

    });
    $(".todos").off("click").on("click", function() {
        if ($(".todos > i").hasClass('glyphicon-unchecked'))
        {
            $(".todos > i").removeClass('glyphicon-unchecked');
            $(".todos > i").addClass('glyphicon-check');
            $('input[type=checkbox]').prop('checked', true);

        } else
        {
            $(".todos > i").removeClass('glyphicon-check');
            $(".todos > i").addClass('glyphicon-unchecked');
            $('input[type=checkbox]').prop('checked', false);
        }
    });



});
function readURL(input, classe) {
    if (input.files && input.files[0]) {
        var reader = new FileReader(); //Lê os dados do arquivo e armazena na variavel reader
        reader.onload = function (e) {
            $(classe).attr('src', e.target.result); // O src da classe img-perfil irá receber o caminho da nova imagem
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});