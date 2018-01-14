<?php
use Model\Proposal as Proposal;
use Model\Storage as Storage;

spl_autoload_register("loadClass");
function loadClass($class)
{
    $file = str_replace('\\',DIRECTORY_SEPARATOR,$class);
    require_once $file . '.php';
}

$fileToUpload = "Halí belí, koně v zelí.";
$user = "student PedF UK"; //chtěl bych new User();
$toDir = "nahrane";

$prop = new Proposal ($user);
$stor = new Storage ($prop->getHash());
$prop->setStorage($stor);
