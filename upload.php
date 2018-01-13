<?php

spl_autoload_register("loadClass");
function loadClass($class)
{
  $file = str_replace('\\',DIRECTORY_SEPARATOR,$class);
  require_once $file . '.php';
}

$fileToUpload = "Halí belí, koně v zelí.";
$user = "student PedF UK";
$toDir = "nahrane";

use Model\Proposal as Proposal;
$prop = new Proposal ($fileToUpload, $user);

use Model\Storage as Storage;
$stor = new Storage ($prop->hash, $toDir);

use Model\File as File;
$file = new File ($stor->toDir, $fileToUpload);
