<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap 4.6.2 -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous' />
  <title>Document</title>
</head>

<style>
  /* establecer fuente */
  @font-face {
    font-family: 'JetBrainsMono-regular';
    src: url('fonts/JetBrainsMonoNerdFontPropo-Regular.ttf') format('truetype');
    /* Agrega otros formatos si es necesario */
  }

  /* fuente mono espaciada */
  * {
    font-family: 'JetBrainsMono-regular', sans-serif;
  }

  /* formato para mi nombre */
  .header {
    background-color: #343a40;
    color: #fff;
    padding: 1rem;
    text-align: center;
  }
</style>

<body>

</body>
<div class="container-fluid header">
  <h1 class="h1 font-weight-bold">Melgoza de la Torre Abraham</h1>
</div>
<div class="container-fluid">
  <h1 class="h2 font-weight-bolder">VAR DUMP y PRINT_R</h1>
  <?php
  $array = [1, 2, 3]; // declaracion de un arreglo
  echo "<h3 class='h5 font-weight-bold'>Array =  <span class='h6 font-weight-normal'>[1, 2, 3]</span></h3>";
  echo "<p class='h5'>var_dump:</p>";
  var_dump($array); // Imprime el array y su tipo de dato
  echo "<br><br>";
  echo "<p class='h5'>print_r:</p>";
  print_r($array); // Imprime el array
  ?>
  <hr>
  <h1 class="h2 font-weight-bolder">EMPTY y ISSET</h1>
  <?php
  $var1 = ""; // Variable vacía
  $var2 = 0;  // Valor 0 (considerado falso)
  $var3 = NULL; // Valor NULL
  $var4 = "Hola"; // Cadena con valor
  echo "<pre class='h5 font-weight-bold'>     \$var1 = \"\"     <span class='h6 font-weight-normal'> Variable vacía </span></pre>";
  echo "<pre class='h5 font-weight-bold'>     \$var2 = 0      <span class='h6 font-weight-normal'> Valor 0 (considerado falso)</span></pre>";
  echo "<pre class='h5 font-weight-bold'>     \$var3 = NULL   <span class='h6 font-weight-normal'> Valor NULL </span></pre>";
  echo "<pre class='h5 font-weight-bold'>     \$var4 = \"Hola\" <span class='h6 font-weight-normal'> Cadena con valor </span></pre>";

  echo "<p class='h5 font-weight-bold'>empty:</p>";
  // Comprobación con empty()
  echo "<p class='h7'> empty(\$var1): " . (empty($var1) ? "true" : "false") . "</p>";
  echo "<p class='h7'> empty(\$var2): " . (empty($var2) ? "true" : "false") . "</p>";
  echo "<p class='h7'> empty(\$var3): " . (empty($var3) ? "true" : "false") . "</p>";
  echo "<p class='h7'> empty(\$var4): " . (empty($var4) ? "true" : "false") . "</p>";

  echo "<br><p class='h5 font-weight-bold'>isset:</p>";
  // Comprobación con isset()
  echo "<p class='h7'> isset(\$var1): " . (isset($var1) ? "true" : "false") . "</p>";
  echo "<p class='h7'> isset(\$var2): " . (isset($var2) ? "true" : "false") . "</p>";
  echo "<p class='h7'> isset(\$var3): " . (isset($var3) ? "true" : "false") . "</p>";
  echo "<p class='h7'> isset(\$var4): " . (isset($var4) ? "true" : "false") . "</p>";
  ?>
</div>

</html>