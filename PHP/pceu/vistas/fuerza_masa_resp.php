<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $a = ($_POST['a']);
    $f = ($_POST['f']);

    //calculo de la masa
    $masa = ($f / $a);

    if ($masa != 0) {
        echo 'Valores Iniciales:<br>
        f=' . $f . '<br>
        a=' . $a . '<br>
        m=' . $f . '/' . $a . '<br>
        m=' . $masa . '<br>
        La masa es de:' . $masa . '.';
    } else {
        echo 'Introduzca un valor diferente a 0 en masa';
    }
    ?>
</div>