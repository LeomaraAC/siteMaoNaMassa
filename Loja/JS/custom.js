/* Customizando a barra de rolagem da div sidebar-wrapper */
$(document).ready(function () {
    $("#sidebar-wrapper").niceScroll({
        cursorcolor: '#212121',
        cursorwidth: 4,
        cursorborder: 'none'
    });
});


/* Função responsavel por abrir e fechar o menu lateral esquerdo*/
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $("#topnav").toggleClass("toggled");
    $("#footer-content").toggleClass("toggled");
});

/* Função do tooltip */
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

/*Função que é responsavel por abrir e fechar o menu lateral direito, o que possui as opçõe de tema*/
$(document).ready(function () {
    $('#voltar, .overlay').on('click', function () {
        $('#nav-config').removeClass('active');
        $('#sidebar-wrapper').removeClass('z-index');
        $('#topnav').removeClass('z-index');
        $('.overlay').fadeOut();
    });

    $('#abrirConfg, #abrirConfgxs').on('click', function (e) {
        e.preventDefault();
        $('#nav-config').addClass('active');
        $('.overlay').fadeIn();
        $('#sidebar-wrapper').addClass('z-index');
        $('#topnav').addClass('z-index');
    });
});