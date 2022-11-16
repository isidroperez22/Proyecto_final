<?php
include_once "../model/Moneda.php"; 

//Este recibira dos peticiones
$post = $_POST;


$monedas = new Moneda();

//Si recibe una peticion post con la clave criptomonedas este cogera los valoras y actualizara los valores
//de la tabla mediante la funcion update_valores()
if(key($post) == "criptomoneda"){
    $monedas = new Moneda($post["criptomoneda"][0], "", "", $post["criptomoneda"][2], $post["criptomoneda"][1], $post["criptomoneda"][3]);
    echo $monedas->update_valores();
} else { //Si no realiza la peticion post enviara el objeto con las id de las monedas a la respuesta
    echo json_encode($monedas->datos_monedas());
}


