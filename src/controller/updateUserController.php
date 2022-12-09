<?php
require_once "../model/Usuario.php";

$post = $_POST;

//Almacenara los datos del post en el objeto usuario y este llamara a la funcion para actulizar tanto la 
//session como la tabla 
$usuario = new Usuario($post["id"], $post["usuario"], $post["name"], $post["apellido"], $post["email"], $post["password"]);

echo $usuario->edit_usuario();