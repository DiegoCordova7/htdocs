<?php
echo 'Isset determina si una variable esta definida y no es nula' . '<br>';
$numero3 = NULL;
if (isset($numero3)) {
    echo 'Esta definida';
} else {
    echo 'No esta definida';
}
echo '<hr>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action='http://localhost/curso_php/01cosas_basicas/01prueba.php' method='POST'>
        <input type='text' name='numero'>
        <button type='submit'>Enviar</button>
    </form>
</body>

</html>