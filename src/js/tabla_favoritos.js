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

                tr.innerHTML += "<td><img src='"+element.foto+"' alt='' width='40' height='40'></td>"
                tr.innerHTML += "<td class='pt-3'><a href='mostrar_informacion.php?id="+element.id+" ' class='link-dark'>"+element.nombre+"</a></td>"
                tr.innerHTML += "<td class='pt-3'>"+element.price+"</td>"
                tr.innerHTML += "<td class='pt-3 d-none d-sm-table-cell'>"+element.market_cap+"</td>"
                if(element.change_h > 0){
                    tr.innerHTML += "<td class='pt-3' style='color:green;'><strong style='background-color: #B4F6B0; padding:4px; border-radius:5px;'>"+element.change_h+"%</strong></td>"
                } else{
                    tr.innerHTML += "<td class='pt-3' style='color:red;'><strong style='background-color: #F6B0B0; padding:4px; border-radius:5px;'>"+element.change_h+"%</strong></td>"
                }
                //Mediante esta etcion pinta una estrella u otra para saber cual moneda tienes ya en favoritos
                tr.innerHTML += "<td><a onclick = 'del_favoritos(`" + element.id + "`)'  id='" + element.id + "'><i class='bi bi-star-fill fav' id='fav'></i></a></td>"
                cuerpo.appendChild(tr)
            });
        }
    })

})