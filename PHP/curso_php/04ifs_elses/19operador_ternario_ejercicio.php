<?php

echo
'1. Hacer un programa que calcule el total a pagar por la compra de camisas.Si se' . '<br>' .
    'compran tres camisas o mas se aplica un descuento del 20% sobre el total de la' . '<br>' .
    'compra, si son menos de tres camisas un descuento del 10%.' . '<hr>';

echo
'$camisas = 6;' . '<br>' .
    '$precio=100;' . '<br>' .

    '$total=$camisas*$precio;' . '<br>' .

    '$total = ($camisas >= 3) ? $total - ($total * 0.20) : $total - ($total * 0.10);' . '<br>' .

    'echo ' . 'El precio a pagar es: $' . ' . $total;' . '<br>' . '<hr>';

$camisas = 6;
$precio = 100;

$total = $camisas * $precio;

$total = ($camisas >= 3) ? $total - ($total * 0.20) : $total - ($total * 0.10);

echo 'El precio a pagar es: $' . $total;
