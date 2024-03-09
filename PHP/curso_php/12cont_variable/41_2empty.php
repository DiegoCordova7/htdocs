<?php
echo 'La variable Empty devuelve un True o un False, dependiendo' . '<br>' .
    'si la variable esta o no vacia, se considera vacia lo siguiente:' . '<br>' .
    '-Una cadena vacia(String)' . '<br>' .
    '-Un INT 0' . '<br>' .
    '-Un Float 0.0' . '<br>' .
    '-Un 0 como String' . '<br>' .
    '-Null' . '<br>' .
    '-False' . '<br>' .
    '-Un array vacio' . '<hr>';

$numero = 10;

if (empty($numero)) {
    echo 'Esta Vacia.';
} else {
    echo 'No esta Vacia';
};
