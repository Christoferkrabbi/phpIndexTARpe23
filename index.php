<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Christofer'i PHP-tööde leht</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="js/joonistamineScript.js"></script>
</head>
<body>
<?php
//päis
include("header.php");
?>
<?php
//navigeerimis menüü
include("nav.php");
?>
<div class="flex-container">
    <div>
        <strong>PHP - </strong>
        PHP on veebiarendusele suunatud üldotstarbeline skriptimiskeel .
        Selle lõi algselt Taani-Kanada programmeerija Rasmus Lerdorf 1993.
        aastal ja see avaldati 1995. aastal. PHP viitekeelt toodab
        nüüd PHP Group. PHP oli algselt lühend sõnadest Personal Home Page, kuid
        nüüd tähistab see rekursiivset taustanime PHP: Hypertext Preprocessor .
    </div>
    <div>
        <?php
        //sisu - laetakse content kaustast
        if(isset($_GET["leht"])){
        include('content/'.$_GET["leht"]);
        } else {
    include('content/kodu.php');
        }
        ?>
    </div>
    <div>
    <img src="image/phpPilt.png" alt="PHP pilt">
    </div>
</div>
<?php
//jalus
include("footer.php");
?>


</body>
</html>