<?php
echo
'operador de incremento = ++' . '<br>' .
    'operador de decremento = --' . '<br>' .
    '++$variable =Pre-incremento (primero hace accion y luego incrementa)' . '<br>' .
    '$variable++ =Post-incremento (primero incrementa y luego hace accion)' . '<br>' .
    '--$variable =Pre-decremento (primero hace accion y luego decrementa)' . '<br>' .
    '$variable-- =Post-decremento (primero decrementa y luego hace accion)' . '<br>' . '<hr>';

echo '$numero = 10;' . '<br>' .

    'echo --$numero;' . '<br>' . '<hr>';

$numero = 10;

echo --$numero;
