<?php
echo
'1.Realizar un programa en donde se pide la edad de un usuario; si es mayor' . '<br>' .
    'de edad debe aparecer un mensaje indicandolo.' . '<br>' . '<hr>' .
    '$edad = 20;' . '<br>' .
    'if($edad>18){' . '<br>' .
    'echo ' . 'Eres viejo we' . ';' . '<br>' .
    '};' . '<br>' . '<hr>';

$edad = 20;
if ($edad > 18) {
    echo 'Eres viejo we';
};

echo '<hr>';

echo
'En un almacén se hace un 20% de descuento a los clientes cuya compra es' . '<br>' .
    'supere los $100 ¿Cuál será la cantidad que pagará una persona por su compra?' . '<br>' . '<hr>';

echo
'$precio=200;' . '<br>' .
    'if($precio>100){' . '<br>' .
    '    $preciopostdescuento=$precio-($precio*0.20);' . '<br>' .
    '}' . '<br>' .
    'echo "Precio Inicial: {$precio}, ";' . '<br>' .
    'echo "su compra fue de: {$preciopostdescuento}.";' . '<br>' . '<hr>';

$precio = 200;
if ($precio > 100) {
    $preciopostdescuento = $precio - ($precio * 0.20);
}
echo "Precio Inicial: {$precio}, ";
echo "su compra fue de: {$preciopostdescuento}.";
