<?php
echo
'Estrucutras condicionales(if/else) dentro de otras.' . '<br>' . '<br>' .

    '1.Pide a un usuario la edad y genero, para que la computadora le indique si ya' . '<br>' .
    'puede jubilarse. Toma en cuenta que un Hombre se puede jubilar cuando tenga 60' . '<br>' .
    'años o más, en cambio, una mujer mayor se jubilara si tiene más de 54 años.' . '<br>' . '<hr>' .

    '$edad=57;' . '<br>' .
    '$genero = F;' . '<br>' .

    'if($genero==M){' . '<br>' .
    'if($edad>=60){' . '<br>' .
    'echo Ya puedes jubilarte.;' . '<br>' .
    '}else{' . '<br>' .
    'echo Aun no puedes jubilarte.;' . '<br>' .
    '}' . '<br>' .
    '}elseif($genero==F){' . '<br>' .
    'if($edad>=54){' . '<br>' .
    'echo Ya puedes jubilarte.;' . '<br>' .
    '}else{' . '<br>' .
    'echo Aun no puedes jubilarte.;' . '<br>' .
    '}' . '<br>' .
    '}else{' . '<br>' .
    'echo Coloque una opción valida.;' . '<br>' .
    '}' . '<br>' . '<hr>';

$edad = 57;
$genero = 'F';

if ($genero == 'M') {
    if ($edad >= 60) {
        echo 'Ya puedes jubilarte.';
    } else {
        echo 'Aun no puedes jubilarte.';
    }
} elseif ($genero == 'F') {
    if ($edad >= 54) {
        echo 'Ya puedes jubilarte.';
    } else {
        echo 'Aun no puedes jubilarte.';
    }
} else {
    echo 'Coloque una opción valida.';
}
