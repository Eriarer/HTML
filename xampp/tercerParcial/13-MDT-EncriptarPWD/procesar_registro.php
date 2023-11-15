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

// Encriptar la contraseña
$password_encriptada = password_hash($password, PASSWORD_BCRYPT);

// Insertar datos en la base de datos
$query = "INSERT INTO usuarios (Usr_name, Usr_Pwd) VALUES ('$usuario', '$password_encriptada')";
$resultado = mysqli_query($conexion, $query);

if ($resultado)
{
  echo "Registro exitoso";
}
else
{
  echo "Error al registrar usuario";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
