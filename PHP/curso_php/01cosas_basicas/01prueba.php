<?php
echo 'Para escribir en PHP se usa echo (texto) y lo cierras con ;' . '<hr>';
echo 'Sintaxis usada para el texto: echo "Hola Mundo"; ' . '<hr>';
echo "Hola Mundo" . '<hr>';

if (isset($_POST['numero']) && $_POST['numero'] != '') {
    $num = 4;
    for ($x1 = 1; $x1 <= 10; $x1++) {
        echo $num . 'X' . $x1 . '=' . $num * $x1 . '<br>';
    }
} else {
    echo 'No esta definida';
}
