<?php
require_once "saiyajin.php";
require_once "supersaiyajin.php";

$goku = new Saiyajin(nivel_pelea: 1000, nombre: "Goku");
echo $goku->NivelDePelea();

echo "<br><br>";

$vegeta = new Saiyajin("Vegeta", 950);
echo $vegeta->NivelDePelea();

echo "<br><br>";

$gohan = new SuperSaiyajin(nivel_pelea: 1700, nombre: "Gohan");
echo $gohan->Transformacion();
