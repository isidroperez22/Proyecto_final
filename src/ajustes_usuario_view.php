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
    <script src="resources/bootstrap/js/jquery-3.6.1.js"></script>
    <script src="resources/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/logout.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>Ajuste de usuario</title>
</head>

<body>
    <?php require_once "view/components/header.php" ?>
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-sm-12 col-md-10 col-xl-6 p-5 form_edit_usuario">
                <div class="col-12 pb-5 text-center">
                    <h1 class="text-uppercase fw-bold">Ajustes de usuario</h1>
                </div>
                <div class="">
                    <form action="#" method="post" id="form_edit" class="form_edit">
                        <input hidden type="text" value="<?php echo $_SESSION["id"] ?>" name="id">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION["usuario"] ?>" name="usuario">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION["nombre"] ?>" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION["apellido"] ?>" name="apellido">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?php echo $_SESSION["email"] ?>" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" minlength="8" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirmar contraseña</label>
                            <input type="password" minlength="8" class="form-control" name="confirm_password">
                        </div>
                        <div role="alert" id="error1">

      </div>
                        <div class="text-end">
                            <button type="button" class="btn text-white boton" id="btn_form_edit">Actualizar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto d-flex  justify-content-between align-items-center py-3 border-top sitcky-bottom">
        <?php
        require "view/components/footer.html"
        ?>
    </footer>
    <script src="js/upadateUser.js"></script>
</body>

</html>