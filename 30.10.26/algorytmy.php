<?php
require "dane-start.php";


$suma = 0;
$brakuje = 0;
$najdrozszy = null;


foreach ($produkty as $p) {
    $suma += $p["cena"] * $p["ilosc"];
    if ($p["ilosc"] === 0) {
        $brakuje++;
    }
    if ($najdrozszy === null || $p["cena"] > $najdrozszy["cena"]) {
        $najdrozszy = $p;
    }
}

$szukane = "kabel hdmi 2m";
$znaleziony = null;
foreach ($produkty as $p) {
    if ($p["nazwa"] === $szukane) {
        $znaleziony = $p;
        break;
    }
}

echo "Wartość magazynu: " . number_format($suma, 2, ',', ' ') . " zł<br>";
echo "Niedostępne: $brakuje<br>";
echo "Najdroższy: " . $najdrozszy["nazwa"] . "<br>";
echo $znaleziony === null ? "Nie znaleziono" : "Znaleziono: " . $znaleziony["nazwa"];
?>