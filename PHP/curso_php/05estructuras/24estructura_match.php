<?php
echo
'Similar a la switch sirve para comparar varios valores, con.' . '<br>' .
    'el cambio que en esta ocasión a los operadores de comparacion.' . '<br>' . '<hr>';

echo
'$a = 7;' . '<br>' .
    '$b = 7;' . '<br>' .
    '$x = 10;' . '<br>' .
    '$y = 9;' . '<br>' .
    '$z = 7;' . '<br>' .

    '$resultado = match($a){' . '<br>' .
    '$x => Valor igual a X,' . '<br>' .
    '$a,$b => Valor igual a A o B,' . '<br>' .
    '$y => Valor igual a Y,' . '<br>' .
    '$z => Valor igual a Z,' . '<br>' .
    '7 => Valor igual a 7,' . '<br>' .
    'default => No es ninguna variable' . '<br>' .
    '};' . '<br>' .

    'echo $resultado;' . '<br>' . '<hr>';

$a = 7;
$b = 7;
$x = 10;
$y = 9;
$z = 7;

$resultado = match ($a) {
    $x => 'Valor igual a X',
    $a, $b => 'Valor igual a A o B',
    $y => 'Valor igual a Y',
    $z => 'Valor igual a Z',
    7 => 'Valor igual a 7',
    default => 'No es ninguna variable'
};

echo $resultado;

echo '<hr>';

echo
'Lo que paso es que fue comparando en busca de un valor identico, x y y no lo son, pero z, si.' . '<br>' .
    'Si el 7 de z fuera un 7(texto), es decir valor de string(texto), no lo aceptaria puesto que serian' . '<br>' .
    'enteros y string, por ende no serian identicos.' . '<br>' .
    'Datos:' . '<br>' .
    '-Funciona con valores directos, por ejemplo compararlo con un valor como tal, sin estar en variable.' . '<br>' .
    '-Solo tomara en cuenta el primer valor encontrado, despues dejara de buscar.' . '<br>' .
    '-Si pones 2 variables con coma para comparar funcionara como un or.' . '<br>' . '<hr>';

echo
'$edad = 67;' . '<br>' .

    '$resultado = match(true){' . '<br>' .
    '$edad>=60 => Tas viejo,' . '<br>' .
    '$edad>=30 => Ya vas pa  viejo,' . '<br>' .
    '$edad>=18 => Meh,' . '<br>' .
    'default => Eres un ninio' . '<br>' .
    '};' . '<br>' .
    'echo $resultado;' . '<br>' . '<hr>';

$edad = 67;

$resultado = match (true) {
    $edad >= 60 => 'Tas viejo',
    $edad >= 30 => 'Ya vas pa  viejo',
    $edad >= 18 => 'Meh',
    default => 'Eres un ninio'
};

echo $resultado;
