<!DOCTYPE html>
<html>
<head>
<title>verzování</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="favicon.svg" type="image/svg+xml">
<link href="styl.css" rel="stylesheet">
</head>
<body>
<?php
class Proposal {
  function __construct($file) {
    $this->getHash($file);
  }

  private function getHash($file) {
    $this->hash = hash('md5', $file);
    return $this->hash;
  }

  protected $storage;
  protected function storageSet() {;}
  protected function storageGet() {;}
}

class ProposalStorage {
  function __construct($hash) {
    $this->setDir($hash);
  }

  private function setDir($hash){
    $hash = strval($hash);
    $this->toDir = "nahrane/".$hash;
    if (!file_exists($this->toDir)) {mkdir($this->toDir, 0777, true);}
    return $this->toDir;
  }
}

$file = "Anička šla do zelí.";
$prop = new Proposal($file);
$propStor = new ProposalStorage($prop->hash);
echo $propStor->toDir;
$prop->storageSetter();

?>
</body>
</html>