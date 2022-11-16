<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 " id="delCoin">
    <h1 class="h2">Eliminar usuarios</h1>
</div>
<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "../../model/Usuario.php";
        $usuario = new Usuario();
        foreach ($usuario->mostrar_usuarios() as $key => $value) {
            echo "<tr>";
            echo "<td>$value[id]</td>";
            echo "<td>$value[nombre]</td>";
            echo "<td><a class='link-dark click' href='#' id='{$value['id']}'><i class='bi bi-trash-fill'></i></a></td>";
            echo "</tr>";
        } ?>
    </tbody>
</table>