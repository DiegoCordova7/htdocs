<?php
echo 'Devuelve un valor booleano(verdadero o falso(0 o 1)' . '<br>' .
    'igual == no importa el tipo de dato' . '<br>' .
    'identico === importa el tipo de dato' . '<br>' .
    'diferente != no importa el tipo de dato' . '<br>' .
    'dferente <>' . '<br>' .
    'no identico !== ' . '<br>' .
    'menor que <' . '<br>' .
    'mayor que >' . '<br>' .
    'menor/igual que <=' . '<br>' .
    'mayor/igual que) >=' . '<hr>';

echo
'$valor1 = 1;' . '<br>' .
    'var_dump($valor1===1);' . '<br>' . '<hr>';

$valor1 = 1;
var_dump($valor1 === '1');
