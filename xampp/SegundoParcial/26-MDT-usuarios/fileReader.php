<?php
class FileReader
{
  private $filePath;
  private $handle;

  private $currentLine = 0;
  private $wordCount = 0;

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

    $this->currentLine = 0;
    $this->wordCount = 0;
  }

  public function closeFile()
  {
    if ($this->handle !== null)
    {
      fclose($this->handle);
      $this->handle = null;
    }
  }

  /**
   * Lee una línea del archivo.
   * @return string|null La línea leída o null si llegamos al final del archivo.
   */
  public function readLine(): ?string
  {
    if ($this->handle === null)
    {
      $this->openFile();
    }

    $line = fgets($this->handle);
    if ($line !== false)
    {
      $this->currentLine++;
      $this->wordCount += str_word_count($line);
    }

    return $line;
  }

  /**
   * Lee una palabra del archivo.
   * @return string|null La palabra leída o null si llegamos al final del archivo.
   */
  public function readWord(): ?string
  {
    if ($this->handle === null)
    {
      $this->openFile();
    }

    $word = '';
    $char = fread($this->handle, 1);

    while ($char !== false)
    {
      if ($char === ' ' || $char === "\n" || $char === "\t")
      {
        if ($word !== '')
        {
          $this->wordCount++;
          return $word;
        }
        if ($char === "\n")
        {
          $this->currentLine++;
        }
      }
      else
      {
        $word .= $char;
      }
      $char = fread($this->handle, 1);
    }

    if ($word !== '')
    {
      $this->wordCount++;
      return $word;
    }

    return null;
  }
}
