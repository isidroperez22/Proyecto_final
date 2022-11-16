<?php
require_once "../model/Transaccion.php";
session_start();

$post = $_POST;


if (key($post) == "add") {
    $transaccion = new Transaccion($_SESSION["id"], $post["add"][0]["value"], $post["add"][1]["value"], $post["add"][2]["value"]);
    echo $transaccion->add_transaccion();
}
