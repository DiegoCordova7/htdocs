<?php
echo 'Es para ver cuando los cambios de una variable afectan o no' . '<br>' .
    '$texto=Ejemplo: ;' . '<br>' .
    'en este caso los cambios hecho a la variable NO afectan al resultado cuando se ejecuta.' . '<br>' .
    '$variable_1=$texto;' . '<br>' .
    'en este caso los cambios hecho a la variable SI afectan al resultado cuando se ejecuta.' . '<br>' .
    '$variable_2= &$texto;' . '<br>' .
    'echo $variable_2;' . '<br>' .
    '$texto=DiegoCordova;' . '<br>' .
    'echo $variable_2;' . '<br>' . '<hr>';

echo
$texto = 'Ejemplo: ';
$variable_1 = $texto;
$variable_2 = &$texto;

echo $variable_2;
$texto = 'DiegoCordova';

echo $variable_2;;
