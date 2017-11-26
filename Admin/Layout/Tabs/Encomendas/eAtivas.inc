<div class="col-sm-12">
    <h1><small>Encomendas Ativas</small></h1>
    <div class="table-responsive">
        <table class="table table-encomendas text-center">
            <thead>
            <tr>
                <th class="">Id</th>
                <th>Nome</th>
                <th>Data da encomenda</th>
                <th>Data prevista da entrega</th>
                <th>Visualizar</th>
                <th>Editar</th>
                <th>Finalizar</th>
                <th>Cancelar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $resultados = buscaEncomendasAtivas();
            while ($encomenda = $resultados->fetch_assoc()) {
                echo '<tr>';
                echo '<td data-id="'.$encomenda["id"].'" class="">'.$encomenda["id"].'</td>';
                echo "<td>".$encomenda["cliente"]."</td>";
                echo "<td>".$encomenda["dataEncomenda"]."</td>";
                echo empty($encomenda["dataEntregaPrev"]) ? "<td>--</td>" : "<td>".$encomenda["dataEntregaPrev"]."</td>";
                echo '<td><a <a data-toggle="tab" href="#visualizar" class="visualizar btn-tabela"><i class="glyphicon glyphicon-eye-open"></i></a></td>';
                echo '<td><a data-toggle="tab" href="#editar" class="editar btn-tabela"><i class="glyphicon glyphicon-edit"></i></a></td>';
                echo ' <td><a href="#" class="finalizar btn-tabela"><i class="glyphicon glyphicon-flag"></i></a></td>';
                echo ' <td><a href="#" class="remove btn-tabela"><i class="glyphicon glyphicon-remove"></i></a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>