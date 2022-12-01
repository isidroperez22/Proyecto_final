document.addEventListener('DOMContentLoaded', function (event) {
    let btn = document.getElementById("btn_form_edit");

    //Cuando haga click en el boton recogera los datos del formulario y los almacenara en un array
    //que enviara posteriormente al controlador
    btn.addEventListener('click', (e) => {
        e.preventDefault;
        var datos = $("#form_edit").serializeArray()
        $.ajax({
            type: "POST",
            url: "controller/updateUserController.php",
            data: datos,
            success: function (response) {
                let error = document.getElementById("error1");
                if(response == 1){ //Si devuelve 1 recargara la pagina
                    console.log("actualizado")
                    location.reload()
                } else if (response == 0) { //Si no devolvera error
                    
                    error.setAttribute("class", "alert alert-danger m-3");
                    error.innerText = "No actualizado";
                    // console.log("No actualizado");
                }
                window.onload;
            }
        });
    })
})