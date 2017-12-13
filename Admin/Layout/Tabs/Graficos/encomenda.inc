<div class="row margin-bottom-30">
    <div class="col-sm-12">
        <h1>
            <small>
                Relatório - Produtos encomendados
            </small>
        </h1>
    </div>
    <div class='col-sm-11 col-sm-offset-1'>
        <form id="relatorioEncomendas">
            <div class="form-inline text-center">
                <div class="form-group">
                    <label for="de">De:</label>
                    <input type="month" class="form-control" id="deEnc" name="deEnc">
                </div>
                <div class="form-group">
                    <label for="para">À:</label>
                    <input type="month" class="form-control" id="paraEnc" name="paraEnc">
                </div>
                <div class="form-group padding-bottom-17">
                    <button class="btn btn-ativo">
                        <i class="glyphicon glyphicon-search"></i>
                        Filtrar
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center">
            <label class="radio-inline"><input type="radio" name="opcoes" value="Finalizada" checked>Finalizadas</label>
            <label class="radio-inline"><input type="radio" name="opcoes" value="Aceito">Ativas</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 tamanhoMinimo">
        <canvas class="graficosEncomendas"></canvas>

    </div>
</div>