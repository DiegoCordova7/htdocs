<div class="container is-fluid mb-1">
    <h1 class="title">Distancia entre 2 puntos</h1>
    <h2 class="subtitle">Favor De Ingresar Los Datos</h2>
</div>
<div class="container pb-2 pt-2">
    <div class="form-rest mb-6 mt-6"></div>
    <form action='index.php?vista=dis2puntosresp' method='POST'>
        <b>x1=</b><input type='float' name='x1' style="height: 30px; width: 45px;"> ,
        <b>y1=</b><input type='float' name='y1' style="height: 30px; width: 45px;"><br><br>
        <b>x2=</b><input type='float' name='x2' style="height: 30px; width: 45px;">,
        <b>y2=</b><input type='float' name='y2' style="height: 30px; width: 45px;">
        <br><br>
        <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
    </form>
</div>
<div class="form-rest mb-2 mt-8"></div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //numeros
    $x1 = ($_POST['x1']);
    $y1 = ($_POST['y1']);
    $x2 = ($_POST['x2']);
    $y2 = ($_POST['y2']);
    //diferencias
    $diferenciaX = ($x2 - $x1);
    $diferecniaY = ($y2 - $y1);
    //cuadrados
    $diferenciaXCuadrado = round(($diferenciaX ** 2), 2);
    $diferenciaYCuadrado = round(($diferecniaY ** 2), 2);
    $distancia = round((($diferenciaXCuadrado + $diferenciaYCuadrado) ** .5), 2);
    echo 'Valores Iniciales:<br>
                x1=' . $x1 . '<br>
                y1=' . $y1 . '<br>
                x2=' . $x2 . '<br>
                y2=' . $y2 . '<br>
                d=√(((' . $x2 . ')-(' . $x1 . '))²+((' . $y2 . ')-(' . $y1 . '))²)<br>
                d= √(' . $diferenciaX . '²+' . $diferenciaY . '²)<br>
                d= √(' . $diferenciaXCuadrado . '+' . $diferenciaYCuadrado . ')<br>
                d= √(' . $diferenciaXCuadrado + $diferenciaYCuadrado . ')<br>
                d=' . $d . '<br>
                La distancia entre (' . $x1 . ',' . $y1 . ') y (' . $x2 . ',' . $y2 . ') es de ' . $distancia;
}
?>
</div>
</div>