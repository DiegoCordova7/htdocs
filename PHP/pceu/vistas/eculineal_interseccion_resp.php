<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $y = ($_POST['y1']);
    $x = ($_POST['x1']);
    //calculos
    $dify = $y - 0;
    $difx = 0 - $x;

    if ($difx != 0) {
        $m = $difx / $dify;
        $b = $y + $m * $x * (-1);
        echo 'Valores Iniciales:<br>
        x1=' . 0 . '<br>
        y1=' . $y . '<br>
        x2=' . $x . '<br>
        y2=' . 0 . '<br><br>
        Calculo de la pendiente:<br>
        m=((' . 0 . ')-(' . $x . '))/((' . $y . ')-(' . 0 . '))<br>
        m=(' . $difx . ')/(' . $dify . ')<br>
        La pendiente es de ' . $m . '<br><br>
        Calculo del termino b:<br>' .
            $y . '=' . $m . 'x' . $x . '+b<br>
        ' . $y . '=' . $m * $x . '+b<br>'
            . $y . '+(' . $m * $x * (-1) . ')=b<br>'
            . $b . '=b<br><br>
        La ecuacion queda como:<br>
        y=' . $m . 'x+(' . $b . ')';
    } else {
        echo 'No es posible dividir entre 0';
    };
    ?>
</div>