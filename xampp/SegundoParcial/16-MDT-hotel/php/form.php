<?php
function descuento($tarifa, $estancia, $hab)
{
  /*
  Calculo de descuento
  estancia < 5  descuento = 0;
  estancia >= 5 && estancia < 10 descuento = 5%;
  estancia >= 10 && estancia < 15 descuento = 10%;
  estancia >= 15 && habitacion = 5 || habitacion = 4 descuento = 20%;
  estancia >= 15 && habitacion = 1 || habitacion = 2 || habitacion = 3 descuento = 15%;
  */
  $tarifaSinDescuento = $tarifa * $estancia;
  if ($estancia < 5) {
    return 0;
  } else if ($estancia >= 5 && $estancia < 10) {
    return $tarifaSinDescuento * 0.05;
  } else if ($estancia >= 10 && $estancia < 15) {
    return $tarifaSinDescuento * 0.1;
  } else if ($estancia >= 15 && $hab == 5 || $hab == 4) {
    return $tarifaSinDescuento * 0.2;
  } else if ($estancia >= 15 && $hab == 1 || $hab == 2 || $hab == 3) {
    return $tarifaSinDescuento * 0.15;
  }
}

function calcularCobro($tarifa, $estancia)
{
  return $tarifa * $estancia;
}
$nombre = (isset($_GET['nombre']) ? $_GET['nombre'] : 'TestUser')
  . ' ' . (isset($_GET['apellido']) ? $_GET['apellido'] : ' Test');
$hab = isset($_GET['habitacion']) ? $_GET['habitacion'] : '5';
$estancia = isset($_GET['dias']) ? $_GET['dias'] : '15';
switch ($hab) {
  case '1':
    $imgHab = '../assets/habitaciones/hab1.jpg';
    $tipoHab = 'Habitación modesta';
    $tarifa = 120.00;
    break;
  case '2':
    $imgHab = '../assets/habitaciones/hab2.jpg';
    $tipoHab = 'Habitación sencilla';
    $tarifa = 155.00;
    break;
  case '3':
    $imgHab = '../assets/habitaciones/hab3.jpg';
    $tipoHab = 'Habitación elegante';
    $tarifa = 210.00;
    break;
  case '4':
    $imgHab = '../assets/habitaciones/hab4.jpg';
    $tipoHab = 'Habitación de lujo';
    $tarifa = 285.00;
    break;
  case '5':
    $imgHab = '../assets/habitaciones/hab5.jpg';
    $tipoHab = 'Habitación super lujosa';
    $tarifa = 400.00;
    break;
  default:
    $imgHab = '../assets/habitaciones/hab1.jpg';
    $tipoHab = 'Habitación modesta';
    $tarifa = 120.00;
    break;
}
$precio = calcularCobro($tarifa, $estancia);
$descuento = descuento($tarifa, $estancia, $hab);
$precioTotal = $precio - $descuento;
?>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Las Glorias</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/output.css">
  <script src="../script/script.js"></script>
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <div class="titulo">HOTEL LAS GLORIAS</div>
      <div class="carta">
        <div class="card ">
          <img src="<?php echo $imgHab; ?>" class="card-img-top" alt="<?php echo $tipoHab ?>">
          <div class="card-body">
            <h1 class="card-title h1"><?php echo $tipoHab ?></h1>
            <h1 class="h2">Cotización</h1>
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td><span class="pseuoTitle">Nombre:</span></td>
                  <td><?php echo $nombre; ?></td>
                </tr>
                <tr>
                  <td><span class="pseuoTitle">Habitación:</span></td>
                  <td><?php echo $tipoHab; ?></td>
                </tr>
                <tr>
                  <td><span class="pseuoTitle">Estancia:</span></td>
                  <td><?php echo $estancia; ?></td>
                </tr>
                <tr>
                  <td><span class="pseuoTitle">Descuento:</span></td>
                  <td><?php echo $descuento; ?></td>
                </tr>
                <tr>
                  <td><span class="pseuoTitle">Total:</span></td>
                  <td><?php echo $precioTotal; ?></td>
                </tr>
              </tbody>
            </table>
            <a href="#" class="btn btn-info btn-lg  btn-block" onclick=" mostrarModal()">Pagar</a>
          </div>
        </div>
      </div>
    </div>
    <div class="pieDePagina text-center h6">Melgoza de la Torre abraham</div>
  </div>

  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="cerrarModal()">&times;</span>
      <p>Pagado</p>
      <button onclick="regresarAlMenu()">OK</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>