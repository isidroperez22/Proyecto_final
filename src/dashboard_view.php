<?php
session_start();
if(!isset($_SESSION["role"])){
    header("Location: /proyecto/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="resources/bootstrap/js/jquery-3.6.1.js"></script>
    <script src="resources/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/views.js"></script>
    <script src="js/logout.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php
    require "view/components/header.php"
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php require "view/components/sideBar.php"; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="contenido">
            </main>
        </div>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-5 border-top sitcky-bottom">
        <?php
        require "view/components/footer.php"
        ?>
    </footer>
</body>

</html>