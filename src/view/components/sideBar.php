<nav id="" class="col-md-3 col-lg-2 d-md-block sidebar fixed-left sidebarMenu">
    <div class="position-sticky pt-3 sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-white text-uppercase fw-bold">
            <span>Mi portfolio</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white dashboard" aria-current="page" href="#">
                <i class="bi bi-graph-up"></i>
                     Resumen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white add_transaccion" aria-current="page" href="#">
                <i class="bi bi-currency-bitcoin"></i><i class="bi bi-plus"></i>
                    Agregar activo
                </a>
            </li>
        </ul>
        <?php if ($_SESSION["role"] == "admin") { ?>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white text-uppercase fw-bold">
                <span>Panel de administrador</span>
            </h6>

            <a class="nav-link text-white p-3" data-bs-toggle="collapse" href="#criptos" role="button" aria-expanded="false" aria-controls="criptos">Criptomonedas</a>
            <div class="collapse multi-collapse ps-4" id="criptos">
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link text-white addCoin_view" href="#">
                            <i class="bi bi-plus"></i>
                            Añadir criptomonedas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white delCoin_view" href="#">
                            <i class="bi bi-trash"></i>
                            Eliminar criptomonedas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white editCoin_view" href="#">
                            <i class="bi bi-pencil"></i>
                            Editar criptomonedas
                        </a>
                    </li>
                </ul>
            </div>

            <a class="nav-link text-white p-3" data-bs-toggle="collapse" href="#usuario" role="button" aria-expanded="false" aria-controls="usuario">Usuarios</a>
            <div class="collapse multi-collapse ps-4" id="usuario">
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link text-white delUser_view" href="#">
                            <i class="bi bi-trash"></i>
                            Eliminar usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white editUser_view" href="#">
                            <i class="bi bi-pencil"></i>
                            Editar usuarios
                        </a>
                    </li>
                </ul>
            </div>
        <?php } ?>
</nav>