<?php
include_once "../model/Moneda.php"; 
include_once "../model/Favorito.php"; 
//Este recibira dos peticiones
$post = $_POST;
$get = $_GET;



if(key($get)== "id"){
    $monedas = new Moneda($get["id"]);
    echo json_encode($monedas->buscar_moneda());
    exit;
}
if(key($post) == "favoritos"){
    $favoritos = new Favorito($post["favoritos"], $_SESSION["id"]);
    echo $favoritos->buscar_favoritos_cripto();
    exit;
}

//Si recibe una peticion post con la clave criptomonedas este cogera los valoras y actualizara los valores
//de la tabla mediante la funcion update_valores()
if(key($post) == "criptomoneda"){
    $monedas = new Moneda($post["criptomoneda"][0], "", "", $post["criptomoneda"][2], $post["criptomoneda"][1], $post["criptomoneda"][3]);
    echo $monedas->update_valores();
    exit;
} else { //Si no realiza la peticion post enviara el objeto con las id de las monedas a la respuesta
    $monedas = new Moneda();
    echo json_encode($monedas->datos_monedas());
    exit;
}


