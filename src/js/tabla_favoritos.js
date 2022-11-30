//Cunado el usuario ha click en la estrella llamara a esta que envia a un JSON al controlador 
//con la id de la criptmoneda
function del_favoritos(id_cripto) {

    $.ajax({
        type: "POST",
        url: "controller/favoritoController.php",
        data: { "id_del": id_cripto },
        dataType: "JSON",
        success: function (response) {
            
        }
    })
}


document.addEventListener('DOMContentLoaded', function (event) {

    $.ajax({
        type: "GET",
        url: "controller/favoritoController.php?listfav",
        dataType: "JSON",
        success: function (response) {
            let cuerpo = document.getElementById("cuerpo");

            response.forEach(element => {
                let tr = document.createElement("tr");

                tr.innerHTML += "<td>" + element.nombre + "</td>"
                tr.innerHTML += "<td>" + element.price + "</td>"
                tr.innerHTML += "<td>" + element.market_cap + "</td>"
                tr.innerHTML += "<td>" + element.change_h + "</td>"
                //Mediante esta etcion pinta una estrella u otra para saber cual moneda tienes ya en favoritos
                tr.innerHTML += "<td><a onclick = 'del_favoritos(`" + element.id + "`)'  id='" + element.id + "'><i class='bi bi-star-fill fav' id='fav'></i></a></td>"
                cuerpo.appendChild(tr)
            });
        }
    })

})