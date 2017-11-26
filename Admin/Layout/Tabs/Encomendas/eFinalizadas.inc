<div class="col-sm-12">
    <h1><small>Encomendas Finalizadas</small></h1>
    <div class="table-responsive">
        <table class="table table-encomendas text-center">
            <thead>
            <tr>
                <th class="">Id</th>
                <th>Nome</th>
                <th>Data da encomenda</th>
                <th>Data da entrega</th>
                <th>Visualizar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $resultados = buscaEncomendasFinalizadas();
            while ($encomenda = $resultados->fetch_assoc()) {
                echo '<tr>';
                echo '<td data-id="'.$encomenda["id"].'" class="">'.$encomenda["id"].'</td>';
                echo "<td>".$encomenda["cliente"]."</td>";
                echo empty($encomenda["dataEncomenda"]) ? "<td>--</td>" : "<td>".$encomenda["dataEncomenda"]."</td>";
                echo empty($encomenda["dataF"]) ? "<td>--</td>" : "<td>".$encomenda["dataF"]."</td>";
                echo '<td><a <a data-toggle="tab" href="#visualizar" class="visualizar btn-tabela"><i class="glyphicon glyphicon-eye-open"></i></a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>