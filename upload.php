<?php
use Model\Proposal as Proposal;
use Model\Storage as Storage;
use Model\File as File;
// use Model\Validate as Validate;
use Model\User as User;

spl_autoload_register("loadClass");
function loadClass($class)
{
    $classFile = str_replace('\\',DIRECTORY_SEPARATOR,$class);
    require_once $classFile . '.php';
}

// testovací data
$mail = "jannovak@gmail.com";
$personName = "Jan Novák";
$login = 0;

$i = 1;
while (file_exists('sample' . $i . '.txt'))
  {
  $fileNameString[$i] = 'sample' . $i . '.txt';
  $file[$i] = new File($fileNameString[$i]);
  $i++;
  }

// $validate = new Validate();
$user = new User($mail, $personName, $login, $_SERVER['REMOTE_ADDR']);
$proposal = new Proposal ($user, $file);
$storage = new Storage ($proposal->getHash());
$proposal->setStorage($storage);
$proposal->getFilesPaths();
$proposal->prepareUpload();

// testování objektů File

echo $file[1]->getFileExtension().'<br />';
echo $file[2]->getFileSize().'<br />';
echo $file[2]->getFileName().'<br />';
echo $proposal->getTimestamp().'<br />';
echo $proposal->getHash().'<br />';
print_r($proposal->getFilesPaths());
