<?php

echo
'$nummdia=8;' . '<br>' .
    'if($nummdia==1){' . '<br>' .
    '    echo Hoy es Lunes;' . '<br>' .
    '}elseif($nummdia==2){' . '<br>' .
    '   echo Hoy es Martes;' . '<br>' .
    '}elseif($nummdia==3){' . '<br>' .
    '    echo Hoy es Miercoles;' . '<br>' .
    '}elseif($nummdia==4){' . '<br>' .
    '    echo Hoy es Jueves;' . '<br>' .
    '}elseif($nummdia==5){' . '<br>' .
    '    echo Hoy es Viernes;' . '<br>' .
    '}elseif($nummdia==6){' . '<br>' .
    '    echo Hoy es Sabado;' . '<br>' .
    '}elseif($nummdia==7){' . '<br>' .
    '    echo Hoy es Domingo;' . '<br>' .
    '}else{' . '<br>' .
    '    echo No hay mas dias wey;' . '<br>' .
    '}' . '<br>' . '<hr>';

$nummdia = 8;
if ($nummdia == 1) {
    echo 'Hoy es Lunes';
} elseif ($nummdia == 2) {
    echo 'Hoy es Martes';
} elseif ($nummdia == 3) {
    echo 'Hoy es Miercoles';
} elseif ($nummdia == 4) {
    echo 'Hoy es Jueves';
} elseif ($nummdia == 5) {
    echo 'Hoy es Viernes';
} elseif ($nummdia == 6) {
    echo 'Hoy es Sabado';
} elseif ($nummdia == 7) {
    echo 'Hoy es Domingo';
} else {
    echo 'No hay mas dias wey';
}
