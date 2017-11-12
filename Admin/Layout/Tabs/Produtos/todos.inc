<div class="white-box">
    <h3 class="box-title">Produtos</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Remover da Loja</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $resultado = todosProdutosVisiveis();
            while ($produto = $resultado->fetch_assoc())
            {
                echo "<tr>";
                echo "<td data-id='".$produto["idProd"]."'>".$produto["idProd"]."</td>";
                echo "<td>".$produto["prod"]."</td>";
                echo "<td>".$produto["cat"]."</td>";
                echo '<td><i class="glyphicon glyphicon-edit"></i></td>';
                echo '<td id="remove"><i class="glyphicon glyphicon-remove"></i></td>';
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>