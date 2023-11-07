<?php
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'bd-04';
//conexion a la base de datos
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
if ($conexion->connect_errno) {
  die('Error en la conexion');
} else {
  if (isset($_POST['submit'])) {
    // Conexión exitosa con post
    $eliminar = $_POST['eliminar'];
    //hacemos la cadena con la sentencia mysql para eliminar
    $sql = "DELETE FROM usuarios WHERE id = '$eliminar'";
    $conexion->query($sql);
    if ($conexion->affected_rows >= 1) {
      echo '<script> alert("registro eliminado") </script>';
    } // fin rows affected
  } // fin conexion exitosa con post
  $sql = 'select * from usuarios';
  $resultado = $conexion->query($sql);
  if ($resultado->num_rows) { // si la consulta genera registros
    $self = htmlspecialchars($_SERVER["PHP_SELF"]);
?>
    <div>
      <form action="<?php echo $self ?>" method="post">
        <legend>Eliminar Cuentas</legend>
        <select class="browser-default custom-select" name='eliminar'>
          <?php
          while ($fila = $resultado->fetch_assoc()) {
            echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
          }
          ?>
        </select>
        <button type="submit" value="submit" name="submit">Eliminar</button>
      </form>
    </div>
<?php
  } else {
    echo "<h2>No hay registros</h2>";
  } // fin sql num rows
} // fin conexion exitosa
?>