<?php

$mail = $_POST["mail"];
echo "Vaše ctěná e-mailová adresa čte takto: <i>".$mail."</i>.<br /><br />";

$cil_adresar = "nahrane/".$mail."/";
if (!is_dir($cil_adresar)) {mkdir($cil_adresar);}

$verze = count(scandir($cil_adresar))-1;

if ($_FILES["souborknahrani"]["error"] != UPLOAD_ERR_NO_FILE) {

$cil_soubor = $cil_adresar . basename($_FILES["souborknahrani"]["name"]);
$vporadku = 1;
$pripona = strtolower(pathinfo($cil_soubor,PATHINFO_EXTENSION));
$povolenepripony = array("doc","docx","jpg","jpeg","png");

if (file_exists($cil_soubor)) {
echo "Soubor už existuje…";
$vporadku = 0;
}

if ($_FILES["souborknahrani"]["size"] > 500000) {
echo "Soubor je příliš velký.";
$vporadku = 0;
}

if(!in_array($pripona,$povolenepripony)) {
echo "Podporujeme jenom určité typy souborů.";
$vporadku = 0;
}

if ($vporadku == 0) {echo " Nahrání se nepovedlo.";}else{
    if (move_uploaded_file($_FILES["souborknahrani"]["tmp_name"], $cil_soubor)) {
        echo "Soubor <b>". basename( $_FILES["souborknahrani"]["name"]). "</b> se úspěšně nahrál.";
    } else {
        echo "Nahrání se nepovedlo z neznámého důvodu.";
    }
}

}else{echo "Musíte vybrat soubor.";}

?>