<?php

$fecha1 = '2023/08/25';
$fecha2 = '2023-08-24';
$numeros = 'Uno Dos Tres Cuatro Cinco Seis Siete';

echo 'Explode recibe 3 parametros:' . '<br>' .
    '-Delimitador.Caracter que indicamos para dividir la cadena' . '<br>' .
    '-String.' . '<br>' .
    '-Limitador(opcional).Partes en las que divide' . '<br>' .
    'Lo que hace es convertir una linea de texto en un array y separarla bajo ciertos parametros.' . '<br>' .
    'Para luego llamar a alguno de ellos, siguiedo el orden de array(0,1,2,3,4...).' . '<br>';

$array_numeros = explode(' ', $numeros, -2);
echo $array_numeros[4] . '; <i>=$array_fecha=explode(/,$fecha1);</i>';
