<?php
require_once "../model/Transaccion.php";

$transaccion = new Transaccion($_SESSION["id"], "", "", "");

echo json_encode($transaccion->mostrar_transacciones());
