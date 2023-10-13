<?php
include "menu.html";
include "modelo.php";
?>
<link rel="stylesheet" href="estilos.css">
<div style="padding-top:20px;" class="centrar">
  <h1>Opcion#1 para imprimir</h1>
  <?php
  foreach ($empleados as $emp => $detalles)
  {
    echo "<h1 class='badge badge-info '>$emp</h1>";
    foreach ($detalles as $indice => $valor)
    {
      echo "<p>$indice: $valor</p>";
    }
  }
  ?>
</div>
<?php
include "piepagina.php";
?>