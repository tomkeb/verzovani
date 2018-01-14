<?php
use Model\Proposal as Proposal;
use Model\Storage as Storage;
use Model\File as File;

spl_autoload_register("loadClass");
function loadClass($class)
{
    $file = str_replace('\\',DIRECTORY_SEPARATOR,$class);
    require_once $file . '.php';
}

$fileToUpload = "Halí belí, koně v zelí.";
$user = "student PedF UK";
$toDir = "nahrane";

$prop = new Proposal ($fileToUpload, $user);

$stor = new Storage ($prop->hash, $toDir);

$file = new File ($stor->toDir, $fileToUpload);
