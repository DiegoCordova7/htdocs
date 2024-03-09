<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $m = ($_POST['m']);
        $v = ($_POST['v']);

        //calculo de la velocidad
        if ($v != 0) {
            $densidad = ($m / $v);
            echo 'Valores Iniciales:<br>
            v=' . $v . '<br>
            m=' . $m . '<br>
            p=' . $m . '/' . $v . '<br>
            p=' . $densidad . '<br>
            La densidad es de:' . $densidad . '.';
        } else {
            echo 'Introduzca un valor diferente a 0 en velocidad';
        }
    }
    ?>
</div>