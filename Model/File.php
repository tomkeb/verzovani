<?php

namespace Model;

class File
{
  function __construct($toDir, $fileToUpload)
  {
    $this->toDir = $toDir;
    $this->fileToUpload = $fileToUpload;

    echo "nahrání souboru: " . $fileToUpload;

    //$this->name = basename($this->fileToUpload);
    //move_uploaded_file($this->fileToUpload["tmp_name"], "$this->toDir/$this->name");

  }
}
