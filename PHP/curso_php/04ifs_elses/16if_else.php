<?php
echo 'El if ya lo conocemos, el else es su continuación, hasta x SI(if),' . '<br>' .
    'SINO(else) como el else es el sobrante no ocupas darle una condicion a el' . '<br>' . '<hr>';

echo
'Manera 1:' . '<br>' .
    '<?php' . '<br>' .
    '    if(9>7){' . '<br>' .
    '        echo ' . 'Condición Verdadera' . ';' . '<br>' .
    '    }else{' . '<br>' .
    '        echo ' . 'Condición Falsa' . ';' . '<br>' .
    '}' . '<br>';

echo
'Manera 2:' . '<br>' .
    'if(9>7):' . '<br>' .
    'echo ' . 'Numero mayor a 7' . ';' . '<br>' .
    'else:' . '<br>' .
    'echo ' . 'Numero menor a 7' . ';' . '<br>' .
    'endif;' . '<br>' . '<hr>';
if (7 > 7) :
    echo 'Condición Verdadera';
else :
    echo 'Condición Falsa';
endif;
