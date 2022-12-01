<?php
require_once "../model/Moneda.php";
require_once "../model/Usuario.php";
$post = $_POST;
$get = $_GET;

// print_r($post);
// exit;




if (key($post) == "id_user_del") {
    $usuario = new Usuario($post["id_user_del"]);
    echo $usuario->del_usuario();
}

if (key($post) == "id_coin_edit_get") {
    $moneda = new Moneda($post["id_coin_edit_get"]);
    echo json_encode($moneda->buscar_moneda());
}

if (key($post) == "id_coin_edit") {
    $moneda = new Moneda($post["id_coin_edit"][0]["value"], $post["id_coin_edit"][1]["value"], $post["id_coin_edit"][3]["value"],"","","", "" ,$post["id_coin_edit"][2]["value"]);
    echo $moneda->edit_monedas();
}


if (key($post) == "id_user_edit_get") {
    // print_r($post);
    $usuario = new Usuario($post["id_user_edit_get"]);
    echo json_encode($usuario->buscar_id_usuario());
}

if (key($post) == "id_user_edit") {
    // print_r($post["id_user_edit"][4]["value"]);
    // exit;
    $usuario = new Usuario($post["id_user_edit"][0]["value"], $post["id_user_edit"][1]["value"], $post["id_user_edit"][2]["value"], $post["id_user_edit"][3]["value"], "", "", $post["id_user_edit"][4]["value"]);
    echo json_encode($usuario->edit_admin_usuario());
}

if (key($post) == "add_coin") {
    $moneda = new Moneda($post["add_coin"][0], $post["add_coin"][1], $post["add_coin"][2], $post["add_coin"][3], $post["add_coin"][4], $post["add_coin"][5], $post["add_coin"][6]);

    echo $moneda->add_monedas();
}

if (key($post) == "del_coin") {
    $moneda = new Moneda($post["del_coin"]);

    echo $moneda->del_monedas();
}
