<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 " id="delCoin">
    <h1 class="h2">Editar monedas</h1>
</div>
<table class="table" id="table">
    <thead>
        <tr></tr>
        <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "../../model/Moneda.php";
        $monedas = new Moneda();
        foreach ($monedas->datos_monedas() as $key => $value) {
            echo "<tr>";
            echo "<td>$value[nombre]</td>";
            echo "<td><a href='' class='link-dark click' data-bs-toggle='modal' data-bs-target='#coin' id=$value[id]><i class='bi bi-pencil-fill'></i></a></td>";
            echo "</tr>";
        } ?>
    </tbody>
</table>

<div class="modal fade" id="coin" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="form_edit" name="form_edit">
                    <div class="mb-3">
                        <input type="hidden" id="id" name="id">
                        <label for="" class="form-label t">Nombre</label>
                        <input type="text" class="form-control" id="nombre_coin" name="nombre_coin">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label t">Color</label>
                        <input type="text" class="form-control" id="color_coin" name="color_coin" placeholder="#FFFFFF">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label ">Descripcion</label>
                        <textarea  class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn text-white boton" id="btn-edit-coin">Editar</button>
            </div>
            </form>
        </div>
    </div>
</div>