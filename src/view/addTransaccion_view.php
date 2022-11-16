<div class="row">
    <div class="col-12 pt-5 ps-5">
        <h1 class="">Agregar activo</h1>
    </div>
    <div class="col-12 pt-5 ps-5 pe-3">
        <form action="#" method="post" id="form_addCripto" name="form_addCripto">
            <div class="mb-3">
                <!-- <input type="text" class="form-control" value="" name="usuario"> -->
                <label for="" class="form-label">Selecciona la criptomoneda</label>
                <select type="text" class="form-select" name="criptomoneda">
                    <?php
                    require_once "../model/Moneda.php";
                    $moneda = new Moneda();
                    foreach ($moneda->datos_monedas() as $key => $value) {
                        echo "<option id=$value[id] value='$value[id]'>$value[nombre]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <input hidden type="text" class="form-control" value="<?php echo date("Y-m-d") ?>" name="fecha">
                <label for="" class="form-label">Cantidad</label>
                <input require type="number" class="form-control" name="cantidad">
            </div>
            <button type="button" class="btn text-white boton btn-add" id="btn_form">Editar</button>
            </form>
    </div>
</div>