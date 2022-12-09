<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="resources/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="js/login-register.js"></script>
    <script src="js/logout.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Lista de criptomonedas</title>

</head>
<?php
require "view/components/header.php"
?>

<body>
    <div class="container-fluid p-4 vh-100">
        <?php if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "admin") { ?>
                <div class='col-12 text-end py-4 pe-5'>
                    <button onclick="actualizar_valores()" type='sumbit' class='btn boton text-white' id='actualizar_valores'>Actualizar valores</button>
                </div>
        <?php }
        } ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col" class="d-none d-sm-table-cell">Market Cap.</th>
                    <th scope="col">24h %</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="cuerpo">

            </tbody>
        </table>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top sticky-bottom">
        <?php
        require "view/components/footer.html"
        ?>
    </footer>
</body>

</table>
<script src="js/tabla.js"></script>
<!-- <script src="js/tabla_favoritos.js"></script> -->
<script src="resources/bootstrap/js/jquery-3.6.1.js"></script>

</html>