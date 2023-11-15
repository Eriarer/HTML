<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "13-criptpwd");
if (!$conexion)
{
  die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si el usuario ya existe
$usuario = $_POST['usuario'];
$query = "SELECT * FROM usuarios WHERE Usr_name = '$usuario'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0)
{
  echo "existe";
}
else
{
  echo "no_existe";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
