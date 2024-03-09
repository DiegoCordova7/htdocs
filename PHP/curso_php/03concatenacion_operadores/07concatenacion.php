<?php
echo 'Tal como su nombre lo indica es para unir texto sirve con un . fuera del texto, tambien se puede usar para conectar HTML' . '<br>' .
    'como los br o hr, tambien para obtener variables se puede poner como {variable} en medio de una cadena de texto.' . '<br>' . '<hr>' .

    '$nombre = Diego;' . '<br>' .
    '$pais = Mexico;' . '<br>' .
    '$numero = 7;' . '<br>' .

    '$resultado = $nombre . $pais . $numero;' . '<br>' .

    'echo "Mi nombre es {$nombre}, soy de {$pais} y mi numero favorito es el {$numero}.";';

echo '<hr>';

$nombre = 'Diego';
$pais = 'Mexico';
$numero = 7;

$resultado = $nombre . $pais . $numero;

echo "Mi nombre es {$nombre}, soy de {$pais} y mi numero favorito es el {$numero}.";
