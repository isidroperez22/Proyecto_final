<nav class="navbar navbar-expand-lg navbar-light nav-bar">
  <div class="container-fluid">
    <a class="navbar-brand text-white ps-3 pe-3 d-none d-lg-block" href="#"><img src="resources/img/logo-no-background.svg" alt="" width="50" height="70"></a>

    <a class="navbar-toggler link-dark" href="#" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-controls="navbarNav"><img src="resources/img/logo-no-background.svg" alt="" width="50" height="70"></a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav">
        <a class="nav-link text-white" id="inicio" aria-current="page" href="/proyecto/">Inicio</a>
        <a class="nav-link text-white" id="tablaMonedas" href="/proyecto/criptomonedas_view.php">Monedas</a>
        <?php if (isset($_SESSION["role"])) { ?><a class="nav-link text-white" id="tablaMonedas" href="/proyecto/favoritos_view.php">Lista de seguimiento</a> <?php } ?>
      </div>
    </div>
    <?php if (!isset($_SESSION["role"])) { ?>
      <button class="boton btn text-white " data-bs-toggle="modal" data-bs-target="#iniciarSesion" type="button">Iniciar Sesion</button>
  </div>
<?php } else { ?>
  <ul class="nav justify-content-end">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" id="desplegable" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"><i class="bi bi-person-circle"></i> <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"] ?></a>
    <ul class="dropdown-menu" aria-labelledby="desplegable">
      <li><a class="dropdown-item" href="dashboard_view.php">Mi portfolio</a></li>
      <li><a class="dropdown-item" href="ajustes_usuario_view.php">Ajustes de usuario</a></li>
    </ul>
    </li>

    <li class="nav-item">
      <button onclick="logout()" class="btn text-white"  type="button"><i class="bi bi-box-arrow-right"></i></button>
    </li>
  </ul>

<?php }  ?>

</nav>

<!--MODAL INICIAR SESION id="iniciarSesion" -->
<div class="modal fade" id="iniciarSesion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content nav-bar" id="">
      <div class="modal-header">
        <h1 class="text-white">Iniciar sesion</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id="form_login" name="form_login">
          <div class="mb-3">
            <label for="usuario" class="form-label text-white">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text-white">Contarseña</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
      </div>
      <div role="alert" id="error_login">

      </div>
      <div class="modal-footer">
        <button class="btn text-white boton" data-bs-toggle="modal" data-bs-target="#register" type="button">Registrate</button>
        <button type="submit" class="btn text-white boton">Iniciar sesion</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--MODAL REGISTRO id="register"-->
<div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content nav-bar">
      <div class="modal-header">
        <h1 class="text-white">Registrate</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="#" method="post" id="form_registro" class="form_registro">
          <div class="mb-3">
            <label for="nombre" class="form-label text-white" id="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white" id="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white" id="email">Correo electróinico</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white">Usuario</label>
            <input type="text" class="form-control" id="registro_usuario" name="usuario">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Contarseña</label>
            <input type="password" class="form-control" id="registro_password" name="password">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white">Repetir contraseña</label>
            <input type="password" minlength="8" class="form-control" id="confirm_password" name="confirm_password">
          </div>

          <div class="mb-3">
            <input hidden type="text" class="form-control" id="role" name="role" value="usuario">
          </div>
      </div>
      <div role="alert" id="error_register">

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn text-white boton">Registrarse</button>
      </div>
      </form>

    </div>
  </div>
</div>