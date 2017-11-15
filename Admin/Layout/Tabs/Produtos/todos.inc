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
        $resultado = todosProdutosVisiveis(false);
        while ($produto = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td data-id='" . $produto["idProd"] . "'>" . $produto["idProd"] . "</td>";
            echo "<td>" . $produto["prod"] . "</td>";
            echo "<td>" . $produto["cat"] . "</td>";
            echo '<td><a data-toggle = "tab" href="#editar" class="editar"><i class="glyphicon glyphicon-edit"></i></a></td>';
            echo '<td> <a id="remove" href="#" class="editar"><i class="glyphicon glyphicon-remove"></i></a></td>';
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>