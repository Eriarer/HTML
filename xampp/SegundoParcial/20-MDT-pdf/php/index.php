<?php
function validarCadena($cadena)
{
  // Eliminar todo el bloque php del codigo
  $cadena = preg_replace('/<\?php.*?\?>/ms', '', $cadena);

  // Eliminar caracteres maliciosos o no deseados
  $cadena = preg_replace('/[<>\'";{}()$?$]/', '', $cadena);

  // Reducir múltiples espacios en blanco a uno solo
  $cadena = preg_replace('/\s+/', ' ', $cadena);

  // Eliminar espacios en blanco al principio y al final
  $cadena = trim($cadena);

  // Eliminar los slashes
  $cadena = stripslashes($cadena);

  return $cadena;
}

// importar libreria FPDF
require_once('../pdf/fpdf.php');

function addTitle($pdf, $title)
{
  $pdf->SetFont('courier', 'B', 25); //font courrier, bold, 18
  $pdf->Cell(0, 10, $title, 0, 1, 'C'); //cell ancho, alto, texto, borde, salto de linea, centrado
  $pdf->Ln(10); //salto de linea
}



//verificar que vengamos de un post lleno
if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
  // cambiar al documento ../index.html
  header('Location: ../index.html');
}




$nombreAlumno = validarCadena($_POST['nombres']);
$apellidos = validarCadena($_POST['apellidos']);
$nombreCompleto = validarCadena($nombreAlumno . ' ' . $apellidos);
$profesor = validarCadena($_POST['profesor']);
$curso = validarCadena($_POST['curso']);
$horas = $_POST['horasCurso'];
$fechaFin = $_POST['fechaFin'];


// creando pdf
$pdf = new FPDF();
// agregar pagina
$pdf->AddPage();
// agregar logo
$pdf->Image('../assets/UAA-LOGO.png', 10, 10, 50); //imagen, x, y, ancho
$pdf->Ln(22); //salto de linea
// agregar titulo
addTitle($pdf, 'CONSTANCIA DE ESTUDIOS');
// agregar texto 


function addFormattedText($pdf, $text, $bold = false, $addNewLine = false)
{
  if ($bold) {
    $pdf->SetFont('courier', 'B', 18); // Fuente en negritas (puedes cambiar a Arial u otra fuente compatible)
  } else {
    $pdf->SetFont('courier', '', 18); // Fuente normal (puedes cambiar a Arial u otra fuente compatible)
  }

  $text = mb_convert_encoding($text, 'ISO-8859-1', 'UTF-8');
  // añadir el texto de corrido de forma justificada sin multicell
  $pdf->Write(5, $text);

  //$pdf->MultiCell(0, 5, $text, 0, 'J'); // Texto justificado

  if ($addNewLine) {
    $pdf->Ln(10); // Agregar salto de línea
  }
}

// Luego, puedes usar esta función para agregar el texto en el PDF y controlar el salto de línea
addFormattedText($pdf, "La ");
addFormattedText($pdf, "Universidad Autónoma de Aguascalientes ", true);
addFormattedText($pdf, "hace constar que:", false, true); // Agregar un salto de línea aquí
addFormattedText($pdf, "El alumno");
addFormattedText($pdf, " $nombreCompleto ", true);
addFormattedText($pdf, "ha participado y dado fin al curso de");
addFormattedText($pdf, " $curso ", true);
addFormattedText($pdf, "impartido por el profesor");
addFormattedText($pdf, " $profesor ", true);
addFormattedText($pdf, "con una duración de $horas horas de manera excelente, el cual concluyó el día");
addFormattedText($pdf, " $fechaFin ", true, true);
addFormattedText($pdf, "Avalado por el director Juan Pérez Pérez");


$pdf->Image('../assets/Firmas_cover.png', 50, 100, 100, 50); //imagen, x, y, ancho, alto
// colocar el cursor en la posicion x, y
$pdf->SetXY(70, 135);
addFormattedText($pdf, "______________", true);

// colocar el cursor en la posicion x, y
$pdf->SetXY(85, 150);
addFormattedText($pdf, "firma", true);

?>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

  <!-- Boostrap v4.6.% -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <!-- css -->
  <link rel="stylesheet" href="../styles/style.css" />
  <title>Constancia</title>
</head>

<body class="overflow-hidden m-0 w-100">
  <!-- header y formulario -->
  <div class="wrapper">
    <div class="heading px-0 pb-2 px-sm-3 px-md-5 m-0 w-100">
      <div class="names">
        <h1>Constancia de estudios</h1>
        <h4>Melgoza de la Torre Abraham</h4>
      </div>
      <!-- agregar un boton hasta la derecha que te regrese al ../index.html -->
      <div class="boton d-flex align-items-center">
        <a href="../index.html" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center h-50">Regresar</a>
      </div>
    </div>
    <div class="pdfView ">

      <object data="data:application/pdf;base64,<?php echo base64_encode($pdf->Output('S')); ?>" type="application/pdf" width="100%" height="100%">
        <embed src="data:application/pdf;base64,<?php echo base64_encode($pdf->Output('S')); ?>" type="application/pdf" width="100%" height="100%" />
      </object>
    </div>
  </div>
</body>
<!-- Boostrap v4.6.% -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>