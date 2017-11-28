<div class="col-sm-12">
    <h1><small>Encomendas Pendentes</small></h1>
    <div class="table-responsive">
        <table class="table table-encomendas text-center">
            <thead>
            <tr>
                <th class="">Id</th>
                <th>Nome</th>
                <th>Data da encomenda</th>
                <th>Visualizar</th>
                <th>Aceitar</th>
                <th>Rejeitar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $resultados = buscaEncomendasPendentes();
            while ($encomenda = $resultados->fetch_assoc()) {
               echo '<tr>';
               echo '<td data-id="'.$encomenda["id"].'" class="">'.$encomenda["id"].'</td>';
               echo "<td>".$encomenda["cliente"]."</td>";
               echo "<td>".$encomenda["data"]."</td>";
                echo '<td><a <a data-toggle="tab" href="#visualizar" class="visualizar btn-tabela"><i class="glyphicon glyphicon-eye-open"></i></a></td>';
                echo '<td><a href="#" class="aceitar btn-tabela"><i class="glyphicon glyphicon-ok"></i></a></td>';
               echo ' <td><a href="#" class="remove btn-tabela"><i class="glyphicon glyphicon-remove"></i></a></td>';
               echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>