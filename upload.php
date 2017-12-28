<html>
  <head>
  <title>Verzování</title>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml" />
  <link href="styl.css" rel="stylesheet">
  </head>
  <body>

<?php

$mail = $_POST["mail"];

if (!empty($mail)) {
echo "Vaše ctěná e-mailová adresa čte takto: <i>".$mail."</i>.<br /><br />";

$cil_adresar = "nahrane/".$mail."/";
if (!is_dir($cil_adresar)) {mkdir($cil_adresar);}

$verze = count(scandir($cil_adresar))-1;

if ($_FILES["souborknahrani"]["error"] != UPLOAD_ERR_NO_FILE) {

$cil_soubor = $cil_adresar . basename($_FILES["souborknahrani"]["name"]);
$vporadku = 1;
$pripona = strtolower(pathinfo($cil_soubor,PATHINFO_EXTENSION));
$povolenepripony = array("odt","doc","docx","jpg","jpeg","png","zip","7z","rar");

if ($_FILES["souborknahrani"]["size"] > 500000) {echo "Soubor je příliš velký."; $vporadku = 0;}

if(!in_array($pripona,$povolenepripony)) {echo "Podporujeme jenom určité typy souborů."; $vporadku = 0;}

if ($vporadku == 0) {echo " Nahrání se nepovedlo.";}else{

$adresar = pathinfo($cil_soubor)['dirname']."/";
$jmeno = pathinfo($cil_soubor)['filename'];
$pripona = pathinfo($cil_soubor)['extension'];
$cas = date('Y-m-d');
$cil_soubor2 = $adresar."v".$verze."_".$cas."_".$jmeno.".".$pripona;

if (move_uploaded_file($_FILES["souborknahrani"]["tmp_name"], $cil_soubor2)) {
        echo $verze.". verze souboru <b>". basename( $_FILES["souborknahrani"]["name"]). "</b> se úspěšně nahrála.";
        mail("tomaskeb@gmail.com", "Nahrání souboru (Bi-Ch-Z)", "Uživatel ".$mail." právě nahrál novou verzi svého příspěvku.");
    } else {echo "Nahrání se nepodařilo z neznámého důvodu.";}
}

}else{echo "Nevybrali jste soubor.";}}else{echo "Nezadali jste svou e-mailovou adresu.";}

?>

</body>
</html>