<div class="col-sm-12">
    <h3 class="box-title">Encomendas Pendentes</h3>
    <div class="table-responsive">
        <table class="table table-encomendas text-center">
            <thead>
            <tr>
                <th class="">Id</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Data da encomenda</th>
                <th>Produto - Quantidade</th>
                <th>Aceitar</th>
                <th>Rejeitar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $resultados = buscaEncomendasPendentes();
            while ($encomenda = $resultados->fetch_assoc()) {
                $prod_qtde = buscaEncomendaByNumEncomenda($encomenda["id"]);
               echo '<tr>';
               echo '<td data-id="'.$encomenda["id"].'" class="">'.$encomenda["id"].'</td>';
               echo "<td>".$encomenda["cliente"]."</td>";
               echo empty($encomenda["tel"]) ? "<td>--</td>" : "<td>".$encomenda["tel"]."</td>";
               echo empty($encomenda["cel"]) ? "<td>--</td>" : "<td>".$encomenda["cel"]."</td>";
               echo empty($encomenda["email"]) ? "<td>--</td>" : "<td>".$encomenda["email"]."</td>";
               echo "<td>".$encomenda["data"]."</td>";
               echo '<td>';
               while ($prod = $prod_qtde->fetch_assoc()){
                   echo $prod["descricao"]." - ".$prod["qtde"]."<br>";
               }
               echo '</td>';
                echo '<td><a href="#" class="aceitar btn-tabela"><i class="glyphicon glyphicon-ok"></i></a></td>';
               echo ' <td><a href="#" class="remove btn-tabela"><i class="glyphicon glyphicon-remove"></i></a></td>';
               echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>