<?php
$min = $_POST["min"];
$max = $_POST["max"];
$limit = $_POST["limit"];
$numeros = '';
for ($i = 0; $i < $limit; $i++) {
  $numeros .= rand($min, $max);
  $numeros .= $i + 1 == $limit ? '' : ',';
}
echo "$numeros";
