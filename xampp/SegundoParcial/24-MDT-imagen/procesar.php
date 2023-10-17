<head>
    <title>Subir imagen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body style="margin:50px;width: 30%;">


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"]) && !(empty($_FILES["file"]["tmp_name"]))) {
        $targetDir = "uploads/";  // Directorio donde se guardarán las imágenes
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);

        // Verificar si el archivo es una imagen real
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) { ?>

                <div class="alert alert-success" role="alert">
                    <strong>El archivo </strong> <?php echo htmlspecialchars(basename($_FILES["file"]["name"]));   ?> se ha subido correctamente.
                </div>

            <?php
            } else {
                echo "Hubo un problema al subir el archivo.";
            }
        } else { ?>

            <div class="alert alert-warning" role="alert">
                <strong>El archivo </strong> no es una imagen válida.
            </div>

        <?php
        }
    } else { ?>
        <div class="alert alert-danger" role="alert">
            <strong>No se ha enviado ningún archivo.</strong>
        </div>
    <?php
    }
    ?>
</body>
