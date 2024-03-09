<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $m = ($_POST['m']);
    $f = ($_POST['f']);

    //calculo de la aceleracion
    $aceleracion = ($f / $m);

    if ($m != 0) {
        echo 'Valores Iniciales:<br>
        f=' . $f . '<br>
        m=' . $m . '<br>
        a=' . $f . '/' . $m . '<br>
        a=' . $aceleracion . '<br>
        La aceleracion es de:' . $aceleracion . '.';
    } else {
        echo 'Introduzca un valor diferente a 0 en masa';
    }

    ?>
</div>