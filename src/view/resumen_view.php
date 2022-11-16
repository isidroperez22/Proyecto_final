<div class="row mb-2 ps-3">
    <div class="col-sm-12">
        <h1 class="pt-5">Dashboard v3</h1>
    </div>
    <div class="col-lg-6 p-5">
        <div class="card">
            <div class="card-body">
                <div class="position-relative mb-4">
                    <canvas id="myChart" class="chartjs p-5"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 p-5">
        <div class="card">
            <div class="card-body">
                <div class="position-relative mb-4">
                    <p class="fs-3 fw-semibold">Total:</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-2 ps-3">
    <div class="col-sm-12 py-5">
        <h2 class="">MI PORTFOLIO</h2>
        
    </div>
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require_once "../model/Transaccion.php";
                    session_start();
                    $transaccion = new Transaccion($_SESSION["id"], "", "", "", "");
                    if ($transaccion->mostrar_transacciones() == 0) {
                        echo "<tr>";
                        echo "</tr>";
                        
                    } else {
                        foreach ($transaccion->mostrar_transacciones() as $key => $value) {
                            if($value['Total']>0){
                                echo "<tr>";
                                echo "<td>{$value['Nombre']}</td>";
                                echo "<td>{$value['Precio']} €</td>";
                                echo "<td>{$value['Cantidad']} </td>";
                                echo "<td>{$value['Total']} €</td>";
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>