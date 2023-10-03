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
print('Hola Mundo');
echo '<h3> Hola persona <h3>';

$carrera = 'Inge en Sistemas';
$texto = "<p>Estudiante es un $carrera </p>";
echo $texto;
$texto = '<p>Estudiante es el ' . $carrera . '</p>';
echo $texto;

if (isset($_GET['base']) && isset($_GET['altura'])) {
    $base = $_GET['base'];
    $altura = $_GET['altura'];
    echo "Base= $base <br>";
    echo "Altura= $altura <br>";
    $area = calcularArea($base, $altura);
    echo "<h3 style= 'background:green;color:black;'>El area del rectangulo es $area</h3>";
} else {
    echo "<h3 style= 'background:red;color:black;'>No hay variables par calcular el rectangulo</h3>";
}

$personas = ['Miguel', 'Angel', 'Augusto', 'Heriberto'];
echo "<h4> $personas[0] $personas[1] $personas[2] $personas[3] $personas[2] </h4>";

function calcularArea($b, $h)
{
    return $b * $h;
}
?>
  <h1>Listado de nombrerijillos</h1>
  <ul>
<?php
foreach ($personas as $persona) {
    echo "<li>$persona</li>";
}
?>
  </ul>
</body>