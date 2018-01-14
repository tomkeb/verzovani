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
$user = "student PedF UK"; //chtěl bych spíše něco jako new User();

$proposal = new Proposal ($user);
$storage = new Storage ($proposal->getHash());
$proposal->setStorage($storage);
