<?php
echo "
    <div class=container is-fluid mb-1>
	<h1 class=title>Collatz</h1>
        <h2>¿Qué es la conjetura de Collatz?</h2>
        <p>La conjetura de Collatz, conocida también como conjetura 3n+1 o conjetura de Ulam (entre otros nombres), fue enunciada por el matemático Lothar Collatz en 1937, y aún no se ha resuelto.</p>
        <h3 clas=subtitle>Sea la siguiente operación, aplicable a cualquier número entero positivo:</h3>
        <ul>
            <li>Si el número es par, se divide entre 2.</li>
            <li>Si el número es impar, se multiplica por 3 y se suma 1.</li>
        </ul>
        <p>Este programa no busca resolver la conjetura, simplemete demostarla</p>
	<h2 class=subtitle>Ingrese un numero</h2>
    </div>
    <div class=container pb-2 pt-2>
        <div class=form-rest mb-6 mt-6></div>
            <form action='' method=POST>
                <input type=number placeholder=Numero name=n id=n></input>
                <button type=submit><b>CALCULAR</b></button><hr>
            </form>
    ";
$bucle = "
                <br>Entras en bucle debido a que 1 es impar: <b>(3 * 1) + 1 es 4</b><br>
                4 es par entonces se divide entre 2: <b> 4 / 2 es 2 </b><br>
                2 es par entonces se divide entre 2: <b> 2 / 2 es 1 </b><br>
                y 1 es impar: <b>(3 * 1) + 1 es 4</b>...
            ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = ($_POST["n"]);
    $numeroDeVueltasPar = 0;
    $numeroDeVueltasImpar = 0;
    $numeroDeVueltas = 0;
    echo "Ingresaste $numero <br><br>";
    if ($numero == 1) {
        echo $bucle;
        echo "para llegar por primera vez a 1 se hicieron un total de 0 cuentas";
    } else {
        while ($numero > 1) {
            if (($numero % 2) == 1) {
                echo $numero . " es impar: ( 3 * " . $numero . " ) + 1 = " . ($numero * 3) . " + 1 = " .
                    $numero = (3 * $numero) + 1;
                echo "<br>";
                $numeroDeVueltasImpar++;
            } else {
                echo $numero . " es par: " . $numero . " / 2 = " .
                    $numero = $numero / 2;
                echo "<br>";
                $numeroDeVueltasPar++;
            }
        }
        echo $bucle;
        $numeroDeVueltas = $numeroDeVueltasPar + $numeroDeVueltasImpar;
        echo "<br>Para llegar por primera vez a 1 se hicieron un total de $numeroDeVueltas pasos<br> Con un total de $numeroDeVueltasPar pasos para numeros pares y $numeroDeVueltasImpar pasos para numeros impares";
    }
}
echo "
        </div>
    </div>";
