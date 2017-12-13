function teclaNum(){
    evt = window.event;
    var tecla = evt.keyCode;
    if(tecla < 48 || tecla > 57){
        evt.preventDefault();
    }
}

var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {onKeyPress: function(val, e, field, options) {
        field.mask(maskBehavior.apply({}, arguments), options);
    }
    };

$(document).ready(function(){
    $('.tel').mask(maskBehavior, options);
});
function teclaLetra() {
    evt = window.event;
    var tecla = evt.keyCode;
    if ((tecla < 65 || tecla > 90) && (tecla < 97 || tecla > 122) && tecla != 32)
    {
        evt.preventDefault();
    }
}