<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "13-criptpwd");
if (!$conexion)
{
  die("Error de conexión: " . mysqli_connect_error());
}

// Recuperar datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];


// Insertar datos en la base de datos
$query = "SELECT * FROM usuarios WHERE Usr_name = '$usuario'";
$resultado = mysqli_query($conexion, $query);


if ($resultado)
{
  $row = mysqli_fetch_assoc($resultado);
  if (password_verify($password, $row['Usr_Pwd']))
  {
    echo "0"; // sin errores, usuario y contraseña correctos
  }
  else
  {
    echo "1"; // contraseña incorrecta
  }
}
else
{
  echo "2"; // usuario no existe
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
