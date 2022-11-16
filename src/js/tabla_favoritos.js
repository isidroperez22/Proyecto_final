//Cunado el usuario ha click en la estrella llamara a esta que envia a un JSON al controlador 
//con la id de la criptmoneda
function del_favoritos(id_cripto){

    $.ajax({
        type: "POST",
        url: "controller/favoritoController.php",
        data: {"id_del":id_cripto},
        dataType: "JSON",
        success: function (response) {

        }
    })
}