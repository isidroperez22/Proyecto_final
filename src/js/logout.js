// document.addEventListener('DOMContentLoaded', function (event) {
//     var salir = document.getElementById('btn-navbar-salir');


//     salir.addEventListener('click', (e) => {
//         e.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: "controller/logoutController.php",
//             // dataType: "JSON",
//             success: function (response) {
//                 sessionStorage.removeItem("role")
//                 console.log(response)
//                 location.reload();
//             }
//         });
//     })
// });

//La funcion es llamada desde el html y avisa al servidor para destruir la session
function logout() {
    $.ajax({
        type: "GET",
        url: "controller/logoutController.php",
        // dataType: "JSON",
        success: function (response) {
            sessionStorage.removeItem("role");
            location.reload();
        }
    });
}