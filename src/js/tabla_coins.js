var coins = [];
document.addEventListener('DOMContentLoaded', function (event) {

    // Al cargar la pagina recibe un objeto con las id de todas las criptomonedas y 
    // lo almacena en un array (coins)
    $.ajax({
        type: "GET",
        url: "controller/tablaController.php",
        dataType: "JSON",
        success: function (response) {
            response.forEach(element => {
                coins.push(element.id)
            });
            // setInterval(extraerValor, 10000, coins);
        }
    });

});


//Esta funcion es llamada desde el html y recoge la id de la criptomoneda para hacer una peticion al 
//controlador (favoritoController.php) que recibe un json con la key id_add y la id de la criptomoneda
function add_favoritos(id_cripto) {
    $.ajax({
        type: "POST",
        url: "controller/favoritoController.php",
        data: { "id_add": id_cripto },
        dataType: "JSON",
        success: function (response) {
            location.replace("criptomonedas_view.php");
            window.onload;
        }
    })
}

// Cuando el usuario administrador pulsa el boton envia el array con las id a la funcion extraer valor
function actualizar_valores() {
    extraerValor(coins);
}

// Esta fuincion lo que hace es coger cada id recibido en el array para hacer una peticion a la api, 
// recibir una respuesta y enviar los datos que quiero actualizar en la base de datos
// en este caso son el price, market_cap y price_change_percentage_24h_in_currency.eur
function extraerValor(coins) {
    for (let coin of coins) {
        $.ajax({
            type: "GET",
            url: "https://api.coingecko.com/api/v3/coins/" + coin,
            success: function (response) {
                let coin = response.id;
                let price = response.market_data.current_price.eur;
                let market_cap = response.market_data.market_cap.eur;
                let change_24h = response.market_data.price_change_percentage_24h_in_currency.eur
                add_valores_tabla(coin, price, market_cap, change_24h);
            }
        });
    }
}
// Esta funcion monta un array y envia una peticion post al servidor donde actulizara los datos
function add_valores_tabla(coin, price, market_cap, change_24h) {
    let datos = [coin, price, market_cap, change_24h];
    $.ajax({
        type: "POST",
        url: "controller/tablaController.php",
        data: { "criptomoneda": datos },
        dataType: "JSON",
        success: function (response) {
            if (response == 1) {
                location.replace("criptomonedas_view.php");
                window.onload
            }

        }
    })
}