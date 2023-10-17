<?php include 'arreglos.php'; ?>

<head>
  <!-- bootstrap 4.6.2 -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous' />

  <!-- cache -->
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate" />

  <link rel="stylesheet" href="miestilo.css">
</head>

<body>
  <div class="heading container-fluid d-flex justify-content-center">
    <p class="h1">Melgoza de la Torre Abraham</p>
  </div>
  <div class="body d-flex align-content-center justify-content-center">
    <div class="card ">
      <div class="card-header">
        Cliente
      </div>
      <div class="card-body p-2">
        <form method="post" action="mostrar.php">
          <!-- grados de estudios -->
          <article>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <pre>Estudios</pre>
                </div>
              </div>
              <select name="gr" required>
                <option value="" selected disabled hidden>Seleccionar...</option>
                <?php
                // recorrer niveles de estudios
                foreach ($nivelEstudios as $key => $value)
                {
                ?>
                  <option value="<?php echo $value ?>"><?php echo $value ?></option>
                <?php } ?>
              </select>
            </div>
          </article>
          <!-- colores -->
          <article>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <pre>Colores </pre>
                </div>
              </div>
              <select name="color" required>
                //hacer una opcion por defecto invalida
                <option value="" selected disabled hidden>Seleccionar..</option>
                <?php
                // recorrer colores
                foreach ($colores as $key => $value)
                {
                ?>
                  <option value="<?php echo $value ?>"><?php echo $value ?></option>
                <?php } ?>
              </select>
            </div>
          </article>
          <!-- mascotas -->
          <h4 class="card-title">Mascotas</h4>
          <article class="mascotas m-2">
            <?php
            // recorrer mascotas
            foreach ($mascotas as $key => $value)
            {
            ?>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" value="<?php echo $value ?>" name="<?php echo $value ?>">
                  </div>
                </div>
                <p class="form-control"><?php echo $value ?></p>
              </div>
            <?php } ?>
          </article>
          <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
      </div>
    </div>
  </div>



</body>