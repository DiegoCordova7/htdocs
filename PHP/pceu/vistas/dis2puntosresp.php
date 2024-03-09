<div class="container pb-2 pt-2">

    <div class="form-rest mb-2 mt-8"></div>
    <?php
    //numeros
    $x1 = ($_POST['x1']);
    $y1 = ($_POST['y1']);
    $x2 = ($_POST['x2']);
    $y2 = ($_POST['y2']);

    //diferencias
    $difx = ($x2 - $x1);
    $dify = ($y2 - $y1);

    //cuadrados
    $difx2 = round(($difx ** 2), 2);
    $dify2 = round(($dify ** 2), 2);
    $d = round((($difx2 + $dify2) ** .5), 2);

    echo 'Valores Iniciales:<br>
    x1=' . $x1 . '<br>
    y1=' . $y1 . '<br>
    x2=' . $x2 . '<br>
    y2=' . $y2 . '<br>
    d=√(((' . $x2 . ')-(' . $x1 . '))²+((' . $y2 . ')-(' . $y1 . '))²)<br>
    d= √(' . $difx . '²+' . $dify . '²)<br>
    d= √(' . $difx2 . '+' . $dify2 . ')<br>
    d= √(' . $difx2 + $dify2 . ')<br>
    d=' . $d . '<br>
    La distancia entre (' . $x1 . ',' . $y1 . ') y (' . $x2 . ',' . $y2 . ') es de ' . $d;
    ?>
</div>