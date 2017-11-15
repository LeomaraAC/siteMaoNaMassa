$("#destaque").submit(function (e) {
    var id = $("#prod").val();
    if (id != "")
    {
        $.ajax({
            url: './../Arquivos/confgLoja.php',
            data: {action: 'destaque', parametros: id},
            type: 'post',
            success: function (output) {
                alert(output);
                window.location.reload();
            },
            error: function () {
                alert('Erro ao tentar apagar mensagem!');
            }
        });
    }else {
        alert("Selecione uma opção");
    }

    e.preventDefault();
});

$("#carrossel").submit(function (e) {
    var id0 = $("#produto0").val();
    var id1 = $("#produto1").val();
    var id2 = $("#produto2").val();
    if (id0 != "" && id1 != "" && id2 != "")
    {
        var array = new Array();
        array.push(id0,id1,id2);
        $.ajax({
            url: './../Arquivos/confgLoja.php',
            data: {action: 'carrossel', parametros: array},
            type: 'post',
            success: function (output) {
                alert(output);
                window.location.reload();
            },
            error: function () {
                alert('Erro ao tentar apagar mensagem!');
            }
        });
    }else {
        alert("Selecione uma opção");
    }
    e.preventDefault();
});


