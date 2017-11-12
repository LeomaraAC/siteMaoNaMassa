/* Customizando a barra de rolagem da div sidebar-wrapper */
$(document).ready(function () {
    $("#sidebar-wrapper").niceScroll({
        cursorcolor: '#212121',
        cursorwidth: 4,
        cursorborder: 'none'
    });
});


/* menu-toggle  */
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $("#topnav").toggleClass("toggled");
    $("#footer-content").toggleClass("toggled");
});

/* Fim menu-toggle  
 tooltip */
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
/* Fim tooltip */

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