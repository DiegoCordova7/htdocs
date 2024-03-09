<?php

echo 'Sirve para ver si el valor de una variable es nulo.' . '<br>' .
    'tambien se puede definir y usar un unset para eliminar una variable(el mensaje de alerta es normal)' . '<br>';
$numero = NULL;

if (is_null($numero)) {
    echo 'Es nulo';
} else {
    echo 'No es nulo';
}

echo '<hr>';

$numero2 = '49';

echo $numero2;

unset($numero2);

if (is_null($numero2)) {
    echo 'Es nulo';
} else {
    echo 'No es nulo';
}
