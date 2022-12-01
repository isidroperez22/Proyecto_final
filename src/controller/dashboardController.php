<?php
require_once "../model/Transaccion.php";

session_start();

$transaccion = new Transaccion($_SESSION["id"], "", "", "");

echo json_encode($transaccion->mostrar_transacciones());
