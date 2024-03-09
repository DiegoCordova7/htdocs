<div class="container is-fluid mb-1">
    <h1 class="title">Binary</h1>
    <h2 class="subtitle">Favor De Ingresar Los Datos</h2>
</div>
<div class="container pb-2 pt-2">

    <div class="form-rest mb-6 mt-6"></div>

    <div class="container is-fluid mb-1">
        <h3>Inserte el numero:</h3>
        <form action='' method='POST'>
            <input type='number' name='numero' style="height: 30px; width: 85px;">
            <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
        </form>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = ($_POST['numero']);

    function decimal_binario($decimal)
    {
        if ($decimal == 0) {
            return '0';
        }

        $binario = '';

        while ($decimal > 0 && $numero = ($_POST['numero'])) {
            $residuo = $decimal % 2; //el operador % da residuos de division (es el mod de psint)
            $binario = $residuo . $binario;
            echo $decimal . '/2 = ' . ($decimal / 2) . ' ≈ ' . intval($decimal / 2) . ' => ' . $residuo . '<br>';
            $decimal = intval($decimal / 2); //conversion a numero
        }

        return $binario;
    }

    $numero = ($_POST['numero']);
    echo "Numero a convertir a binario: " . $numero . "<br>";
    $nobinario = decimal_binario($numero);
    echo "<br>Ahora escribimos los resultados (1s y 0s) de ultimo hacia el primero";
    echo "<br>El número decimal $numero en binario es $nobinario";
}
?>
</div>