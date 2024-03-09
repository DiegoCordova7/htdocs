<?php
echo 'Las variables se colocan con $ y luego letras, no puede empezar con numeros, le asignaras un valor , ' . '<br>' . '
y le dara el valor asignado, por ejemplo en las bases de datos se coloca la variable y te devuelve el valor.' . '<br>' . '
    Exiten 3 estandares, el primero es el Camel Case:' . '<br>' . '
    -Upper Camel Case: todo empieza con mayuscula;' . '<br>' .
    'Ejemplo: $NombreCompleto' . '<br>' . '
    -Lower Camel Case: todas menos la primera con mayusculas;' . '<br>' .
    'Ejemplo: $nombreCompleto' . '<br>' .
    'El segundo es el Upper Case, todo es con mayusculas, se usa para definir constantes;' . '<br>' .
    'Ejemplo: $NOMBRE' . '<br>' .
    'Y el tercero es el Snake Case, las palabras se separan con un guión bajo y estan en mayuscula(o no);' . '<br>' .
    'Ejemplo:' . '<br>' . '
    $nombre_completo o $NOMBRE_COMPLETO.' . '<br>' . '<hr>';

echo '$nombre_completo = Diego;' . '<br>' .
    'echo $nombre_completo;' . '<br>' . '<hr>';

$nombre_completo = 'Diego';
echo $nombre_completo;
