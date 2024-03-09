<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $v = ($_POST['v']);
    $t = ($_POST['t']);

    //calculo de la velocidad
    $distancia = ($v * $t);

    echo 'Valores Iniciales:<br>
    v=' . $v . '<br>
    t=' . $t . '<br>
    d=' . $v . 'x' . $t . '<br>
    d=' . $distancia . '<br>
    La distancia es de:' . $distancia . '.';
    ?>
</div>