<?php
require "FileReader.php"; // Asegúrate de incluir el archivo de la clase FileReader

// Crear una instancia de FileReader
$fileReader = new FileReader('usuarios.txt');

// Abre el archivo para lectura
$fileReader->openFile();


// Lee lo que quda de la línea
$line = $fileReader->readLine();
echo "Línea no." . $fileReader->getCurrentLine() . ": " . $line . "<br>";

// Lee una palabra
$word = $fileReader->readWord();
echo "Palabra no." . $fileReader->getCurrentWord() . ": " . $word . "<br>";

//posisiona el puntero en la linea 3 palabra 2
$fileReader->resetCursor(3, 1);

while (($line = $fileReader->readLine()))
{
  echo "Línea no." . $fileReader->getCurrentLine() . ": " . $line . "<br>";
}
// Cierra el archivo después de su uso
$fileReader->closeFile();
