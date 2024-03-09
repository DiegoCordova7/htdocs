<?php
echo

'Estruturas repetitivas son las que repiten una o x instrucciones un numero x de veces' . '<br>' .
    'dependiendo de una variable de control llamada contador en pocas palabras ejecutan una' . '<br>' .
    'o varias instrucciones un numero de veces definido.' . '<br>' .

    'Existen 4:' . '<br>' .
    '-While.' . '<br>' .
    '-For.' . '<br>' .
    '-Do-While.' . '<br>' .
    '-Foreach.' . '<br>' .

    'While. Ejecuta una porcion de codigo cuando se cumple la condicion sea verdadera, si es' . '<br>' .
    'falsa se sale del ciclo y sigue del programa.' . '<br>' . '<br>' .

    'while(condicion){' . '<br>' .
    '    Codigo a ejecutar' . '<br>' .
    '}' . '<br>' .

    'while(condicion):' . '<br>' .
    'Codigo a ejecutar' . '<br>' .
    'endwhile;' . '<br>' . '<hr>' .

    'Ejercicio 1' . '<br>' .
    'Diseña un programa que imprima los numeros del 1 al 20.(Incremento y Decremento)' . '<br>' . '<br>';

echo
'$c = 1;' . '<br>' .

    'while($c<=19){' . '<br>' .
    'echo $c. <br>;' . '<br>' .
    '$c++;' . '<br>' .
    '}while($c>=1){' . '<br>' .
    'echo $c. <br>;' . '<br>' .
    '$c--;' . '<br>' .
    '};' . '<br>';

echo '<hr>';


$c = 1;

while ($c <= 19) {
    echo $c . '<br>';
    $c++;
}
while ($c >= 1) {
    echo $c . '<br>';
    $c--;
};

echo '<hr>';

echo
'Ejercicio 2' . '<br>' .
    'Diseña un programa que imprima la tabla de multipicar de un numero dado, desde.' . '<br>' .
    'el factor 1 al 12.(Incremento y decremento).' . '<br>' . '<hr>';

echo
'$c = 1;' . '<br>' .
    '$num = 6;' . '<br>' .
    'while($c<=11){' . '<br>' .
    'echo $c * $num. <br>;' . '<br>' .
    '$c++;' . '<br>' . '<br>' .
    '}while($c>=1){' . '<br>' .
    'echo $c * $num. <br;>' . '<br>' .
    '$c--;' . '<br>' .
    '}' . '<br>' . '<hr>';

$c = 1;
$num = 6;
while ($c <= 11) {
    echo $c * $num . '<br>';
    $c++;
}
while ($c >= 1) {
    echo $c * $num . '<br>';
    $c--;
};
