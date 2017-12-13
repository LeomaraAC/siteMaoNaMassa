<div class="row margin-bottom-30">
    <div class="col-sm-12">
        <h1>
            <small>
                Relatório - Despesas/Receita
            </small>
        </h1>
    </div>
    <div class='col-sm-11 col-sm-offset-1'>
        <form id="relatorioDespesasReceita">
            <div class="form-inline text-center">
                <div class="form-group">
                    <label for="deR">De:</label>
                    <input type="month" class="form-control" id="deR" name="deR">
                </div>
                <div class="form-group">
                    <label for="paraR">À:</label>
                    <input type="month" class="form-control" id="paraR" name="paraR">
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
        <canvas class="graficosReceita"></canvas>

    </div>
</div>
