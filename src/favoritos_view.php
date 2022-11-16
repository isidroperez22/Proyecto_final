<?php
session_start();
require_once "model/Favorito.php";
if (!isset($_SESSION["role"])) {
    header("Location: /proyecto/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.css">
    <script src="resources/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="resources/bootstrap/js/jquery-3.6.1.js"></script>
    <script src="js/logout.js"></script>
    <script src="js/tabla_favoritos.js"></script>
    <title>Lista de seguimiento</title>
</head>

<body>
    <?php require_once "view/components/header.php" ?>
    <div class="container-fluid p-5 ">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th class ='d-none d-lg-block' scope="col">Market Cap.</th>
                    <th scope="col">24h %</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php
            $favoritos = new Favorito("", $_SESSION["id"]);
            echo "<tbody id='tbody'>";
            if ($favoritos->mostrar_favoritos() == false) {
                echo "<p>No hay ningun favorito</p>";
            } else {
                foreach ($favoritos->mostrar_favoritos() as $key => $value) {
                    echo "<tr>";
                    echo "<td>$value[nombre]</td>";
                    echo "<td>$value[price]€</td>";
                    echo "<td class ='d-none d-lg-block'>$value[market_cap]€</td>";
                    echo "<td>$value[change_h]%</td>";
                    echo "<td><a onclick='del_favoritos(`{$value['id']}`)' id='{$value['id']}'><i class = 'bi bi-star-fill fav'></i></a></td>";
                    echo "</tr>";
                }
            }
            echo "</tbody>";
            ?>

        </table>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top sticky-bottom">
        <?php
        require "view/components/footer.php"
        ?>
    </footer>
</body>

</html>