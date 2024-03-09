<?php
echo
'if=sí(parametro que se debe cumplir;){hacer algo}' . '<br>' .
    'if(parametro que se debe cumplir) : echo:' . 'accion' . '; endif;' . '<hr>';

echo
'if(4>3) :' . '<br>' .
    'echo ' . 'correcto' . ';' . '<br>' .
    'endif;' . '<hr>';

if (4 > 3) :
    echo 'correcto';
endif;
