<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="js/login-register.js"></script>
  <script src="js/logout.js"></script>

  <script src="resources/bootstrap/js/jquery-3.6.1.js"></script>
  <script src="resources/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>

<body>

  <?php
  require_once "view/components/header.php";
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="col-12 mt-5 ps-5">
          <h1 class="text-uppercase fw-bold">Tecnologia blockchain</h1>
        </div>
        <div class="col-12 mt-5 mb-5 ps-5">
          <p class="">
            El concepto blockchain fue aplicado por primera vez en 2009 junto con la aparicion del Bitcoin y
            se peude definir como un libro publico de registros que estan enlazados y cifrados para proteger
            la seguridad y privacidad de las transacciones.
          </p>
          <p>
            Para explicarte como funciona una blockchain te pongo un ejemplo:
          </p>
          <p>
            El es muy sencillo de explicar, imagina que "A" quiere enviar dinero a "B". "A" hace la transaccion
            y esta transaccion se escribe en un bloque, este es validado por muchos validadores si la transaccion es validada
            por todos el bloque se añade a la cadena y el dinero llega a "B" y si la transaccion no es validada el bloque es eliminado,
            no se añade a la cadena y no se envia el dinero a "B".
          </p>
          <p>
            El proceso de validacion de un bloque es uno de los puntos que hace segura a una blockchain, otro punto fuerte es que la informacion es inmutabale,
            es decir, no puedes modificar un bloque registrado, puesto que para modificar un bloque deberias modificar todos los bloques anteriores y es algo que es inviable
            ya que hay cientos de miles de bloques.
          </p>
          <p>
            La tecnologia blockchain no solo se puede aplicar a transacciones monetarias, tambien se puede aplicar a otras
            cosas, ya que esta desarrollada, para no poder modificar los datos, para evitar fraudes,
            mostrar transparecia entre otras cosas.
          </p>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6 ps-5 mb-5 mt-5 text-center">
        <img src="resources/img/008-blockchain-3-1.svg" class="img-fluid" alt="Responsive image">
      </div>
    </div>

    <div class="row row-index">
      <div class="col-sm-12 col-lg-6 ps-5 mb-5 mt-5 text-center">
        <img src="resources/img/sc.svg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="col-12 col-sm-12 mt-5 ps-5">
          <h1 class="text-uppercase fw-bold">smart contracts</h1>
        </div>
        <div class="col-12 mt-5 mb-5 ps-5">
          <p class="">
            Un contrato inteligente (smart contract en inglés) es un programa informático que facilita, asegura, hace cumplir y ejecuta acuerdos
            registrados entre dos o más partes. Como tal, a ellos les ayudaría en la negociación y definición de tales
            acuerdos que causarán que ciertas acciones sucedan como resultado de que se cumplan una serie de condiciones específicas
          </p>
          <p class="">
            Un ejemplo de uso podria ser al comprar una vivienda, acordais tu y el banco en que vas a pagar una entrada de 10.000€ y vas pagar una hipoteca de 300€ al mes.
            Esto se pone en el smart contract y una vez firmado por ambas partes automaticamente pagas la entarda y recibes la llave de la casa, actualmente hay algunas
            empresas que han empezado a implementar esta tecnologia.
          </p>
          <p class="">
            Tienen como objetivo brindar una seguridad superior a la ley de contrato tradicional y reducir costos de transacción asociados a la contratación.
            La transferencia de valor digital mediante un sistema que no requiere confianza abre la puerta a nuevas aplicaciones que pueden
            hacer uso de los contratos inteligentes.
          </p>
          <p class="">
            Es veloz, eficiente y preciso. Realiza toma de decisiones de mejor manera de la que la realizaría un humano convencional. Además es seguro,
            pues debe estar planeado con encriptación para poder garantizar un nivel de seguridad. De igual modo, fomenta el ahorro ya que busca la manera más económica de hacer el negocio.
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="col-12 mt-5 ps-5">
          <h1 class="text-uppercase fw-bold">intercambios peer to peer (p2p)</h1>
        </div>
        <div class="col-12 mt-5 mb-5 ps-5">
          <p class="">
            Los pagos de peer to peer (pagos p2p) son una tecnología en línea que permite a los usuarios transferir
            fondos desde su cuenta bancaria o de tarjeta de crédito a la cuenta de otro individuo a través de tecnologías como Internet o el teléfono móvil
            sin que haya ningun intermediario.
          </p>
          <p class="">
            Lo unico que se necesita para hacer funcionar una red P2P es un software que permita compartir información de conexión
            entre quienes lo ejecutan. Cuanto más descentralizada esté dicha red, más personas podrán crear sus propios nodos
            aumentando con ello el tamaño de la red. De esta manera, se aumenta su alcance y mejoran sus posibilidades.
          </p>
          <p class="">
            Es decir, mientras más pares o peers tenga la red, más posibilidades hay de que la red no pueda
            ser censurada, cuente con un funcionamiento resistente y mejore sus propias capacidades.
          </p>
          <p class="">
            Alguna de las ventajas es que tienen un alto rendimiento, alta escalabilidad, interoperabilidad. Se pueden utilizar para un
            intercambio seguro de cualquier tipo de producto digital como canciones peliculas o dinero.
          </p>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6 ps-5 mb-5 mt-5 text-center">
        <img src="resources/img/peer-to-peer.svg" class="img-fluid" alt="Responsive image">
      </div>
    </div>
  </div>
  <footer class="footer mt-auto d-flex  justify-content-between align-items-center py-3 border-top sitcky-bottom">
    <?php
    require "view/components/footer.html"
    ?>
  </footer>
</body>

</html>