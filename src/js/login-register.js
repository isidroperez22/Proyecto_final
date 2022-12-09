document.addEventListener('DOMContentLoaded', function (event) {
    var register = document.getElementById('form_registro');
    var login = document.getElementById('form_login')

    //Al hacer click en el boton de form_registro recogera los datos del formulario y los almacenara en 
    //un array (datos) que se enviara mediante un post al controlador (registerController.php)
    register.addEventListener('submit', (e) => {
        e.preventDefault();
        var datos = $('#form_registro').serializeArray();
        console.log(datos);
        $.ajax({
            type: "POST",
            url: "https://coinfi-production.up.railway.app/controller/registerController.php",
            data: datos,
            success: function (response) { //La respeusta recibe el mensaje y mostrara en pantalla el mensaje
                let error = document.getElementById("error_register");
                if (response == "registrado") {
                    location.reload(true);
                    window.onload;
                } else if (response == "Las contraseñas no conciden") {
                    error.setAttribute("class", "alert alert-danger m-3");
                    error.innerText = response;
                } else if (response == "El nombre de usuario ya existe") {
                    error.setAttribute("class", "alert alert-danger m-3");
                    error.innerText = response;
                } else if (response == "El email ya esta en uso") {
                    error.setAttribute("class", "alert alert-danger m-3");
                    error.innerText = response;
                }
            }
        });
    })
    
    //Al hacer click en el boton de form_login recogera los datos del formulario y los almacenara en 
    //un array (datos) que se enviara mediante un post al controlador (loginController.php)
    login.addEventListener('submit', (e) => {
        e.preventDefault();
        var datos = $('#form_login').serializeArray();
        $.ajax({
            type: "POST",
            url: "https://coinfi-production.up.railway.app/controller/loginController.php",
            data: datos,
            dataType: "JSON",
            success: function (response) {
                let errorLogin = document.getElementById("error_login");
                if (response) {
                    location.reload(true)
                } else { //Si es false mostrara el mensaje siguiente en pantalla
                    errorLogin.setAttribute("class", "alert alert-danger m-3");
                    errorLogin.innerText = "Usuario o contraseña incorrectos";
                }
                window.onload
            }
        });
    })

});