<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Boostrap v4.6.% -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <!-- SweetAlert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-dark bg-dark mb-4">
    <h2>
      Melgoza de la Torre Abraham
    </h2>
  </nav>
  <div class="container">
    <script>
      function validar(e) {
        tecla = e.keyCode;
        if (document.getElementById("Bandera").innerHTML == "True") {
          swal("Se ha ingresado", "True", "success");
        } else {
          swal("Se ha ingresado", "False", "error");
        }
      }
    </script>
    <h4>Caputar "verdadero" o "falso"</h4>
    <button type="button" class="btn btn-secondary" disabled>Bandera</button>
    <button type="button" class="btn btn-dark" id="Bandera" onclick="toggle()">True</button>
    <div class="mt-4">
      <!-- enviar un e -->
      <button class="btn btn-secondary" id="verAlerta" onclick="validar(event)">Ver Alerta</button>
    </div>
</body>
<script>
  function toggle() {
    var boton = document.getElementById("Bandera");
    if (boton.innerHTML == "True") {
      boton.innerHTML = "False";
    } else {
      boton.innerHTML = "True";
    }
  }
</script>

</html>