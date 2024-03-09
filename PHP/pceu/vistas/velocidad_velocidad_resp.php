<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $t = ($_POST['t']);
    $d = ($_POST['d']);

    //calculo de la velocidad

    if ($t != 0) {
        $velocidad = ($d / $t);

        echo 'Valores Iniciales:<br>
        t=' . $t . '<br>
        d=' . $d . '<br>
        v=' . $d . '/' . $t . '<br>
        v=' . $velocidad . '<br>
        La velocidad es de:' . $velocidad . '.';
    } else {
        echo 'Introduzca un valor diferente a 0 en tiempo';
    }
    ?>
</div>