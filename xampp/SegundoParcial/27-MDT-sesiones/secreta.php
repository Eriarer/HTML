<body>
<?php
ob_start(); //por si no funciona el header location (activa almacenamiento en buffer de salida)
$config['base_url'] = 'http://' . $_SERVER["SERVER_NAME"]; //nombre del servidor(dominio) en el que estas actualmente
require 'formulario.php';

?>

<div style="margin:100px;">

<?php

# Iniciar sesión para usar $_SESSION
session_start();

if (empty($_SESSION["usuario"])) {
    # Lo redireccionamos al formulario de inicio de sesión
    header("Location: formulario.php");
    # Y salimos del script
    exit();
} 

echo "Bienvenido(a) ". $_SESSION["usuario"]; 
 
if ( empty($_SESSION["compras"]) && empty($_POST["articulo"] ))
    echo "<br>carrito vacio";
else{
    echo "<p>Llevas comprado: ";
    array_push($_SESSION['compras'], $_POST['articulo']);
    print_r($_SESSION['compras']);
   }
  
?>
<p>
    Soy una pagina que solo pueden ver los usuarios logueados
</p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> " method="POST">     
   
           <select name="articulo">
               <option value="laptop">laptop</option>
               <option value="impresora">impresora</option>
               <option value="mouse">mouse</option>
               <option value="tablet">tablet</option>
               <option value="iphone">iphone</option>
               <option value="camara">camara</option>
               <option value="disco duro">disco duro</option>
               <option value="apuntador">apuntador</option>
           </select>
           <input type="submit" value="enviar"><br>  
</form>     
       
<!--  le indicamos al usuario un enlace para salir-->
<a href="logout.php">Cerrar sesión</a>
</div>
</body>