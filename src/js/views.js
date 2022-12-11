document.addEventListener('DOMContentLoaded', function (event) {

    let content = document.getElementById("contenido")

    //---------------- DASHBOARD
    $('.dashboard').click(function (e) { //Muestra la vista de dashboard
        e.preventDefault();
        $(content).empty();
        $(content).load(('view/resumen_view.html'
        ), function () {
            console.log()
            $.ajax({
                type: "GET",
                url: "controller/dashboardController.php",
                success: function (response) {
                    let array_respuesta = JSON.parse(response); 
                    // console.log(array_respuesta)
                    //Convierte la respuesta en un array
                    let array_nombres = [];
                    let array_colores = [];
                    let array_cantidades = [];
                    array_respuesta.forEach(element => {
                       
                        if (element["Total"] > 0) {  // Almacena los valores del array en 2 array distintos y 
                            array_nombres.push(element["Nombre"]);
                            array_cantidades.push(element["Total"]);
                            if (element["Color"] != null) {
                                array_colores.push(element["Color"]);
                            } else {
                                array_colores.push(generarNuevoColor()); //Si no tiene un color seleccionado pondra un color aleatorio
                            }

                        }

                    });
                    graficaRosco(array_nombres, array_colores, array_cantidades);

                    let tabla = document.getElementById("cuerpo")
                    array_respuesta.forEach(element => {
                        if(element["Cantidad"] > 0){
                            let tr = document.createElement("tr");
                            tr.innerHTML += "<td>"+element["Nombre"]+"</td>"
                            tr.innerHTML += "<td>"+element["Precio"]+"</td>"
                            tr.innerHTML += "<td>"+element["Cantidad"]+"</td>"
                            tr.innerHTML += "<td>"+element["Total"]+"</td>"
                            tabla.appendChild(tr);
                        }
                    });
                }
            });

        });
    });

    function generarNuevoColor() { //Esta funcion genera un color aleatorio
        var simbolos, color;
        simbolos = "0123456789ABCDEF";
        color = "#";

        for (var i = 0; i < 6; i++) {
            color = color + simbolos[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function graficaRosco(array_nombres, array_colores, array_cantidades) {

        var data = { //Rellenamos los datos que contendra el donut
            labels: array_nombres,
            datasets: [{
                data: array_cantidades,
                backgroundColor: array_colores,
                hoverOffset: 4,
            }]
        };
        var config = { // Aqui lo que hacemos es decir a la api que el tipo de grafica sera un donut
            type: 'doughnut',
            responsive: true,
            data: data,
        };
        var myChart = new Chart( //Creamos la grafica
            document.getElementById('donut'),
            config,
        );
        var ctx = $('#donut');
        ctx.height(400);

    }
    //---------------- GESTION PORTFOLIO

    $('.add_transaccion').click(function (e) { //Muestra la vista de agregar transaccion
        e.preventDefault();
        $(content).empty();
        $(content).load(('view/addTransaccion_view.php'
        ), function () {

            let btn = document.getElementById("btn_form");
            btn.addEventListener('click', (e) => { //Cuando se haga click en el boton ocurrira un evento
                e.preventDefault;
                var datos = $("#form_addCripto").serializeArray() //Almacena la informacion del formulario
                $.ajax({
                    type: "POST",
                    url: "controller/transaccionController.php",
                    data: { "add": datos }, //Envia un json al controlador
                    success: function (response) {
                        console.log(response);
                        alert("Añadido correctamente.")
                    }
                });
            })
        });

    });

    //---------------- PANEL DE ADMINISTRADOR
    //---------------- ADDCOIN
    $('.addCoin_view').click(function (e) { //Muestra la vista de agregar una criptomoneda
        e.preventDefault();
        $(content).empty();
        $(content).load(('view/admin/addCoin_view.html'),
            function () {
                let coin = document.getElementById("addcoinForm")

                coin.addEventListener('submit', (e) => {
                    e.preventDefault();
                    var dato = document.getElementById("coin").value //Recoge la moneda que buscas
                    $.ajax({
                        type: "GET",
                        url: "js/list.json", // Devuelve todo la lista de monedas del archivo json
                        success: function (response) { //Genera una tabla
                            let tabla = document.getElementById("table");
                            tabla.innerHTML = ""
                            let thead = document.createElement("thead");
                            let tbody = document.createElement("tbody");
                            let tr = document.createElement("tr");
                            let th = document.createElement("th");
                            th.innerText = "Nombre";
                            tr.appendChild(th)
                            thead.appendChild(tr);

                            tabla.appendChild(thead);
                            tabla.appendChild(tbody);
                            response.forEach(element => { //recorre la respuesta y si encuentra un dato con el mismo nombre generara un fila en la tabla
                                if (element.id == dato.toLowerCase() || element.symbol == dato.toLowerCase()) {
                                    let td = document.createElement("td");
                                    let tr = document.createElement("tr");
                                    let add_td = document.createElement("td");
                                    add_td.innerHTML = '<a href="#" class="link-dark click" id="' + element.id + '"><i class="bi bi-plus-circle-fill"></i></a>'
                                    tr.appendChild(td)
                                    tr.appendChild(add_td)
                                    tbody.appendChild(tr);
                                    td.innerText = element.name
                                } //En la fila habra 2 columnas una con el nombre de la moneda y otra con un boton de añadir que contiene la id de la moneda
                            });
                            document.querySelectorAll(".click").forEach(el => { //Al hacer click en el boton de añadir enviara el id a la funcion extraerValores()
                                el.addEventListener("click", e => {
                                    let id = e.target.parentElement.id;
                                    console.log(id)
                                    extraerValores(id);
                                });
                            });
                        }
                    });
                })
            },
        );
    });

    function extraerValores(coin) { //Esta funcion recibe el id de la moneda seleccionda y hara una peticion a la api
        $.ajax({
            type: "GET",
            url: "https://api.coingecko.com/api/v3/coins/" + coin,
            success: function (response) { //Esta recibe la respuesta y almacena los datos que queremos en un array que enviara a insertaCoin()
                let id = response.id;
                let name = response.name;
                let price = response.market_data.current_price.eur;
                let market_cap = response.market_data.market_cap.eur;
                let change_24h = response.market_data.price_change_percentage_24h_in_currency.eur
                let foto = response.image.large;
                let datos_coin = [];
                datos_coin.push(id, name, "", market_cap, price, change_24h, foto);
                insertarCoins(datos_coin);
            }
        });
    };

    function insertarCoins(datos) { //Envia los datos al controlador e inserta la criptomoneda en la tabla
        console.log(datos);
        $.ajax({
            type: "POST",
            url: "controller/adminController.php",
            data: { "add_coin": datos },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                alert("Añadido correctamente.")
            }
        });
    }

    //---------------- DELCOIN
    $('.delCoin_view').click(function (e) { //Muestra la vista de eliminar criptomoneda
        e.preventDefault();
        $(content).empty();
        $(content).load(('view/admin/delCoin_view.html'
        ), function () {
            $.ajax({
                type: "POST",
                url: "controller/adminController.php",
                data: {"mostrar_monedas":""},
                dataType: "JSON",
                success: function (response) {
                    //Genera la tabla con las monedas
                    let body = document.getElementById("cuerpo");
                    response.forEach(element => {
                        let tr = document.createElement("tr");
                        
                        tr.innerHTML += "<td>"+element.nombre+"</td>"
                        tr.innerHTML += "<td><a class='link-dark click' id='"+element.id+"'><i class='bi bi-trash-fill'></i></a></td>"
                        body.appendChild(tr);
                    });
                    document.querySelectorAll(".click").forEach(el => { //recorre los elementos que tienen el selector click
                        el.addEventListener("click", e => { //Cuando encuentra el que has clicado enviara un el id a la funcion de eliminar
                            let id = e.target.parentElement.id;
                            if (confirm("¿Estas seguro?") == true) {
                                eliminarCoins(id);
                            }
                        });
                    });
                }
            })
            
        });
    });

    function eliminarCoins(datos) { //Recibe el id y hace una peticion al controlador

        $.ajax({
            type: "POST",
            url: "controller/adminController.php",
            data: { "del_coin": datos },
            dataType: "JSON",
            success: function (response) {
                console.log(response)
                alert("Eliminado correctamente.")
                location.reload();
            }
        });
    }

    //---------------- EDITCOIN
    $('.editCoin_view').click(function (e) { //Muestra la vista de editar moneda
        e.preventDefault();
        $(content).empty();
        $(content).load(('view/admin/editCoin_view.html'
        ), function () {
            $.ajax({
                type: "POST",
                url: "controller/adminController.php",
                data: {"mostrar_monedas":""},
                dataType: "JSON",
                success: function (response) {
                    //Genera la tabla con las monedas
                    let tabla = document.getElementById("cuerpo");
                    response.forEach(element => {
                        let tr = document.createElement("tr");
                        
                        tr.innerHTML += "<td>"+element.nombre+"</td>"
                        tr.innerHTML += "<td><a class='link-dark click' id='"+element.id+"'><i class='bi bi-pencil-fill'></i></a></td>"
                        tabla.appendChild(tr);
                    });
                    document.querySelectorAll(".click").forEach(el => { //Busca el id y lo envia a la funcion valoresModal_coin()
                        el.addEventListener("click", e => {
                            let id = e.target.parentElement.id;
                            valoresModal_coin(id);
                        });
                    });
                }
            })
            
        });

    });

    function valoresModal_coin(id) { // Este recibe el id y envia una peticion al servidor
        $.ajax({
            type: "POST",
            url: "controller/adminController.php",
            data: { "id_coin_edit_get": id },
            dataType: "JSON",
            success: function (response) { // En la respuesta recibe los datos de la moneda y aniade los valores

                let nombre = document.getElementById("nombre_coin");
                let color = document.getElementById("color_coin");
                let descripcion = document.getElementById("descripcion");
                let id_form = document.getElementById("id");
                id_form.value = response[0][0];
                nombre.value = response[0][1];
                color.value = response[0][7];
                descripcion.value = response[0][2];
                $("#coin").modal('show');
                $('#btn-edit-coin').click(function (e) { // Una vez editado envias los datos al servidor y recibes una respuesta
                    var datos = $('#form_edit').serializeArray();
                    console.log(datos)
                    $.ajax({
                        type: "POST",
                        url: "controller/adminController.php",
                        data: { "id_coin_edit": datos },
                        success: function (response) {
                            if (response == 1) { // Si la respuesta es 1 significa que se han guardado los cambios
                                $("#coin").modal('hide');
                            }
                            alert("Cambios actualizados correctamente.")
                            console.log(response)
                        }
                    });
                });
            }
        });
    }

    //---------------- DELUSERS
    $('.delUser_view').click(function (e) { //Muestra la vista de eliminar usuarios
        e.preventDefault();
        $(content).empty();
        $(content).load(('view/admin/delUser_view.html'
        ), function () {
            $.ajax({
                type: "POST",
                url: "controller/adminController.php?mostrarUsuarios",
                dataType: "JSON",
                success: function (response) {
                    //Genera la tabla con las monedas
                    let tabla = document.getElementById("cuerpo");
                    response.forEach(element => {
                        let tr = document.createElement("tr");
                        
                        tr.innerHTML += "<td>"+element.nombre +" " + element.apellido + "</td>"
                        tr.innerHTML += "<td><a class='link-dark click' id='"+element.id+"'><i class='bi bi-trash-fill'></i></a></td>"
                        tabla.appendChild(tr);
                    });
                    document.querySelectorAll(".click").forEach(el => {
                        el.addEventListener("click", e => { //Busca el id y lo envia a la funcion eliminarUsuario()
                            let id = e.target.parentElement.id;
                            if (confirm("¿Estas seguro?") == true) {
                                eliminarUsuario(id);
                            }
                        });
                    });
                }
            })
            
        });

    });

    function eliminarUsuario(id) { //Hace una peticion al servidor y recarga la pagina
        console.log(id)
        $.ajax({
            type: "POST",
            url: "controller/adminController.php",
            data: { "id_user_del": id },
            dataType: "JSON",
            success: function (response) {
                alert("Eliminado correctamente.")
                location.reload()
            }
        });
    }

    //---------------- EDITUSER
    $('.editUser_view').click(function (e) { //Muestra la vista de editar usuarios
        e.preventDefault();
        $(content).empty();
        $(content).load(('view/admin/editUser_view.html'
        ), function () {
            $.ajax({
                type: "POST",
                url: "controller/adminController.php?mostrarUsuarios",
                dataType: "JSON",
                success: function (response) {
                    //Genera la tabla con las monedas
                    let tabla = document.getElementById("cuerpo");
                    response.forEach(element => {
                        let tr = document.createElement("tr");
                        
                        tr.innerHTML += "<td>"+element.nombre +" " + element.apellido + "</td>"
                        tr.innerHTML += "<td><a class='link-dark click' id='"+element.id+"'><i class='bi bi-pencil-fill'></i></a></td>"
                        tabla.appendChild(tr);
                    });
                    document.querySelectorAll(".click").forEach(el => {
                        el.addEventListener("click", e => {
                            let id = e.target.parentElement.id;
                            valoresModal_user(id);
                        });
                    });
                }
            })
            
        });

    });

    function valoresModal_user(id) { //Hace una peticion al servidor devuleve el usuario a editar y rellena el formulario con sus datos
        $.ajax({
            type: "POST",
            url: "controller/adminController.php",
            data: { "id_user_edit_get": id },
            dataType: "JSON",
            success: function (response) {
                let id_user = document.getElementById("id");
                let name_user = document.getElementById("name_user");
                let name = document.getElementById("name");
                let surname = document.getElementById("surname");
                let role = document.getElementById("role");

                id_user.value = response[0][0];
                name_user.value = response[0][1];
                name.value = response[0][2];
                surname.value = response[0][3];
                if (response[0][6] == "admin") { // Si el role es igual a admin tendra preseleccionado ese rol
                    document.getElementById("v_admin").setAttribute("selected", "true");
                    document.getElementById("v_user").removeAttribute("selected");
                } else {
                    document.getElementById("v_user").setAttribute("selected", "true");
                    document.getElementById("v_admin").removeAttribute("selected");
                }
                $("#user").modal('show'); // Lo muestra
                $('#btn-edit').click(function (e) { // Cuando hagas click en el boton hara una peticion al controlador
                    var datos = $('#form_edit').serializeArray();
                    $.ajax({
                        type: "POST",
                        url: "controller/adminController.php",
                        data: { "id_user_edit": datos },
                        dataType: "JSON",
                        success: function (response) {
                            if (response == 1) {
                                $("#user").modal('hide');
                            }
                            alert("Cambios actualizados correctamente.")
                            console.log(response)
                        }
                    });
                    var datos = []
                });
            }
        });
    }

})