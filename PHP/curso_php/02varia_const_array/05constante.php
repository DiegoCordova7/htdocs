<?php
echo 'Se pone define(nombre de la constante,contenido)' . '<br>' . '<hr>';
echo 'define(NOMBRE,Emilio);' . '<br>' .
    'echo NOMBRE;' . '<hr>';

define('NOMBRE', 'Emilio');
echo NOMBRE;
