<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permutaciones</title>
</head>

<body>
    <form action='' method='POST'>
        <h1>Ingrese un numero</h1>
        Numero: <input type='number' name='n' style="height: 10px; width: 40px;"><br>
        <br><br>
        <button type='submit'>Calcular</button>
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<br><br>";
    //numeros
    $acumulador = 1;
    $n = ($_POST['n']);
    if ($n >= 1) {
        echo $n . "!= ";
        while ($n >= 1) {
            echo $n;
            if ($n >= 2) {
                echo "*";
            }
            $acumulador = $acumulador * $n;
            $n = $n - 1;
        }
        echo "= " . $acumulador;
    } elseif ($n == 0) {
        echo '0!=1';
    } else {
        echo 'No hay permutaciones negativas';
    }
}
?>