<?php
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'bd-04';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
  die('Error en la conexion');
}

$resultado = $conexion->query("SELECT * FROM usuarios");
//obtener todos los usuarios en un vector de usuarios
$usuarios = array();
while ($fila = $resultado->fetch_assoc()) {
  $usuarios[] = array(
    'id' => $fila['id'],
    'nombre' => $fila['nombre'],
    'cuenta' => $fila['cuenta'],
    'contrasena' => $fila['contrasena']
  );
}
$self = $_SERVER['PHP_SELF'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>RegEdit</title>
  <!-- bootstrap 4.6.2 -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous' />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="wrapper">
    <form class="container my-2" id="myForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="contianer mb-3">
        <!-- hacer un select con el id de usuario -->
        <legend>Eliminar Cuentas</legend>
        <label for="ogId">Seleccionar usuario</label>
        <select class="browser-default custom-select" name='ogId' id="ogId">
          <?php
          foreach ($usuarios as $usuario) {
            echo "<option value='{$usuario['id']}'>{$usuario['id']}</option>";
          }
          ?>
        </select>
      </div>
      <table class="table table-striped table-light">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>ID</th>
            <td id="usrid"></td>
            <td><input type="text" name="id" id="id" min="1" max="11" required></td>
          </tr>
          <tr>
            <th>Nombre</th>
            <td id="usrnom"></td>
            <td><input type="text" name="nom" min="1" max="40" required></td>
          </tr>
          <tr>
            <th>Cuenta</th>
            <td id="usrcue"></td>
            <td><input type="text" name="cue" min="1" max="8" required></td>
          </tr>
          <tr>
            <th>Contraseña</th>
            <td id="usercon"></td>
            <td><input type="password" name="con" min="1" max="8" required></td>
        </tbody>
      </table>
      <div class="d-flex flex-column justify-content-center">
        <button type="submit" class="btn btn-dark">Editar</button>
      </div>
    </form>
  </div>
  <script>
    //obtener los datos del arreglo de usuarios
    globalThis.usuarios = <?php echo json_encode($usuarios); ?>;
    var ogId = document.getElementById('ogId');
    // obtener de la tabla sql los datos del usuario seleccionado
    ogId.addEventListener('change', function() {
      var id = ogId.value;
      //buscar el usuario seleccionado
      var usuario = usuarios.find(function(usuario) {
        return usuario.id == id;
      });
      //mostrar los datos del usuario seleccionado
      document.getElementById('usrid').innerHTML = usuario.id;
      document.getElementById('usrnom').innerHTML = usuario.nombre;
      document.getElementById('usrcue').innerHTML = usuario.cuenta;
      document.getElementById('usercon').innerHTML = usuario.contrasena;
    });

    //llamar al evento
    ogId.dispatchEvent(new Event('change'));

    //agregar un event listener de submit al form
    document.addEventListener("DOMContentLoaded", function() {
      // Agregar un evento 'submit' al formulario
      document.getElementById("myForm").addEventListener("submit", function(e) {
        if (!validarFormulario()) {
          //si no se respondio todo validarormulario = true
          e.preventDefault(); // Evitar que el formulario se envíe
        }
      });

      function validarFormulario() {
        //validar que el id no sea clon de otro (si es el mismo id que el original es valido)
        var id = document.getElementById('id').value;
        var ogId = document.getElementById('ogId').value;
        if (id != ogId) {
          var idExiste = usuarios.some(function(usuario) {
            return usuario.id == id;
          });
          if (idExiste) {
            globalThis.tooltipId = 'id';
            //si el id existe
            mostrarTooltip("El id ya existe");
            return false;
          }
        }
      }

      function mostrarTooltip(mensaje) {
        $("#" + tooltipId)
          .tooltip({
            title: mensaje || "Este campo es obligatorio",
            placement: "top", // Puedes ajustar la posición del tooltip según tus necesidades
            trigger: "manual",
          })
          .tooltip("show");
      }

      // Ocultar cualquier tooltip que se haya mostrado al hacer clic en el formulario
      document.getElementById("myForm").addEventListener("click", function() {
        ocultarTooltips();
      });

      // Ocultar cualquier tooltip que se haya mostrado al cambiar el formulario
      document.getElementById("myForm").addEventListener("change", function() {
        ocultarTooltips();
      });

      function ocultarTooltips() {
        // Ocultar el tooltip si está visible
        $("#" + tooltipId).tooltip("hide");
      }
    });
  </script>
</body>

</html>