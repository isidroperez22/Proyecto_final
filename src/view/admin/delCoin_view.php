<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 " id="delCoin">
    <h1 class="h2">Eliminar monedas</h1>
</div>
<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "../../model/Moneda.php";
        $monedas = new Moneda();
        foreach ($monedas->datos_monedas() as $key => $value) {
            echo "<tr>";
            echo "<td>$value[nombre]</td>";
            echo "<td><a class='link-dark click' id='{$value['id']}'><i class='bi bi-trash-fill'></i></a></td>";
            echo "</tr>";
        } ?>
    </tbody>
</table>