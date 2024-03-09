<?php

echo

'Es una forma sencilla de iteracion entre arrays, solo funciona en arrays hay 2 variables:' . '<br>' . '<br>' .
    'foreach($array as $valor){' . '<br>' .
    '$valor tendra en cada iteracion un valor del array' . '<br>' .
    '}' . '<br>' .

    'foreach($array as $clave => $valor){' . '<br>' .
    '$clave tendra en cada iteracion una clave del array' . '<br>' .

    '$clave tendra en cada iteracion una clave del array' . '<br>' .

    '...' . '<br>' .
    '}' . '<br>' . '<hr>';

echo

'$frutas=[' . '<br>' .
    'Fresas=>100,' . '<br>' .
    'Peras=>30,' . '<br>' .
    'Sandias=>10,' . '<br>' .
    'Melocotones=>17,' . '<br>' .
    'Manzanas=>9' . '<br>' .
    '];' . '<br>' . '<br>' .

    'foreach($frutas as $clave => $valor){' .
    'echo Hay  . $valor .  -  . $clave .  en el inventario' . '<br>' .
    '}' . '<br>';

$frutas = [
    'Fresas' => 100,
    'Peras' => 30,
    'Sandias' => 10,
    'Melocotones' => 17,
    'Manzanas' => 9
];

echo '<br>' . '<hr>';

foreach ($frutas as $clave => $valor) {
    echo 'Hay ' . $valor . ' - ' . $clave . ' en el inventario' . '<br>';
}

echo '<br>' . '<hr>';

echo
'$productos = [' . '<br>' .
    '[codigo => A0001, descripcion => Mouse],' . '<br>' .
    '[codigo => A0002, descripcion => Teclado],' . '<br>' .
    '[codigo => A0003, descripcion => Monitor],' . '<br>' .
    '[codigo => A0004, descripcion => Impresora]' . '<br>' .
    '];' . '<br>';

echo
'foreach($productos as $prod){' . '<br>' .
    'echo $prod[codigo] .  -  . $prod[descripcion] . ' . 'br;' .
    '};' . '<hr>';

$productos = [
    ['codigo' => 'A0001', 'descripcion' => 'Mouse'],
    ['codigo' => 'A0002', 'descripcion' => 'Teclado'],
    ['codigo' => 'A0003', 'descripcion' => 'Monitor'],
    ['codigo' => 'A0004', 'descripcion' => 'Impresora']
];

foreach ($productos as $prod) {
    echo $prod['codigo'] . ' - ' . $prod['descripcion'] . '.<br>';
}
