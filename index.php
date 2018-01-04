<html>
  <head>
  <title>verzování</title>
  <meta charset="UTF-8">
  <link href="styl.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml" />
  </head>
  <body>

<form method="post" enctype="multipart/form-data" action="upload.php">
Vyberte soubor:<br />
<input type="file" name="toUpload" id="toUpload" /><br />

Chcete-li nahrát novou verzi článku, vložte svůj kód:<br />
<input type="text" name="code" id="code" value="" /><br />

<input type="submit" value="Nahrát" name="Nahrát">
</form>

</body>
</html>