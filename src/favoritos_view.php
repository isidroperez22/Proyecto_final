<?php
session_start();
if (!isset($_SESSION["role"])) {
    header("Location: https://coinfi-production.up.railway.app/");
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
    <div class="container-fluid vh-100 p-5 ">

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

</html>