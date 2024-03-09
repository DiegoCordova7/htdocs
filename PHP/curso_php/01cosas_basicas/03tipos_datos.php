<?php
echo 'Datos Booleandos, dan 1 y 0; TRUE=1, FALSE=0; el FALSE no se muestra en la pagina (BOOL)' . '<br>' . '<hr>' .
    'echo TRUE;' . '<br>' .
    'echo FALSE;' . '<br>' . '<hr>';
echo TRUE . '=True' . '<br>';
echo FALSE . '=False' . '<br>' . '<hr>';
?>
<?php
echo 'Datos numericos, tanto positivos como negativos (INT)' . '<br>' . '<hr>' .
    'echo 1;' . '<br>' .
    'echo -15;' . '<br>' . '<hr>';
echo 1 . '<br>';
echo -15 . '<br>' . '<hr>';
?>
<?php
echo 'Datos numericos, decimales (FLOAT)' . '<br>' . '<hr>' .
    'echo 1.97;' . '<br>' .
    'echo -15.80;' . '<br>' . '<hr>';
echo 1.97 . '<br>';
echo -15.80 . '<br>' . '<hr>';
?>
<?php
echo 'Datos de cadena, es decir texto (String)' . '<br>' . '<hr>' .
    'echo ' . ' ' . 'Hola Mundo' . ' ' . '<br>' . '<hr>';
echo 'Hola Mundo' . '<br>' . '<hr>';
?>
<?php
echo 'Muestra que tipo de valores son' . '<br>' . '<hr>' .
    'var_dump(TRUE)' . '<br>' .
    'var_dump(-15)' . '<br>' .
    'var_dump(1.97)' . '<br>' .
    'var_dump(' . 'Hola Mundo' . ')' . '<br>' . '<hr>';
var_dump(TRUE) . '<br>';
var_dump(-15) . '<br>';
var_dump(1.97) . '<br>';
var_dump('Hola Mundo');
?>