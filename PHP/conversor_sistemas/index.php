<?php
function binarioADecimal($binario)
{
    $decimal = 0;
    $length = strlen($binario);
    $pasos = array();
    for ($i = $length - 1; $i >= 0; $i--) {
        $bit = $binario[$i];
        $exponente = $length - $i - 1;
        $valor = $bit * pow(2, $exponente);
        $pasos[] = "$bit * (2^$exponente) = $valor";
        $decimal += $valor;
    }
    return array('resultado' => $decimal, 'pasos' => $pasos);
}
// Función para convertir Decimal a Binario
function decimalABinario($decimal)
{
    if ($decimal == 0) {
        return '0';
    }
    $binario = '';
    while ($decimal > 0 && $valor = $_POST["valor"]) {
        $residuo = $decimal % 2;
        $binario = $residuo . $binario;
        echo $decimal . '/2 = ' . ($decimal / 2) . ' ≈ ' . intval($decimal / 2) . ' => <b>' . $residuo . '</b><br>';
        $decimal = intval($decimal / 2);
    }
    return $binario;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Conversor de Unidades</title>
</head>

<body>
    <h1>Conversor De Sistemas Numericos</h1>
    <form method="post" action="">
        <input type="number" name="valor" placeholder="Ingrese el valor" required>
        <select name="sistema_origen" required>
            <option value="decimal">Decimal</option>
            <option value="binario">Binario</option>
        </select>
        <span>a</span>
        <select name="sistema_destino" required>
            <option value="decimal">Decimal</option>
            <option value="binario">Binario</option>
        </select>
        <input type="submit" value="Convertir">
    </form><br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = $_POST["valor"];
        $sistema_origen = $_POST["sistema_origen"];
        $sistema_destino = $_POST["sistema_destino"];
        $pasos = array();
        if ($sistema_origen == "decimal" && $sistema_destino == "binario") {
            $resultado = decimalABinario($valor);
            echo "<br>Ahora escribimos los resultados (1s y 0s) del ultimo hacia el primero";
            echo "<br>El número decimal $valor en binario es <b>$resultado</b>.<br><br>";
        } elseif ($sistema_origen == "binario" && $sistema_destino == "decimal") {
            $conversion = binarioADecimal($valor);
            $resultado = $conversion['resultado'];
            $pasos = $conversion['pasos'];
        } else {
            $resultado = "No se puede realizar la conversión.";
        }
    }
    if (isset($resultado)) {
        if (!empty($pasos)) {
            echo "Pasos de Conversión:";
            echo "<ul>";
            foreach ($pasos as $paso) {
                echo "<li>$paso</li>";
            }
            echo "</ul><br>";
            echo "Ahora solo sumas los resultados, en este caso la sumatoria es de <b>$resultado</b>.";
        }
    }
    ?>
    <br>
</body>

</html>