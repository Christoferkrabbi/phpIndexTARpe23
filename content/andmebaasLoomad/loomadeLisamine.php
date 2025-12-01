<?php
require('conf.php');
//lisamine
global $yhendus;
if(isset($_REQUEST["loomanimi"]) && $_REQUEST["loomanimi"]!==0){
$kask=$yhendus->prepare("INSERT INTO loomad (loomanimi, kaal, varv) VALUES (?, ?, ?)");
$kask->bind_param("sis", $_REQUEST["loomanimi"], $_REQUEST["kaal"], $_REQUEST["varv"]);
$kask->execute();
header("location:loomadeKuvamine.php");
}
// i=integer, s=string
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Loomade lisamine SQL tabeli sisse</title>
</head>
<body>
  <h1>
      Looma lisamine SQL-ga
  </h1>
<form action="" name="loom">
    <label for="loomanimi">Sisesta looma nimi:</label>
    <input type="text" name="loomanimi" id="loomanimi">
    <br>

    <label for="kaal">Sisesta looma kaal:</label>
    <input type="number" name="kaal" id="kaal">
    <br>

    <label for="varv">Sisesta looma värv:</label>
    <input type="color" name="varv" id="varv">
    <br>

    <input type="submit" value="Lisa">
</form>
</body>
</html>

