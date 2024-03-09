<div class="container is-fluid mb-1">
    <h1 class="title">Fibonacci</h1>
    <h2 class="subtitle">Cuantos terminos de Fibonacci quieres?</h2>
</div>
<div class="container pb-2 pt-2">

    <div class="form-rest mb-6 mt-6"></div>
    <form action="" method="POST">

        <input type="number" placeholder="Cantidad de Terminos" name="n" id="n"></input>
        <button type="submit"><b>CALCULAR</b></button>
        <hr>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = ($_POST["n"]);
        if ($n > 0) {
            $n1 = 0;
            $n2 = 1;
            $c = 3;
            if ($n >= 1) { //Apartir del termino 1478 lo cataloga como INF
                echo "El termino numero <strong>1</strong> es: <strong>" . $n1 . "</strong><br>";
            }
            if ($n >= 2) {
                echo "El termino numero <strong>2</strong> es: <strong>" . $n2 . "</strong><br>";
            }
            while ($n >= $c) {
                $resultado = $n1 + $n2;
                echo "El termino numero <strong>" . $c . "</strong> es: <strong>" . $resultado . "</strong><br>";
                $n1 = $n2;
                $n2 = $resultado;
                $c = $c + 1;
            }
        } else {
            echo "Favor de colocar una cantidad de terminos por encima de 0";
        }
    }
    ?>
</div>
</div>