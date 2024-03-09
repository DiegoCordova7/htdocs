<?php
echo
'Se diferencia por que el contador esta en la condicion y hay mismo' . '<br>' .
    ' le indicamos si incrementara o decrementara de forma automatica.' . '<br>' . '<hr>';

echo
'for($x=20; $x>=1; $x--){' . '<br>' .
    '    echo $x . br;' . '<br>' .
    '}' . '<br>';

echo '<hr>';
for ($x = 20; $x >= 1; $x--) {
    echo $x . '<br>';
}


echo '<hr>';

echo
'Crear la tabla del 5 del 1 al 10' . '<br>' . '<hr>';

echo
'$num=5;' . '<br>' .
    'for($x1=1; $x1<=10; $x1++){' . '<br>' .
    '    echo $num . X . $x1 . = . $num * $x1 . <br>;' . '<br>' .
    '}' . '<br>';

echo '<hr>';
$num = 5;
for ($x1 = 1; $x1 <= 10; $x1++) {
    echo $num . 'X' . $x1 . '=' . $num * $x1 . '<br>';
}
