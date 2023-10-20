<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Correos</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- bootstrap 4.6.2 -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous' />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <article class="heading w-100 overflow-hidden">
    <div class="heading px-0 pb-2 px-sm-3 px-md-5  w-100">
      <div class="names">
        <h1>Correo</h1>
        <h4>Melgoza de la Torre Abraham</h4>
      </div>
    </div>
  </article>
</body>
<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');

// Contraseña
require('configPWD.php');
$password = $config['password'];

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!isset($_SESSION['emailSent']) || $_SESSION['emailSent'] === false) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $text = $_POST['text'];

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      // Server settings
      $mail->SMTPDebug = 0;                      // Enable verbose debug output
      $mail->isSMTP();                            // Send using SMTP
      $mail->Host = 'smtp.office365.com';         // Servidor SMTP de Hotmail
      $mail->SMTPAuth = true;                    // Enable SMTP authentication
      $mail->Username = 'eriarerspam@outlook.com';  // SMTP username
      $mail->Password = $password;                // SMTP password
      $mail->SMTPSecure = 'STARTTLS';             // Enable implicit TLS encryption
      $mail->Port = 587;                          // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      // Configura los destinatarios
      $mail->setFrom('eriarerspam@outlook.com', 'Abraham Messiah');
      $mail->addAddress($email, $name);

      $mail->isHTML(true);                      // Set email format to HTML
      $mail->Subject = 'Contacto';
      $mail->Body = "Muchas gracias <b>$name</b> por contactarnos, te atenderemos lo más rápido posible<br>Queja:<br>$text";
      $mail->AltBody = "Muchas gracias $name por contactarnos, te atenderemos lo más rápido posible
    Queja:
    $text";

      $mail->send();
      $_SESSION['emailSent'] = true;
?>

      <body>
        <article class="correoEnviado">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title h3">Correo Enviado</h5>
              </div>
              <div class="modal-body">
                <p>Querid@ <span class="font-weight-bold usuario"><?php echo $name ?></span> el correo se ha enviado,
                  hemos enviado una respuesta automática a <b><?php echo $email; ?></b>. Verifica que te haya llegado,
                  probablemente esté en la carpeta de spam.</p>
              </div>
              <div class="modal-footer">
                <a type="submit" class="btn btn-info" href="<?php $_SESSION['emailSent'] = false;
                                                            echo $_SERVER['PHP_SELF']; ?>">Regresar</a>
              </div>
            </div>
          </div>
        </article>
      </body>

    <?php
    } catch (Exception $e) {
    ?>

      <body>
        <article class="ErrorCorreo">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title h3">Error al enviar el correo</h5>
              </div>
              <div class="modal-body">
                <p>Lo sentimos, los servidores están ocupados, inténtalo más tarde.</p>
              </div>
              <div class="modal-footer">
                <a type="submit" class="btn btn-info" href="<?php $_SESSION['emailSent'] = false;
                                                            echo $_SERVER['PHP_SELF']; ?>">Regresar</a>
              </div>
            </div>
          </div>
        </article>
      </body>
  <?php
    } // fin catch
  } else {
    // Redirecciona si ya se ha enviado el correo
    $_SESSION['emailSent'] = false;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
  }
} else { // else del if de método POST
  ?>

  <body>
    <div class="d-flex justify-content-center align-items-center text-center">
      <div class="mail m-2">
        <div class="wrapper d-flex flex-column justify-content-center align-content-center">
          <h2>Contactanos</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-0">
            <div class="row row-cols-2 m-0 p-0">
              <div class="col m-0">
                <div class="form-group">
                  <label for="name" class="formLabel p-0 w-0">Nombre</label>
                  <input type="text" class="form-control p-0 w-0" id="name" aria-describedby="nombre" name="name" required>
                </div>
              </div>
              <div class="col m-0">
                <div class="form-group">
                  <label for="email" class="formLabel p-0 w-0">Correo electrónico</label>
                  <input type="email" class="form-control p-0 w-0" id="email" aria-describedby="correo" name="email" required>
                  <small id="emailHelp" class="form-text text-custom">Tu correo de contacto.</small>
                </div>
              </div>
            </div>
            <div class="row row-cols-1 pl-3 pr-3">
              <div class="col p-0">
                <div class="form-group">
                  <label for="text" class="formLabel p-0 w-0">Texto</label>
                  <input type="text" class="form-control p-0 w-0 text" id="text" name="text" required>
                </div>
              </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 py-1 px-1 px-md-2 d-flex justify-content-center">
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>

<?php } // fin else del if de método POST
?>

</html>