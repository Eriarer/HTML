<body>
    

<?php
 
require 'formulario.php';

?>
<div style="margin:100px;">
<?php
     
 
    $usuario = $_POST["login"];
    $contra = $_POST["contra"];
     
    $file = fopen("archivo.txt","a+");
     
    fwrite($file, $usuario." ".$contra."\r\n");
    
    fclose($file);
    echo "<br> cuenta insertada <br>";   
     
    echo "<br><a href='formulario.php'>regresar</a>";

?>
</div>
</body>

