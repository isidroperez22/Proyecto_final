<?php
require_once "../model/Usuario.php";


//Cogemos el post y creamos el objeto usuario donde almacenamos los datos recibidos
$a = $_POST;
$usuario = new Usuario("", $a["usuario"], $a["nombre"], $a["apellido"], $a["email"], md5($a['password']), $a["role"]);



if(!$usuario->buscar_usuario() == false){ //Comprueba que el usuario no se repite en la base de datos
    echo "El nombre de usuario ya existe";
    exit;
}  elseif (!$usuario->buscar_email_usuario() == false) { //comprueba que el usuario no se repite en la bd
    echo "El email ya esta en uso";
    exit;
} else{
    if ($a["password"] == $a["confirm_password"]) { //Comprueba que el usuario ha escrito bien la password
        $usuario->registrar_usuario();
        echo "registrado";
    } else { // Si el usuario no ha escrito bien las contraseñas devolvera el siguiente mensaje
        echo "Las contraseñas no conciden";
    }
}