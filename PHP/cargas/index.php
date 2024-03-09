<!DOCTYPE html>
<html>

<head>
    <title>Calculadora de Fuerza Eléctrica</title>
</head>

<body>
    <h2>Calculadora de Fuerza Eléctrica</h2>
    <form method="post" action="">
        <label for="num_cargas">Número de Cargas Adicionales:</label>
        <input type="number" id="num_cargas" name="num_cargas" min="1" required><br><br>
        <input type="submit" value="Enviar Número de Cargas"><br><br>
    </form>
    <form method='post' action=''>
        <label for='origen'>Carga de Origen (q1):</label>
        <input type='number' id='origen' name='origen' step='any' required>
        <label for='exponente_origen'>Exponente de la Carga de Origen:</label>
        <input type='number' id='exponente_origen' name='exponente_origen' step='any' required><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_cargas'])) {
            echo "<h3>Cargas adicionales:</h3>";
            $num_cargas = $_POST['num_cargas'];
            for ($i = 1; $i <= $num_cargas; $i++) {
                echo "<label for='carga_$i'>Carga $i:</label><br>";
                echo "<label>Valor:</label>";
                echo "<input type='number' id='carga_$i' name='cargas[]' step='any' required><br>";
                echo "<label for='exponente_$i'>Exponente:</label>";
                echo "<input type='number' id='exponente_$i' name='exponentes[]' step='any' required><br>";
                echo "<label for='distancia_$i'>Distancia de q1:</label>";
                echo "<input type='number' id='distancia_$i' name='distancias[]' step='any' required><br><br>";
            }
            echo "<input type='submit' value='Calcular Fuerza Total'>";
        }
        ?>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cargas'], $_POST['exponentes'], $_POST['distancias'])) {
        $mostrarFuerza = "";
        // Constante de Coulomb
        $k = 8.9 * pow(10, 9);
        // Carga de origen y su exponente
        $q1 = $_POST['origen'];
        $exponente_q1 = $_POST['exponente_origen'];
        // Arrays de cargas, exponentes y distancias
        $cargas = $_POST['cargas'];
        $exponentes = $_POST['exponentes'];
        $distancias = $_POST['distancias'];
        // Inicializar la suma de las fuerzas
        $fuerza_total = 0;
        // Calcular la fuerza entre la carga de origen y cada carga adicional
        for ($j = 0; $j < count($cargas); $j++) {
            // Calcular la fuerza entre las cargas
            $q2 = $cargas[$j];
            $exponente_q2 = $exponentes[$j];
            $r = $distancias[$j];
            $fuerza = $k * ((abs($q1) * pow(10, $exponente_q1)) * ((abs($q2) * pow(10, $exponente_q2))) / ($r * $r));
            echo "F= 8.99 x 10^-6 * ((|$q1 x 10^$exponente_q1| * |$q2 x 10^$exponente_q2|)/($r^2))<br>";
            echo "F= 8.99 x 10^-6 * (($q1 x " . pow(10, $exponente_q1) . " * ($q2 x " . pow(10, $exponente_q2) . ")/" . pow($r, 2) . ")<br>";
            echo "F= 8.99 x 10^-6 * ((" . (($q1 * pow(10, $exponente_q1)) * ($q2 * pow(10, $exponente_q2))) . ")/" . pow($r, 2) . ")<br>";
            echo "F= 8.99 x 10^-6 * (" . (($q1 * pow(10, $exponente_q1)) * ($q2 * pow(10, $exponente_q2))) / pow($r, 2) . ")<br>";
            echo "F= " . (8.99 * pow(10, -6)) *  ((($q1 * pow(10, $exponente_q1)) * ($q2 * pow(10, $exponente_q2))) / pow($r, 2)) . "<br>";
            echo "Fuerza entre la carga de origen ($q1 x 10^$exponente_q1) y la carga de $q2 x 10^$exponente_q2: $fuerza N<br><br>";
            // Agregar la fuerza a la suma total
            $mostrarFuerza .= "$fuerza";
            if ($j < (count($cargas) - 1)) {
                $mostrarFuerza .= "N + ";
            }
            $fuerza_total += $fuerza;
        }
        // Mostrar la fuerza total
        $mostrarFuerza .= "N = ";
        echo "Sumatoria de Fuerzas: $mostrarFuerza $fuerza_total" . "N<br>";
        echo "Fuerza Total: <b>$fuerza_total" . "N</b>";
    }
    ?>
</body>

</html>