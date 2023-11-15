<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encriptación de contraseñas</title>
  <!-- Boostrap v4.6.% -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <!-- Estilos -->
  <link rel="stylesheet" href="style.css">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <h4 id="Title" class="container text-center mt-5">Iniciar Sesión</h4>
  <form class="container mt-2 loginForm">
    <input type="text" value="login" name="formType" id="formType" hidden>
    <!-- Usuario -->
    <div class="form-group row">
      <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="usuario" name="usuario">
        <small id="usuarioText" class="form-text text-muted"> </small>
      </div>
    </div>
    <!-- Contraseña -->
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="password" name="password">
        <small id="passwordText" class="form-text text-muted"> </small>
      </div>
    </div>
    <!-- Botones Iniciar sesión y Registrarse -->
    <div class="form-group row row-cols-2 d-flex justify-content-center ml-5">
      <div class="col-sm-5">
        <small class="form-text text-muted"> </small>
        <button type="submit" class="btn btn-primary" id="submit">Iniciar sesión</button>
      </div>
      <div class="col-sm-5 ">
        <small id="formToggle" class="form-text text-muted">¿No tienes cuenta?</small>
        <button type="button" class="btn btn-primary" id="ToggleForm">Registrarse</button>
      </div>
    </div>
  </form>
  <h3 id="bienvenida" class="container text-center"></h3>
  <script>
    $(document).ready(function() {
      $("form").submit(function(e) {
        e.preventDefault();

        var usuario = $("#usuario").val();
        var password = $("#password").val();
        if (usuario == "" || password == "") {
          if (usuario == "") {
            $("#usuarioText").text("Por favor, ingresa un usuario.");
          }
          if (password == "") {
            $("#passwordText").text("Por favor, ingresa una contraseña.");
          }
          return;
        }
        if ($("#formType").val() == "register") {
          $.ajax({
            type: "POST",
            url: "procesar_registro.php", // Archivo PHP para procesar el registro
            data: {
              usuario: usuario,
              password: password
            },
            success: function(data) {
              // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
              alert(data);
              //eliminar lo que tenga dentro el input
              $("#usuario").val("");
              $("#password").val("");
            }
          });
        } else if ($("#formType").val() == "login") {
          $.ajax({
            type: "POST",
            url: "procesar_login.php", // Archivo PHP para procesar el login
            data: {
              usuario: usuario,
              password: password
            },
            success: function(data) {
              // 0 sin errores, usuario y contraseña correctos
              // 1 contraseña incorrecta
              // 2 usuario no existe
              switch (data) {
                case "0":
                  $("#bienvenida").text("Bienvenido " + usuario);
                  break;
                case "1":
                  $("#passwordText").text("Contraseña incorrecta.");
                  break;
                case "2":
                  $("#usuarioText").text("El usuario no existe.");
                  break;
              }
              //eliminar lo que tenga dentro el input
              $("#usuario").val("");
              $("#password").val("");
            }
          });
        }
      });

      $("#password").on("input", function() {
        $("#passwordText").text(" ");
      });

      // solo funciona esto si estamos en el registro
      $("#usuario").on("input", function() {
        if ($("#formType").val() == "login") {
          $("#usuarioText").text(" ");
          return;
        }
        var usuario = $(this).val();
        console.log(usuario);
        $.ajax({
          type: "POST",
          url: "verificar_usuario.php", // Archivo PHP que verificará la existencia del usuario
          data: {
            usuario: usuario
          },
          success: function(data) {
            if (data === "existe") {
              $("#usuarioText").text("El usuario ya existe. Por favor, elige otro.");
              $("#submit").prop("disabled", true);
            } else {
              $("#usuarioText").text(" ");
              $("#submit").prop("disabled", false);
            }
          }
        });
      });


      // Toggle entre formularios
      $("#ToggleForm").click(function() {
        if ($("#formType").val() == "login") {
          $("#formType").val("register");
          $("#submit").text("Enviar registro");
          $("#ToggleForm").text("Iniciar sesión");
          $("#formToggle").text("¿Ya tienes cuenta?");
          //modificar la clase
          $("form").removeClass("loginForm");
          $("form").addClass("registerForm");
          $("#Title").text("Registrarse");
        } else {
          $("#formType").val("login");
          $("#submit").text("Iniciar sesión");
          $("#ToggleForm").text("Registrarse");
          $("#formToggle").text("¿No tienes cuenta?");
          //modificar la clase
          $("form").removeClass("registerForm");
          $("form").addClass("loginForm");
          $("#Title").text("Iniciar sesión");
        }
        $("#usuarioText").text(" ");
        $("#passwordText").text(" ");
        $("#usuario").val("");
        $("#password").val("");
      });
    });
  </script>
</body>

</html>