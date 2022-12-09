<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once "model/Moneda.php";
require_once "model/Favorito.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="resources/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/login-register.js"></script>
    <script src="js/logout.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Lista de criptomonedas</title>

</head>
<?php
require "view/components/header.php"
?>

<body>
    <div class="container-fluid p-5">
        <?php if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "admin") { ?>
                <div class='col-12 text-end py-4 pe-5'>
                    <button onclick = "actualizar_valores()" type='sumbit' class='btn boton text-white' id='actualizar_valores'>Actualizar valores</button>
                </div>
        <?php }
        } ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col" class="d-none d-lg-block">Market Cap.</th>
                    <th scope="col">24h %</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                $monedas = new Moneda();
                
                foreach ($monedas->datos_monedas() as $key => $value) { // Imprime todas monedas de la tabla
                    echo "<tr>";
                    echo "<td>$value[nombre]</td>";
                    echo "<td>$value[price]</td>";
                    echo "<td class ='d-none d-lg-block'>$value[market_cap]</td>";
                    echo "<td>$value[change_h]</td>";
                    if ($_SESSION == null) {
                        $favorito = new Favorito("", "");
                    } else {
                        $favorito = new Favorito($value['id'], $_SESSION["id"]);
                    }
                    if (count($favorito->buscar_favoritos_cripto()) == 0) { // si la longitud del array es 0 significa que no esta en favoritos
                        echo "<td><a onclick = 'add_favoritos(`{$value['id']}`)'  id='{$value['id']}'><i class='bi bi-star-fill add_fav' id='add_fav'></i></a></td>";  // si no esta en favritos
                    } else {
                        echo "<td><a onclick = 'add_favoritos(`{$value['id']}`)'  id='{$value['id']}'><i class='bi bi-star-fill fav' id='fav'></i></a></td>"; // si esta en favritos
                    }
                    echo "</tr>";
                } ?>
            </tbody>
        </table>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top sticky-bottom">
        <?php
        require "view/components/footer.html"
        ?>
    </footer>
</body>
<script src="js/tabla_coins.js"></script>
<script src="resources/bootstrap/js/jquery-3.6.1.js"></script>
</table>

</html>