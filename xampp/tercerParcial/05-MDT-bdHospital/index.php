<?php

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = '05-hospital';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hospital</title>
  <!-- Boostrap v4.6.% -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-dark bg-dark mb-4">
    <h2>
      Melgoza de la Torre Abraham
    </h2>
  </nav>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Num_Hab</th>
          <th scope="col">Nom_Paciente</th>
          <th scope="col">Diagnostico</th>
          <th scope="col">Nom_Medico</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($conexion->query('SELECT * from hospital') as $fila)
        {
          echo "<tr>";
          echo "  <td class='rowT'>" . $fila['Num_Hab'] . "</td>";
          echo "  <td>" . $fila['Nom_paciente'] . "</td>";
          echo "  <td>" . $fila['diagnostico'] . "</td>";
          echo "  <td>" . $fila['Nom_Medico'] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>