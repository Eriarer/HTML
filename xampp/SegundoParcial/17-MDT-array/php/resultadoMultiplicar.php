<?php

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- favIcon -->
  <link rel="icon" type="image/x-icon" href="../assets/array-1.webp" />
  <!-- cache -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <!-- Boostrap v4.6.% -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/3a39e9961a.js" crossorigin="anonymous"></script>
  <!-- styles -->
  <link rel="stylesheet" href="../styles/navbar.css" />
  <link rel="stylesheet" href="../styles/form.css" />
  <link rel="stylesheet" href="../styles/modalMult.css" />
  <!-- script -->
  <script src="../script/modal.js"></script>
  <title>ARRAYS</title>
</head>

<body>
  <div class="wrapper">
    <nav class="navbar navbar-expand-xl">
      <a class="navbar-brand" href="#">
        <h1 class="h3">
          Multiplicar
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span></span>
          </button>
        </h1>
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link h4" href="../index.html">
              Menu principal
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link h4" href="#">
              Tabla de Multiplicar
              <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link h4" href="../html/matriz.html">
              Matriz de Números
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="formulario">
      <form action="../php/resultadoMultiplicar.php" method="get" id="form">
        <div class="row mb-2">
          <div class="col">
            <input type="number" class="form-control form-control-lg" placeholder="Tabla de multiplicar: 5" aria-label="Tabla de multiplicar" name="multBase" value="<?php echo isset($_GET['multBase']) ? $_GET['multBase'] : ''; ?>" disabled />
          </div>
          <div class="col">
            <input type="number" class="form-control form-control-lg" placeholder="Hasta donde llegara la tabla: 10" aria-label="Hasta donde llegara la tabla" name="multLim" value="<?php echo isset($_GET['multLim']) ? $_GET['multLim'] : ''; ?>" disabled />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-lg btn-block font-weight-bold" disabled>
              Calcular!
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="contenedor">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col" class="font-weight-bold">Multiplicando</th>
          <th scope="col" class="font-weight-bold">Multiplicador</th>
          <th scope="col" class="font-weight-bold">Resultado</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_GET['multBase']) && isset($_GET['multLim']))
        {
          $multBase = $_GET['multBase'];
          $multLim = $_GET['multLim'];
        }
        else
        {
          // numero aleatorio de  a 10
          $multBase = 5;
          $multLim = 15;
        }
        if ($multLim >= 0)
        {
          for ($i = 0; $i <= $multLim; $i++)
          {
            $resultado = $multBase * $i;
            echo "<tr>
                    <td>$multBase</td>
                    <td>$i</td>
                    <td>$resultado</td>
                  </tr>";
          }
        }
        else
        {
          // es negativo el for es al reves 
          for ($i = 0; $i >= $multLim; $i--)
          {
            $resultado = $multBase * $i;
            echo "<tr>
                    <td>$multBase</td>
                    <td>$i</td>
                    <td>$resultado</td>
                  </tr>";
          }
        }
        ?>
      </tbody>
    </table>
    <hr>
    <button class="btn " onclick="regresarAlMenu('../html/multiplicar.html')">Regresar</button>
  </div>
</body>
<!-- scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
  mostrarModal();
</script>

</html>