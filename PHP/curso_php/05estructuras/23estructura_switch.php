<?php
echo
'En el stiwch se pone la variable a comparar, y en caso (case); de que sea una u otra se' . '<br>' .
    'ejecutara un codigo, esto separado por break, al no cumplirse ninguna lo hara por default.' . '<br>' . '<hr>';

echo
'Ejemplo para aprender:' . '<br>' .
    '$fruta=Pera;' . '<br>' .
    'switch($fruta){' . '<br>' .
    'case Manzana:' . '<br>' .
    'echo Efectivamente... Manzana;' . '<br>' .
    'break;' . '<br>' .
    'case Platano;' . '<br>' .
    'echo Efectivamente... Platano;' . '<br>' .
    'break;' . '<br>' .
    'default:' . '<br>' .
    'echo No hay efectividad ni de manzana ni de platano;' . '<br>' .
    '}' . '<br>' . '<hr>';

$fruta = 'Pera';
switch ($fruta) {
    case 'Manzana':
        echo 'Efectivamente... Manzana';
        break;
    case 'Platano';
        echo 'Efectivamente... Platano';
        break;
    default:
        echo 'No hay efectividad ni de manzana ni de platano';
};
echo '<hr>';
echo
'Ahora hare lo de los dias, pero con esta forma.' . '<br>' . '<hr>';
echo
'$dias = 1;' . '<br>' .
    'switch($dias){' . '<br>' .
    'case 1:' . '<br>' .
    'echo Es Lunes;' . '<br>' .
    'break;' . '<br>' .
    'case 2:' . '<br>' .
    'echo Es Martes;' . '<br>' .
    'break;' . '<br>' .
    'case 3:' . '<br>' .
    'echo Es Miercoles;' . '<br>' .
    'break;' . '<br>' .
    'case 4:' . '<br>' .
    'echo Es Jueves;' . '<br>' .
    'break;' . '<br>' .
    'case 5:' . '<br>' .
    'echo Es Viernes;' . '<br>' .
    'break;' . '<br>' .
    'case 6:' . '<br>' .
    'echo Es Sabado;' . '<br>' .
    'break;' . '<br>' .
    'case 7:' . '<br>' .
    'echo Es Domingo;' . '<br>' .
    'break;' . '<br>' .
    'default:' . '<br>' .
    'echo Introduzca un valor valido;' . '<br>' .
    '}' . '<br>' . '<hr>';

$dias = 1;
switch ($dias) {
    case 1:
        echo 'Es Lunes';
        break;
    case 2:
        echo 'Es Martes';
        break;
    case 3:
        echo 'Es Miercoles';
        break;
    case 4:
        echo 'Es Jueves';
        break;
    case 5:
        echo 'Es Viernes';
        break;
    case 6:
        echo 'Es Sabado';
        break;
    case 7:
        echo 'Es Domingo';
        break;
    default:
        echo 'Introduzca un valor valido';
}
