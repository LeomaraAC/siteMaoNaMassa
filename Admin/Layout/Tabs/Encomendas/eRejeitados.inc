<div class="col-sm-12">
    <h3 class="box-title">Encomendas Rejeitadas</h3>
    <div class="table-responsive">
        <table class="table table-encomendas text-center">
            <thead>
            <tr>
                <th class="">Id</th>
                <th>Nome</th>
                <th>Data da encomenda</th>
                <th>Produto - Quantidade</th>
                <th width="5%">Recuperar</th>
                <th width="5%">Excluir</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $resultados = buscaEncomendasRecusado();
            while ($encomenda = $resultados->fetch_assoc()) {
                $prod_qtde = buscaEncomendaByNumEncomenda($encomenda["id"]);
                echo '<tr>';
                echo '<td data-id="'.$encomenda["id"].'" class="">'.$encomenda["id"].'</td>';
                echo "<td>".$encomenda["cliente"]."</td>";
                echo "<td>".$encomenda["data"]."</td>";
                echo '<td>';
                while ($prod = $prod_qtde->fetch_assoc()){
                    echo $prod["descricao"]." - ".$prod["qtde"]."<br>";
                }
                echo '</td>';
                echo '<td><a href="#" class="restaurar btn-tabela"><i class="glyphicon glyphicon-ok"></i></a></td>';
                echo ' <td><a href="#" class="excluir btn-tabela"><i class="glyphicon glyphicon-trash"></i></a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>