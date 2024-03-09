<?php
echo
'Ciclo Do While(hacer mientras) es muy similar a la estructura while,' . '<br>' .
    'excepto que esta primero hace la instruccion y luego comprueba la condicion.' . '<br>' .
    'Ejemplo:' . '<br>' .
    'Diseñe un programa que imprima los numeros del 1 al 20. (Incremento y Decremento).' . '<br>' . '<hr>';

echo
'$c=1;' . '<br>' .
    '$num = 5;' . '<br>' .

    'do{' . '<br>' .
    '    echo $num .  X  . $c .  = . $num*$c. br;' . '<br>' .
    '    $c++;' . '<br>' .
    '}while($c<=12);' . '<br>' . '<hr>';

$c = 1;
$num = 5;

do {
    echo $num . ' X ' . $c . ' = ' . $num * $c . '<br>';
    $c++;
} while ($c <= 12);
