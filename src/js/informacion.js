document.addEventListener('DOMContentLoaded', function (event) {
    var url = window.location.search;
    
    $.ajax({
        type: "GET",
        url: "controller/tablaController.php" + url,
        dataType: "JSON",
        success: function (response) {
            console.log(response[0])
            let nombre = document.getElementById("nombre_info");
            let descripcion = document.getElementById("descripcion_info");
            let market_cap = document.getElementById("market_cap_info");
            let precio = document.getElementById("precio_info");
            let precio2 = document.getElementById("precio_info2");
            let h24 = document.getElementById("24h_info");
            let h242 = document.getElementById("24h_info2");
            let foto = document.getElementById("img_info");

            nombre.innerText = response[0][1]
            foto.setAttribute('src', response[0][6]);
            precio.innerText = response[0][4]  + "€";
            h24.innerText = response[0][5] + "%";
            if (response[0][5] >= 0){
                h24.setAttribute("class", "positivo");
            } else {
                h24.setAttribute("class", "negativo");
            }
            descripcion.innerText = response[0][2];
            market_cap.innerText = "Capitalización de mercado: " + response[0][3] + "€";
            precio2.innerText = "Precio: "+ response[0][4]  + "€";
            h242.innerText = "Cambio de precio 24 horas: " + response[0][5] + "%";
        }
    });
})