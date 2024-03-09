<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $v = ($_POST['v']);
    $d = ($_POST['d']);

    //calculo de la velocidad
    $masa = ($v * $d);

    echo 'Valores Iniciales:<br>
    v=' . $v . '<br>
    p=' . $d . '<br>
    m=' . $v . 'x' . $d . '<br>
    m=' . $masa . '<br>
    La masa es de:' . $masa . '.';
    ?>
</div>