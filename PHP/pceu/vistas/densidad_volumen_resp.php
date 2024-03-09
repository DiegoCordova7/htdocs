<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $m = ($_POST['m']);
    $d = ($_POST['d']);

    //calculo de la velocidad
    if ($d != 0) {
        $volumen = ($m / $d);

        echo 'Valores Iniciales:<br>
        m=' . $m . '<br>
        d=' . $d . '<br>
        v=' . $m . '/' . $d . '<br>
        v=' . $volumen . '<br>
        El volumen es de:' . $volumen . '.';
    } else {
        echo 'Introduzca un valor diferente a 0 en densidad';
    }
    ?>
</div>