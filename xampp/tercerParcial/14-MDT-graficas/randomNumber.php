<?php
$min = $_POST["min"];
$max = $_POST["max"];
$limit = $_POST["limit"];

// Inicializa arrays para labels y números
$labels = array();
$numbers = array();

// Genera datos aleatorios
for ($i = 0; $i < $limit; $i++) {
  $labels[] = ($i + 1);
  $numbers[] = rand($min, $max);
}

// Crea un array asociativo con ambos arrays
$data = array(
  'labels' => $labels,
  'numbers' => $numbers
);

// Convierte el array en formato JSON
$cadenaJson = json_encode($data);

// Imprime el resultado
echo $cadenaJson;
