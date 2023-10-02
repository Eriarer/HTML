<head>
  <style>
    body {
      margin-left: 50px;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <h1>Programa#2</h1>
  <h2>Melgoza de la Torre Abraham</h2>
  <?php
    //  comentario
    // comentario
    /*
     * comentario
     * comentario
     */
    print ('Hola Mundo');
    echo '<h3> Hola Mundo <h3>';

    $carrera = 'ISC';
    $texto = "<p>Estudiante de la carrera $carrera </p>";
    echo $texto;
    $texto = '<p>Estudiante de la carrera ' . $carrera . '</p>';
    echo $texto;

    if (isset($_GET['base']) && isset($_GET['altura'])) {
      $base = $_GET['base'];
      $altura = $_GET['altura'];
      echo "Base= $base <br>";
      echo "Altura= $altura <br>";
      $area = calcularArea($base, $altura);
      echo "<h3 style= 'background:yellow;color:blue;'>El area del triangulo es $area</h3>";
    } else
      echo "<h3 style= 'background:green;color:white;'>No procede el calculo del area de un trianguulo</h3>";

    $personas = ['Carlos', 'Luis', 'Bety', 'Ana', 'Guillermo'];
    echo "<h4 $personas[0] $personas[1] $personas[2] $personas[3] $personas[2] </h4>";

    function calcularArea($b, $h)
    {
      return ($b * $h) / 2.0;
    }
  ?>
  <h1>Listado de Nombres</h1>
  <ul>
    <?php
      foreach ($personas as $persona) {
        echo "<li>$persona</li>";
      }
    ?>
  </ul>
</body>