<?php
require_once "../model/Usuario.php";

//Inicia la session ya que ademas de actulizar los valores de la tabla, actulizara los valores del usuario
//en session
session_start();
$post = $_POST;
//Almacenara los datos del post en el objeto usuario y este llamara a la funcion para actulizar tanto la 
//session como la tabla
$usuario = new Usuario($post["id"], $post["usuario"], $post["name"], $post["apellido"], $post["email"], md5($post["password"]));

echo $usuario->edit_usuario();