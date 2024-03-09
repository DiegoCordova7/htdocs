<?php
echo
'-and/&&=y' . '<br>' .
    '-or/||=o' . '<br>' .
    '-!=not=no' . '<br>' . '<hr>';

echo
'$valor1 = 4;' . '<br>' .
    '$valor2 = 3;' . '<br>' .

    'var_dump(!($valor1>=$valor2));' . '<br>' .
    'var_dump(!($valor1>=$valor2));' . '<br>' . '<hr>';

$valor1 = 4;
$valor2 = 3;

var_dump(!($valor1 >= $valor2));
