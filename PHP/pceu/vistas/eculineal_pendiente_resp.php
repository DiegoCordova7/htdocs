<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //datos
    $x1 = ($_POST['x1']);
    $y1 = ($_POST['y1']);
    $x2 = ($_POST['x2']);
    $y2 = ($_POST['y2']);

    //calculos
    $dify = $y2 - $y1;
    $difx = $x2 - $x1;

    if ($difx != 0) {
        $m = $dify / $difx;
        echo 'Valores Iniciales:<br>
        x1=' . $x1 . '<br>
        y1=' . $y1 . '<br>
        x2=' . $x2 . '<br>
        y2=' . $y2 . '<br>
        m=((' . $y2 . ')-(' . $y1 . '))/((' . $x2 . ')-(' . $x1 . '))<br>
        m=(' . $dify . ')/(' . $difx . ')<br>
        La pendiente es de ' . $m;
    } else {
        echo 'Valores Iniciales:<br>
        x1=' . $x1 . '<br>
        y1=' . $y1 . '<br>
        x2=' . $x2 . '<br>
        y2=' . $y2 . '<br>
        m=(' . $y2 . '-' . $y1 . ')/(' . $x2 . '-' . $x1 . ')<br>
        m=(' . $dify . ')/(0)<br>
        La diferencia entre x2 y x1 es 0, por ende no es posible dividir entre 0,<br>
        su pendiente es indefinida, graficamente sera una linea horizontal';
    };
    ?>
</div>