<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- favIcon -->
  <link rel="icon" type="image/x-icon" href="assets/array-1.webp" />
  <!-- cache -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <!-- Boostrap v4.6.% -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/3a39e9961a.js" crossorigin="anonymous"></script>
  <!-- styles -->
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="../styles/navbar.css" />
  <link rel="stylesheet" href="../styles/form.css">
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
            <a class="nav-link h4" href="matriz.php">
              Matriz de Números
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <form action="php/form.php" method="get" id="form">
      <div class="row mb-2">
        <div class="col">
          <input type="text" class="form-control form-control-lg" placeholder="Nombre" aria-label="nombre" name="nombre" required />
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-lg" placeholder="Apellido" aria-label="apellido" name="apellido" required />
        </div>
      </div>
      <div class="row mb-2">
        <div class="col">
          <select id="habitacion" class="form-control form-control-lg" aria-label="habitacion" name="habitacion" required>
            <option value="" disabled selected hidden>
              Selecciona una habitación
            </option>
            <option value="1">Habitación 1</option>
            <option value="2">Habitación 2</option>
            <option value="3">Habitación 3</option>
            <option value="4">Habitación 4</option>
            <option value="5">Habitación 5</option>
          </select>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col">
          <input type="number" class="form-control form-control-lg" placeholder="Días de estancia" aria-label="días de estancia" name="dias" id="diasEstancia" required />
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-lg btn-block">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
</body>
<!-- scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>