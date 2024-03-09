<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula General</title>
</head>

<body>
    <form action='' method='POST'>
        <h1>Ingrese los datos de la Forma General</h1>
        <input type='number' name='a' style="height: 10px; width: 40px;"> x²+
        <input type='number' name='b' style="height: 10px; width: 40px;"> x+
        <input type='number' name='c' style="height: 10px; width: 40px;"> = 0
        <br><br>
        <button type='submit'>Calcular</button>
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //numeros
    $a = ($_POST['a']);
    $b = ($_POST['b']);
    $c = ($_POST['c']);

    //partes de la formula general
    $bcuadrado = ($b ** 2);
    $cuentainterna = (-4 * $a * $c);
    $radicando = ($bcuadrado + $cuentainterna);
    $bnegativa = (-1 * $b);
    $dividendo = (2 * $a);

    //verificacion para proseguir y evaluacion
    if ($dividendo != 0 && $radicando >= 0) {
        $raiz = sqrt($radicando);
        $suma = ($bnegativa + $raiz);
        $x1 =  $suma / $dividendo;
        $resta = ($bnegativa - $raiz);
        $x2 = $resta / $dividendo;
        if ($x1 == $x2) { //soluciones unicas, donde x2 y x1 sean la misma.
            echo '(' . $a . 'x²) + (' . $b . 'x) + (' . $c . ')=0' . '<br>' . '<br>';
            echo 'x1,2=(-(' . $b . ')±√' . $b . '²+(-4·' . $a . '·' . $c . '))/(2·' . $a . ')<br>' . '<br>';
            echo 'x1,2=(' . $bnegativa . '±√' . $bcuadrado . '+(' . $cuentainterna . '))/' . $dividendo . '<br>' . '<br>';
            echo 'x1,2=(' . $bnegativa . '±√' . $radicando . ')/' . $dividendo . '<br>' . '<br>';
            echo 'x1,2=(' . $bnegativa . '±' . $raiz . ')/' . $dividendo . '<br>' . '<br>';
            echo 'x1=(' . $bnegativa . '+(' . $raiz . '))/' . $dividendo . ' │ x2=(' . $bnegativa . '-(' . $raiz . '))/' . $dividendo . '<br>' . '<br>';
            echo 'x1=(' . $suma . ')/' . $dividendo . ' │ x2=(' . $resta . ')/' . $dividendo . '<br>' . '<br>';
            echo '<b><u>x=' . $x1 . '</u></b>';
        } else { //2 soluciones reales
            echo '(' . $a . 'x²) + (' . $b . 'x) + (' . $c . ')=0' . '<br>' . '<br>';
            echo 'x1,2=(-(' . $b . ')±√' . $b . '²+(-4·' . $a . '·' . $c . '))/(2·' . $a . ')<br>' . '<br>';
            echo 'x1,2=(' . $bnegativa . '±√' . $bcuadrado . '+(' . $cuentainterna . '))/' . $dividendo . '<br>' . '<br>';
            echo 'x1,2=(' . $bnegativa . '±√' . $radicando . ')/' . $dividendo . '<br>' . '<br>';
            echo 'x1,2=(' . $bnegativa . '±' . $raiz . ')/' . $dividendo . '<br>' . '<br>';
            echo 'x1=(' . $bnegativa . '+(' . $raiz . '))/' . $dividendo . ' │ x2=(' . $bnegativa . '-(' . $raiz . '))/' . $dividendo . '<br>' . '<br>';
            echo 'x1=(' . $suma . ')/' . $dividendo . ' │ x2=(' . $resta . ')/' . $dividendo . '<br>' . '<br>';
            echo '<b><u>x1=' . $x1 . '</u></b> │ ' . '<b><u>x2=' . $x2 . '</u></b>';
        }
    } elseif ($dividendo != 0 && $radicando < 0) { //soluciones imaginarias(raices negativas)
        $raiz = sqrt($radicando * -1);

        if ('<b><u>x1=(' . $bnegativa . '+(' . $raiz . 'i))/' . $dividendo . '</u></b>' == '<b><u>x2=(' . $bnegativa . '-(' . $raiz . 'i))/' . $dividendo . '</u></b><br>' . '<br>')
            $raiz = sqrt($radicando * -1);
        echo '(' . $a . 'x²) + (' . $b . 'x) + (' . $c . ')=0' . '<br>' . '<br>';
        echo 'x1,2=(-(' . $b . ')±√' . $b . '²+(-4·' . $a . '·' . $c . '))/(2·' . $a . ')<br>' . '<br>';
        echo 'x1,2=(' . $bnegativa . '±√' . $bcuadrado . '+(' . $cuentainterna . '))/' . $dividendo . '<br>' . '<br>';
        echo 'x1,2=(' . $bnegativa . '±√' . $radicando . ')/' . $dividendo . '<br>' . '<br>';
        echo 'x1,2=(' . $bnegativa . '±' . $raiz . 'i)/' . $dividendo . '<br>' . '<br>';
        echo '<b><u>x1=(' . $bnegativa . '+(' . $raiz . 'i))/' . $dividendo . '</u></b>' . '│' . '<b><u>x2=(' . $bnegativa . '-(' . $raiz . 'i))/' . $dividendo . '</u></b>';
    } else { //division entre 0
        echo '<b>No es posible dividir entre cero.</b>';
    }
}
?>