<?php include 'arreglos.php'; ?>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <link rel="stylesheet" href="miestilo.css">
</head>

<body>
  <div class="heading container-fluid d-flex justify-content-center">
    <p class="h1">Melgoza de la Torre Abraham</p>
  </div>
  <div class="body d-flex align-content-center justify-content-center">
    <div class="card">
      <div class="card-header">
        Servidor
      </div>
      <div class="card-body p-2">
        <h4 class="card-title">Datos en la Peticion</h4>
        <p class="card-text"><?php echo "Mascotas:<br> ";
                              $empty = true;
                              foreach ($mascotas as $key => $value) {
                                if (isset($_POST[$value])) {
                                  echo "<pre>   " . $value . "</pre>";
                                  $empty = false;
                                }
                              }
                              if ($empty) {
                                echo "ninguna";
                              } ?>
        </p>
        <p class="card-text">grado de estudios:<br></p>
        <pre class="card-text"><?php echo "   ", $_POST["gr"] ?> </pre>
        <p class="card-text">color:<br></p>
        <pre class="card-text"><?php echo "   ", $_POST["color"] ?> </pre>
      </div>
    </div>
  </div>


</body>