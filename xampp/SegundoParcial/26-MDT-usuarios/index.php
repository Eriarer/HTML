<?php
require "FileReader.php"; // Asegúrate de incluir el archivo de la clase FileReader

// Crear una instancia de FileReader
$fileReader = new FileReader('usuarios.txt');

// Abre el archivo para lectura
$fileReader->openFile();

$error = 0;

// contraseñas encriptadas con password_hash
// llenar arrary con el contenido del archivo
// palabra1 key
// palabra2 value
$usuarios = array();
while (($line = $fileReader->readLine()))
{
  $line = explode(' ', $line);
  $usuarios[$line[0]] = $line[1];
}


function usuarioExiste($usuario)
{
  global $usuarios;
  if (array_key_exists($usuario, $usuarios))
  {
    return true;
  }
  return false;
}

function verificarPassword($usuario, $password)
{
  global $usuarios;
  if (password_verify($password, $usuarios[$usuario]))
  {
    return true;
  }
  return false;
}

function verificarUsuario($usuario, $password): int
{
  if (!usuarioExiste($usuario))
  {
    return 1;
  }
  if (!verificarPassword($usuario, $password))
  {
    return 2;
  }
  return 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  global $error;

  $error = 0;
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $error = verificarUsuario($usuario, $password);
}

?>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap 4.6.2 -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous' />
  <!-- css -->
  <link rel="stylesheet" href="style.css">
  <title>Log-Ing</title>
</head>

<body class="overflow-auto">
  <div class="wraper d-flex flex-column justify-content-center align-items-center w-100">
    <article class="heading w-100 overflow-hidden">
      <div class="heading px-0 pb-2 px-sm-3 px-md-5 m-0 w-100 d-flex justify-content-between">
        <div class="names">
          <h1>Log In</h1>
          <h4>Melgoza de la Torre Abraham</h4>
        </div>
        <div class="lastMod d-flex flex-column align-items-center justify-content-center">
          <h4>Ultima modificacion</h4>
          <h5>
            <!-- last date -->
            <?php
            echo date("d-m-Y h", getlastmod());
            ?>
          </h5>
        </div>
      </div>
    </article>
    <?php
    if (!function_exists('password_verify'))
    {
    ?>
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error</h4>
        <p>Esta version de PHP no es compatible con el sistema de encriptacion de contraseñas</p>
        <hr>
        <p class="mb-0">Actualiza tu version de PHP</p>
      </div>
    <?php
    }
    else if ($error != 0 || !isset($_POST['usuario']))
    {
    ?>
      <article class="logIng">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg2 py-1 px-1 px-md-2">
            <div class="col">
              <div class="form-group">
                <label for="user" class="formLabel">Usuario</label>
                <input type="text" class="form-control" id="user" aria-describedby="usuario" name="usuario" value="<?php if (isset($usuario))  echo $usuario; ?>">
                <?php
                if ($error == 1)
                {
                  echo '<small id="emailHelp" class="form-text text-danger error">El usuario no existe</small>';
                }
                ?>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="password" class="formLabel">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
                <?php
                if ($error == 2)
                {
                  echo '<small id="emailHelp" class="form-text text-danger error">Contraseña incorrecta</small>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 py-1 px-1 px-md-2 d-flex justify-content-center">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
      </article>

    <?php
    }
    else
    {
    ?>
      <article class="welcome">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title h3">Bienvenido</h5>
            </div>
            <div class="modal-body">
              <p>Bienvenid@ <span class="font-weight-bold usuario"><?php echo $usuario ?></span> tiempo sin verte</p>
            </div>
            <div class="modal-footer">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="none">
                <button type="submit" class="btn btn-info">Salir</button>
              </form>
            </div>
          </div>
        </div>
      </article>
    <?php } ?>
  </div>
</body>

</html>