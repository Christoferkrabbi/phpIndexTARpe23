<?php
require ('conf.php');
//tabelist kustutamine
global $yhendus;
if(isset($_REQUEST["kustuta"])) {
    $kask = $yhendus->prepare("DELETE FROM loomad WHERE loomId=?");
    $kask->bind_param("i", $_REQUEST["kustuta"]);
    $kask->execute();
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
        <title>Loomad SQL andmebaasist</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="andmebaasStyle.css">
</head>
<body>
<h1>Loomad SQL andmebaasist</h1>
<table>
    <tr>
        <td>Loomnimi</td>
        <td>Kaal</td>
        <td>Värvus</td>
    </tr>

<?php
global $yhendus;
$kask=$yhendus->prepare("SELECT loomId, loomanimi, kaal, varv from loomad");
$kask->bind_result($loomId, $loomanimi, $kaal, $varv);
$kask->execute();

while($kask->fetch()){
    echo "<tr bgcolor='$varv'>";
    echo "<td>".$loomanimi."</td>";
    echo "<td>".$kaal."</td>";
    echo "<td>".$varv."</td>";
    echo "<td><a href='?kustuta=$loomId'>kustuta</a></td>";
    echo "<tr>";
}
?>
    </table>
<a href="loomadeLisamine.php">Lisa loom...</a>
</body>


</html>
