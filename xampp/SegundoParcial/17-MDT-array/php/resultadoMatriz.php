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
  <link rel="stylesheet" href="../styles/matTable.css" />
  <!-- script -->
  <script src="../script/meuBack.js"></script>
  <title>ARRAYS</title>
</head>

<body>
  <div class="wrapper">
    <nav class="navbar navbar-expand-xl">
      <a class="navbar-brand" href="#">
        <h1 class="h3">
          Matriz
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </span>
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
          <li class="nav-item">
            <a class="nav-link h4" href="../html/multiplicar.html">
              Tabla de Multiplicar
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link h4" href="../html/matriz.html">
              Matriz de Números
              <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="formulario">
      <form method="get" id="form">
        <div class="row mb-2">
          <div class="col">
            <input type="number" class="form-control form-control-lg" placeholder="Filas" aria-label="Filas" name="rows" min="1" value="<?php echo $_GET['rows'] ?>" />
          </div>
          <div class="col">
            <input type="number" class="form-control form-control-lg" placeholder="Columnas" aria-label="Columnas" name="cols" min="1" value="<?php echo $_GET['cols'] ?>" />
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <input type="number" class="form-control form-control-lg" placeholder="N menor" aria-label="Numero menor" name="min" id="min" value="<?php echo $_GET['min'] ?>" />
          </div>
          <div class="col">
            <input type="number" class="form-control form-control-lg" placeholder="N mayor" aria-label="Numero mayor" name="max" id="max" value="<?php echo $_GET['max'] ?>" />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-lg btn-block font-weight-bold">
              Calcular!
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="contenedor">
    <div class="btnHolder">
      <button class="btn btn-lg font-weight-bold " onclick="cambiarPagina('../html/matriz.html')">Regresar</button>
    </div>
    <table class="table">
      <tbody>
        <?php
        $rows = $_GET['rows'];
        $cols = $_GET['cols'];
        $min = $_GET['min'];
        $max = $_GET['max'];
        for ($i = 0; $i < $rows; $i++)
        {
          echo "<tr>";
          for ($j = 0; $j < $cols; $j++)
          {
            $random = rand($min, $max);
            if ($random % 2 == 0)
            {
              echo "<td class='par'>$random</td>";
            }
            else
            {
              echo "<td class='impar'>$random</td>";
            }
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
<!-- scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>