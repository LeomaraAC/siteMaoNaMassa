function teclaLetra() {
    evt = window.event;
    var tecla = evt.keyCode;
    if ((tecla < 65 || tecla > 90) && (tecla < 97 || tecla > 122) && tecla != 32 && (tecla < 44 || tecla > 46))
    {
        evt.preventDefault();
    }
}
function teclaNumLetra(){
    evt = window.event;
    var tecla = evt.keyCode;
    if((tecla < 48 || tecla > 57)&&(tecla < 65 || tecla > 90) && (tecla < 97 || tecla > 122) ){
        evt.preventDefault();
    }
}

$(document).ready(function(){
    $(".pesoProd").mask("# ##0,0", {reverse: true});
});

