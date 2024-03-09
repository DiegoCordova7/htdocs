<?php

echo
'1. Calcular el total que una persona debe pagar en una llantera, el precio de cada' . '<br>' .
    'llanta es de $800 si se compran menos de 5 llantas y de $700 si se compran 5 o mas.' . '<br>' . '<hr>';

echo
'$llantas=6;' . '<br>' .

    'if($llantas<5){' . '<br>' .
    '    $total=$llantas*800;' . '<br>' .
    '}else{' . '<br>' .
    '    $total=$llantas*700;' . '<br>' .
    '}' . '<br>' .

    'echo ' . 'El total a pagar es: $' . '.$total;';
echo '<hr>';
$llantas = 5;

if ($llantas < 5) {
    $total = $llantas * 800;
} else {
    $total = $llantas * 700;
}

echo 'Resultado Del Problema 1: El total a pagar es: $' . $total;
echo '<hr>';

echo
'2. Determina si un alumno aprueba o reprueba un curso, sabiendo que aprobara si su' . '<br>' .
    'promedio de tres calificaciones es mayor o igual a 7.0; reprueba en caso contrario.' . '<br>' . '<hr>' .

    '$calificacion1=6;' . '<br>' .
    '$calificacion2=2;' . '<br>' .
    '$calificacion3=4;' . '<br>' .
    '$calificacionf = ($calificacion1 + $calificacion2 + $calificacion3)/3;' . '<br>' .

    'if($calificacionf>=7){' . '<br>' .
    'echo ' . 'Resultado Del Problema 2: Aprobaste con:' . '.$calificacionf;' . '<br>' .
    '}else{' . '<br>' .
    'echo ' . 'Resultado Del Problema 2: Reprobaste con:' . '.$calificacionf;' . '<br>' .
    '}' . '<br>' . '<hr>';

$calificacion1 = 6;
$calificacion2 = 2;
$calificacion3 = 4;
$calificacionf = ($calificacion1 + $calificacion2 + $calificacion3) / 3;

if ($calificacionf >= 7) {
    echo 'Resultado Del Problema 2: Aprobaste con: ' . $calificacionf;
} else {
    echo 'Resultado Del Problema 2: Reprobaste con: ' . $calificacionf;
};
