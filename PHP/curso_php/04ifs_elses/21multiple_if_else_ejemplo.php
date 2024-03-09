<?php
echo
'En una tienda se venden computadoras a $700, pero si son menoss de 5 se' . '<br>' .
    'obtiene un 10%, si son mas de 5 se obtiene un 20% de decuesnto y si son' . '<br>' .
    '10 o mas se obtiene un 40% de descuento.' . '<br>' . '<hr>';

echo
'$computadoras=20;' . '<br>' .

    '$preciototal=$computadoras*700;' . '<br>' .

    'if($computadoras<5){' . '<br>' .
    '$preciototal=$preciototal-($preciototal*0.10);' . '<br>' .
    '}elseif($computadoras>=5 and $computadoras<10){' . '<br>' .
    '$preciototal=$preciototal-($preciototal*0.20);' . '<br>' .
    '}elseif($computadoras>=10){' . '<br>' .
    '$preciototal=$preciototal-($preciototal*0.40);' . '<br>' .
    '}' . '<br>' .
    'echo Su compra fue de $.$preciototal;' . '<br>' . '<hr>';

$computadoras = 20;

$preciototal = $computadoras * 700;

if ($computadoras < 5) {
    $preciototal = $preciototal - ($preciototal * 0.10);
} elseif ($computadoras >= 5 and $computadoras < 10) {
    $preciototal = $preciototal - ($preciototal * 0.20);
} elseif ($computadoras >= 10) {
    $preciototal = $preciototal - ($preciototal * 0.40);
}
echo 'Su compra fue de $' . $preciototal;
