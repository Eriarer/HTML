<?php
//validar que el metodo post este definido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $arrSize = $_POST['arrSize'];
  $min = $_POST['min'];
  $max = $_POST['max'];
}

function genArray()
{
  global $arrSize, $min, $max;
  $arr = array();
  $i = 0;
  while ($i < $arrSize) {
    $num = rand($min, $max);
    if (!in_array($num, $arr)) {
      $arr[$i] = $num;
      $i++;
    }
  }
  return $arr;
}

function printArr($arr)
{
  foreach ($arr as $key => $value) {
    echo "<p>$value</p>";
  }
}

function promedio($arr)
{
  global $arrSize;
  $sum = 0;
  foreach ($arr as $key => $value) {
    $sum += $value;
  }
  // RETORNAR  valor truncado a 2 decimales
  return round($sum / $arrSize, 2);
}
?>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- cache -->
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate" />
  <!-- bootstrap 4.6.2 -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous' />
  <!-- css -->
  <link rel="stylesheet" href="style.css">

  <title>Post</title>
</head>

<body>
  <div class="wrapper">
    <div class="header text-center">
      <h1 class="h3">Melgoza de la Torre Abraham</h1>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    ?>
      <div class="form">

        <!-- form de boostrap -->
        <!-- metodo post -->
        <!-- pide el tamaño de un vector
min y max -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-row">
            <div class="form-group col">
              <label for="arrSize" class="h2">Tamaño vector: <span id="sliderValue" class="h2">0</span></label>
              <div class="sliderContainer" id="slideContainer">
                <h3>0</h3>
                <input type="range" class="form-control-range" name="arrSize" id="slider" min="0" max="100" value="30">
                <h3>100</h3>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <input type="number" class="form-control form-control-lg" placeholder="N menor" aria-label="Numero menor" name="min" id="min" required />
            </div>
            <div class="col">
              <input type="number" class="form-control form-control-lg" placeholder="N mayor" aria-label="Numero mayor" name="max" id="max" required />
            </div>
          </div>
          <div class="row">
            <div class="col">
              <button type="submit" class="btn btn-info btn-lg btn-block font-weight-bold">
                Calcular!
              </button>
            </div>
          </div>
        </form>
      </div>
    <?php
    } else {
      // generar un arreglo de tamaño arrSize 
      // con numeros aleatorios entre min y max sin repetir
      $arr = genArray();
      // copiar el $arr y ordenarlo
      // desordenar el vector orriginal
      // de menor a mayor
      // de mayor a menor
      // obtener el mayor y el menor
      $arrCopy = $arr;
      shuffle($arrCopy);
      $arrCopy1 = $arr;
      sort($arrCopy1);
      $arrCopy2 = $arrCopy;
      rsort($arrCopy2);
      $min = $arrCopy1[0];
      $max = $arrCopy2[0];
      $promedio = promedio($arr);
    ?>
      <!-- vector original -->
      <div class="vector">
        <h2>Vector original</h2>
        <div class='vectorItem'>
          <?php
          printArr($arr);
          ?>
        </div>
      </div>
      <!-- info general -->
      <div class="vector">
        <h2>Info general</h2>
        <div class='vectorItem'>
          <p>Menor: <?php echo $min; ?></p>
          <p>Mayor: <?php echo $max; ?></p>
          <p>Promedio: <?php echo $promedio; ?></p>
        </div>
      </div>
      <!-- vector ordenado -->
      <div class="vector">
        <h2>Vector de Menor a Mayor</h2>
        <div class='vectorItem'>
          <?php
          printArr($arrCopy1);
          ?>
        </div>
      </div>
      <!-- vector ordenado 2 -->
      <div class="vector">
        <h2>Vector de Mayor a Menor</h2>
        <div class='vectorItem'>
          <?php
          printArr($arrCopy2);
          ?>
        </div>
      </div>
      <!-- vector desordenado -->
      <div class="vector">
        <h2>Vector desordenado</h2>
        <div class='vectorItem'>
          <?php
          printArr($arrCopy);
          ?>
        </div>
      </div>
    <?php  } ?>
  </div>
</body>
<!-- js -->
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

</html>