<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar informacion</title>
    <script src="js/informacion.js"></script>
    <script src="resources/bootstrap/js/jquery-3.6.1.js"></script>
    <script src="resources/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>
    <?php
    require "view/components/header.php";
    ?>
    <div class="container-fluid">
        <div class="row p-2 py-sm-5">
            <div class="col-6 col-sm-2 d-flex justify-content-center">
                <img id="img_info" height="100px" width="100px">
            </div>
            <div class="col-6 col-sm-6 d-flex pt-4 pt-sm-4">
                <h1 id="nombre_info"></h1>
            </div>
            <div class="col-6 col-sm-2 d-flex justify-content-center pt-4 pt-sm-4 ">
                <h1 id="precio_info"></h1>
            </div>
            <div class="col-6 col-sm-2 d-flex py-4 py-sm-3 ">
                <h1 id="24h_info"></h1>
            </div>
        </div>
        <div class="row p-2 p-sm-5 border-top borde">
            <h4 class="col-6"><strong>Descripcion</strong></h4>
        </div>
        <div class="row p-2 px-sm-5">
            <div class="col-12 col-sm-6 fs-6 pe-5 text d-flex">
                <p id="descripcion_info">
                <p>

            </div>
            <div class="col-6 col-sm-6 d-flex">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p id="market_cap_info"></p>
                        </li>
                        <li class="list-group-item">
                            <p id="24h_info2"></p>
                        </li>
                        <li class="list-group-item">
                            <p id="precio_info2"></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row p-2 px-sm-5">

        </div>

    </div>
</body>

</html>