<?php 
require_once "../model/Favorito.php";

$post = $_POST;
$get = $_GET;


//Si esta id_add en el post entra en este if que comprobara si lexiste la id en la session
// si estan ambas cosas montara el objeto favorito y llamara a la funcion add_favoritos que
//lo aniadira a la tabla
if(isset($post["id_add"])){
    if(isset($_SESSION["id"])){
        $favorito = new Favorito($post["id_add"], $_SESSION["id"]);
        echo $favorito->add_favoritos();
        exit;
    }
}

//Si esta id_add en el post entra en este if que comprobara si lexiste la id en la session
// si estan ambas cosas montara el objeto favorito y llamara a la funcion del_favoritos que
//lo eliminara de la tabla
if(isset($post["id_del"])){
    if(isset($_SESSION["id"])){
        $favorito = new Favorito($post["id_del"], $_SESSION["id"]);
        echo $favorito->del_favoritos();
        exit;
    }
}

if(isset($get["listfav"])){
    
    $favorito = new Favorito("", $_SESSION["id"]);
    echo json_encode($favorito->mostrar_favoritos());
}
