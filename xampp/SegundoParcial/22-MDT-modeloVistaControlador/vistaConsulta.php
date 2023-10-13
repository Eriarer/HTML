<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
  <?php
  include "menu.html";
  include "modelo.php";
  $id = $_POST['id'];
  if (array_key_exists($id, $empleados))
  { ?>
    <div style="display:flex;justify-content:center;padding-top:50px;">
      <div class=" card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">Empleado: </div>
        <div class="card-body">
          <h5 class="card-title"><?php echo $empleados[$id]['nombre']; ?></h5>
          <p class="card-text">sueldo: <?php echo $empleados[$id]['sueldo']; ?></p>
          <p class="card-text">puesto: <?php echo $empleados[$id]['puesto']; ?></p>
        </div>
      </div>
    </div>
  <?php
  }
  else
  {
  ?>
    <div style="display:flex;justify-content:center;padding-top:50px;">
      <div style="width: 25%; " class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Empleado: <?php echo $id ?></strong> <br> No registrado.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  <?php
  }
  ?>
</body>

</html>
<?php
include "piepagina.php";
?>