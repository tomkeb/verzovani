<?php

$classes = ["Storage", "Proposal", "File"];
foreach ($classes as $class)
{
  require_once "Model/$class.php";
}

$fileToUpload = "Halí belí, koně v zelí.";
$user = "student PedF UK";
$toDir = "nahrane";

$prop = new Model\Proposal ($fileToUpload, $user);
$stor = new Model\Storage ($prop->hash, $toDir);
$file = new Model\File ($stor->toDir, $fileToUpload);
