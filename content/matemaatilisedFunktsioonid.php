<?php
echo "<h2>Matemaatilised funktsioonid (kasutaja sisestusega)</h2>";

// Keskmise arvutamine
function keskmine($massiiv) {
    if (count($massiiv) == 0) {
        return 0;
    }
    return array_sum($massiiv) / count($massiiv);
}

// Maksimumi ja miinimumi leidmine
function maxAndMin($massiiv) {
    return [
        "max" => max($massiiv),
        "min" => min($massiiv)
    ];
}

// Arvu ruut
function ruut($arv) {
    return $arv * $arv;
}

// Arvu ruutjuur
function ruutjuur($arv) {
    if ($arv < 0) {
        return "Negatiivsel arvul puudub ruutjuur";
    }
    return sqrt($arv);
}

// Protsendi arvutamine
function protsent($osa, $kogus) {
    if ($kogus == 0) {
        return "Nulliga ei saa jagada";
    }
    return ($osa / $kogus) * 100;
}

$ruutArv = $_POST["ruutarv"] ?? "";
$ruutjuurArv = $_POST["ruutjuurarv"] ?? "";
$osa = $_POST["osa"] ?? "";
$kogus = $_POST["kogus"] ?? "";

$arvud = [5, 10, 15, 20];

echo "<p>Arvud: " . implode(", ", $arvud) . "</p>";

echo "<ul>";
echo "<li>Keskmine: " . keskmine($arvud) . "</li>";
$tulemus = maxAndMin($arvud);
echo "<li>Maksimum: " . $tulemus["max"] . "</li>";
echo "<li>Miinimum: " . $tulemus["min"] . "</li>";

?>

<form method="post">
    <h3>Arvu ruut</h3>
    <input type="number" name="ruutarv" step="any">

    <h3>Arvu ruutjuur</h3>
    <input type="number" name="ruutjuurarv" step="any">

    <h3>Protsendi arvutamine</h3>
    Osa: <input type="number" name="osa" step="any">
    Kogus: <input type="number" name="kogus" step="any">

    <br><br>
    <button type="submit">Arvuta</button>
</form>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    echo "<h3>Tulemused</h3>";
    echo "<ul>";

    if ($ruutArv !== "") {
        echo "<li>$ruutArv = " . ruut($ruutArv) . "</li>";
    }

    if ($ruutjuurArv !== "") {
        echo "<li>√$ruutjuurArv = " . ruutjuur($ruutjuurArv) . "</li>";
    }

    if ($osa !== "" && $kogus !== "") {
        echo "<li>$osa on " . round(protsent($osa, $kogus), 2) . "% arvust $kogus</li>";
    }

    echo "</ul>";
}
?>
