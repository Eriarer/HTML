<?php
class FileReader
{
  private $filePath;
  private $handle;
  private $currentLine = 1;
  private $currentColumn = 1;
  private $currentWord = 0;
  private $currentChar = 0;
  private $newLine = false;
  private $newWord = true;

  public function __construct($filePath = null)
  {
    $absolutePath = realpath($filePath);
    if ($absolutePath === false)
    {
      $this->filePath = null;
    }
    else
    {
      $this->filePath = $absolutePath;
    }
  }

  public function setFilePath($filePath)
  {
    $absolutePath = realpath($filePath);
    if ($absolutePath === false)
    {
      throw new Exception("No se pudo acceder al archivo");
    }
    $this->filePath = $absolutePath;
  }

  public function getFilePath()
  {
    if ($this->filePath === null)
    {
      throw new Exception("No se ha especificado un archivo");
    }
    return $this->filePath;
  }

  public function getCurrentLine()
  {
    return $this->currentLine;
  }

  public function getCurrentColumn()
  {
    return $this->currentColumn;
  }

  public function getCurrentWord()
  {
    return $this->currentWord;
  }

  public function getCurrentChar()
  {
    return $this->currentChar;
  }

  public function fileExists(): bool
  {
    if ($this->filePath === null)
    {
      throw new Exception("No se ha especificado un archivo");
    }
    return file_exists($this->filePath);
  }

  public function openFile()
  {
    if ($this->fileExists() === false)
    {
      throw new Exception("El archivo no existe");
    }

    $this->handle = fopen($this->filePath, 'r');
    if ($this->handle === false)
    {
      throw new Exception("No se pudo abrir el archivo");
    }

    $this->currentLine = 1;
    $this->currentColumn = 1;
    $this->currentWord = 0;
    $this->currentChar = 0;
  }

  public function closeFile()
  {
    if ($this->handle !== null)
    {
      fclose($this->handle);
      $this->handle = null;
    }
  }

  public function readChar()
  {
    if ($this->handle === null)
    {
      $this->openFile();
    }

    if ($this->newLine)
    {
      $this->newLine = false;
      $this->currentLine++;
      $this->currentColumn = 1;
    }

    $char = fgetc($this->handle);

    if ($char !== false)
    {
      $this->currentChar++;
      if ($char === "\n")
      {
        $this->newLine = true;
        $this->newWord = true;
      }
      else if ($char === ' ' || $char === "\t")
      {
        $this->newWord = true;
        $this->currentColumn++;
      }
      else
      {
        if ($this->newWord)
        {
          $this->newWord = false;
          $this->currentWord++;
        }
        $this->currentColumn++;
      }
    }

    return $char;
  }

  public function readWord()
  {
    $word = '';
    while (($char = $this->readChar()) !== false)
    {
      if ($char === ' ' || $char === "\n" || $char === "\t")
      {
        if ($word !== '')
        {
          return trim($word);
        }
      }
      else
      {
        $word .= $char;
      }
    }
    //quitarle los saltos de linea al final
    $word = rtrim($word, "\n");
    return ($word !== '') ? $word : null;
  }

  public function readLine()
  {
    $line = '';
    while (($char = $this->readChar()) !== false)
    {
      $line .= $char;
      if ($char === "\n")
      {
        return trim($line);
      }
    }
    //quitarle los saltos de linea al final
    $line = rtrim($line, "\n");
    return ($line !== '') ? $line : null;
  }

  public function resetCursor(int $line, int $column)
  {
    if ($this->handle === null)
    {
      $this->openFile();
    }

    //resetar el handle a la posicion 0
    fseek($this->handle, 0);
    $this->currentLine = 1;
    $this->currentColumn = 1;
    $this->currentWord = 0;
    $this->currentChar = 0;
    $this->newLine = false;
    $this->newWord = true;
  }

  /*public function setCursor(){
    //  Casos
    //  -1 -1 -> ir al final del archivo
    //  -1 0 -> Ultima linea del archivo primer posicion del cursor en esa linea
    //  -1 m -> Ultima linea del archivo posicion del cursor en la columna m, si m es mayor que las numeros de columnas aplicar logica como si n = -1
    //  0 -1 -> Primera linea del archivo ultima columna del archivo
    //  0 0 -> Inicio del archivo
    //  0 m -> Primera linea del archivo posicion del cursor en la columna m, si m es mayor que las numeros de columnas aplicar logica como si n = -1
    //  n -1 -> Linea n del archivo ultima columna del archivo, si n es mayor que las numeros de lineas aplicar logica como si n = -1
    //  n 0 -> Linea n del archivo primera columna del archivo, si n es mayor que las numeros de lineas aplicar logica como si n = -1
    //  n m -> Linea n del archivo columna n del archivo, si n es mayor que las numeros de lineas aplicar logica como si n = -1, si m es mayor que las numeros de columnas aplicar logica como si n = -1
  }
  */
}
