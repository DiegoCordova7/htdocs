<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $d = ($_POST['d']);
    $v = ($_POST['v']);

    //calculo de la velocidad
    $tiempo = ($d / $v);

    if ($v != 0) {
        echo 'Valores Iniciales:<br>
        d=' . $d . '<br>
        v=' . $v . '<br>
        t=' . $d . '/' . $v . '<br>
        t=' . $tiempo . '<br>
        La tiempo es de:' . $tiempo . '.';
    } else {
        echo 'Introduzca un valor diferente a 0 en tiempo';
    }

    ?>
</div>