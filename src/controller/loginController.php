<?php
require_once "../model/Usuario.php";

//Iniciamos una session y guardamos los datos del post en el objeto creado del usuario 
$post = $_POST;

$usuario = new Usuario("", $post["usuario"], "","","", md5($post['password']));

// Llamamos a la funcion
if (!$usuario->iniciar_session()) { // Si devuelve false enviara a la respuesta false
    echo "false";
} else {
    echo json_encode($usuario->iniciar_session());
}