<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $m = ($_POST['m']);
    $a = ($_POST['a']);

    //calculo de la fuerza
    $fuerza = ($m * $a);

    echo 'Valores Iniciales:<br>
    a=' . $a . '<br>
    m=' . $m . '<br>
    f=' . $m . 'x' . $a . '<br>
    f=' . $fuerza . '<br>
    La fuerza es de:' . $fuerza . '.';
    ?>
</div>