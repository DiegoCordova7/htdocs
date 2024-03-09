<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distancia En 2 Puntos</title>
</head>

<body>
    <form action='' method='POST'>
        <h2>Ingrese los datos del primer punto:</h2>
        x: <input type='number' name='x1' style="height: 10px; width: 30px;">,
        y: <input type='number' name='y1' style="height: 10px; width: 30px;"><br>
        <h2>Ingrese los datos del segundo punto:</h2>
        x: <input type='number' name='x2' style="height: 10px; width: 30px;">,
        y: <input type='number' name='y2' style="height: 10px; width: 30px;"><br>
        <br>
        <button type='submit'>Calcular</button>
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //variables
    $x1 = ($_POST['x1']);
    $y1 = ($_POST['y1']);
    $x2 = ($_POST['x2']);
    $y2 = ($_POST['y2']);

    //Diferencias al cuadrado
    $difx = ($x2 - $x1) ** 2;
    $dify = ($y2 - $y1) ** 2;

    //Calculo
    $resultado = sqrt($difx + $dify);

    echo 'La distancia es de ' . $resultado;
}
?>