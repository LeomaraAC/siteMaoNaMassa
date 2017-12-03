<div class="row margin-bottom-30">
    <div class="col-sm-12">
        <h1>
            <small>
                Relatório - Produção Mensal
            </small>
        </h1>
    </div>
    <div class='col-sm-11 col-sm-offset-1'>
        <form id="relatorioMensal">
            <div class="form-inline text-center">
                <div class="form-group">
                    <label for="de">De:</label>
                    <input type="month" class="form-control" id="de" name="de">
                </div>
                <div class="form-group">
                    <label for="para">À:</label>
                    <input type="month" class="form-control" id="para" name="para">
                </div>
                <div class="form-group padding-bottom-17">
                    <button class="btn btn-ativo">
                        <i class="glyphicon glyphicon-search"></i>
                        Filtrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 tamanhoMinimo">
        <canvas class="graficosMensal"></canvas>
    </div>
</div>