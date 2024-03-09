<?php
echo 'Una función es un bloque de codiigo con una orden ya' . '<br>' .
    'definida que puede ser llamada en alguna parte del codigo' . '<br>' .
    'se escribe palabra_palabra.Su sintaxis es:' . '<br>' .
    'function nombre_de_la_funcion($parametros){' . '<br>' .
    '   Codigo de la Función' . '<br>' .
    '}<br><hr>';

function saludo($nombre)
{
    return 'Hola Buenas Tardes ' . $nombre;
}

$saludo = saludo('Diego');

echo $saludo . '<br><hr>';

function promedio_alumno($nota_1, $nota_2, $nota_3)
{
    $promedio = ($nota_1 + $nota_2 + $nota_3) / 3;
    return $promedio;
};

$promedio = promedio_alumno(7, 6, 8);

echo $promedio;
