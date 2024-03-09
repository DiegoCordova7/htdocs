<div class="container is-fluid mb-1">
    <h1 class="title">Formula General</h1>
    <h2 class="subtitle">Favor De Ingresar Los Datos</h2>
</div>
<div class="container pb-2 pt-2">
    <div class="form-rest mb-6 mt-6"></div>
    <table width="100%;" border-spacing="10px;">
        <tbody>
            <tr style="border: hidden">
                <td style="border: hidden">
                    <form action="" method='POST'>
                        <input type='float' name='a' style="height: 30px; width: 50px;"><b> x²+</b>
                        <input type='float' name='b' style="height: 30px; width: 50px;"><b> x+</b>
                        <input type='float' name='c' style="height: 30px; width: 50px;"><b> = 0</b>
                        <br><br>
                        <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
                    </form>
                </td>
                <td style="border: hidden">
                    <div class="form-rest mb-2 mt-8"></div>
                    <?php
                    //numeros
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $a = ($_POST['a']);
                        $b = ($_POST['b']);
                        $c = ($_POST['c']);
                    }

                    //partes de la formula general
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $bcuadrado = pow($b,2);
                        $cuentainterna = (-4 * $a * $c);
                        $radicando = ($bcuadrado + $cuentainterna);
                        $bnegativa = (-1 * $b);
                        $dividendo = (2 * $a);
                    }

                    //verificacion para proseguir y evaluacion
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($dividendo != 0 && $radicando >= 0) {
                            $raiz = round(sqrt($radicando), 2);
                            $suma = ((-1 * $b) + $raiz);
                            $x1 =  $suma / $dividendo;
                            $resta = ((-1 * $b) - $raiz);
                            $x2 = $resta / $dividendo;
                            if ($x1 == $x2) { //soluciones unicas, donde x2 y x1 sean la misma.
                                echo '(' . $a . 'x²) + (' . $b . 'x) + (' . $c . ')=0' . '<br>' . '<br>';
                                echo 'x1,2=(-(' . $b . ')±√' . $b . '²+(-4·' . $a . '·' . $c . '))/(2·' . $a . ')<br>' . '<br>';
                                echo 'x1,2=(' . (-1 * $b) . '±√' . (pow($b,2)) . '+(' . $cuentainterna . '))/' . $dividendo . '<br>' . '<br>';
                                echo 'x1,2=(' . (-1 * $b) . '±√' . $radicando . ')/' . $dividendo . '<br>' . '<br>';
                                echo 'x1,2=(' . (-1 * $b) . '±' . $raiz . ')/' . $dividendo . '<br>' . '<br>';
                                echo 'x1=(' . (-1 * $b) . '+(' . $raiz . '))/' . $dividendo . ' │ x2=(' . (-1 * $b) . '-(' . $raiz . '))/' . $dividendo . '<br>' . '<br>';
                                echo 'x1=(' . $suma . ')/' . $dividendo . ' │ x2=(' . $resta . ')/' . $dividendo . '<br>' . '<br>';
                                echo '<b><u>x=' . $x1 . '</u></b>';
                            } else { //2 soluciones reales
                                echo '(' . $a . 'x²) + (' . $b . 'x) + (' . $c . ')=0' . '<br>' . '<br>';
                                echo 'x1,2=(-(' . $b . ')±√' . $b . '²+(-4·' . $a . '·' . $c . '))/(2·' . $a . ')<br>' . '<br>';
                                echo 'x1,2=(' . (-1 * $b) . '±√' . (pow($b,2)) . '+(' . $cuentainterna . '))/' . $dividendo . '<br>' . '<br>';
                                echo 'x1,2=(' . (-1 * $b) . '±√' . $radicando . ')/' . $dividendo . '<br>' . '<br>';
                                echo 'x1,2=(' . (-1 * $b) . '±' . $raiz . ')/' . $dividendo . '<br>' . '<br>';
                                echo 'x1=(' . (-1 * $b) . '+(' . $raiz . '))/' . $dividendo . ' │ x2=(' . (-1 * $b) . '-(' . $raiz . '))/' . $dividendo . '<br>' . '<br>';
                                echo 'x1=(' . $suma . ')/' . $dividendo . ' │ x2=(' . $resta . ')/' . $dividendo . '<br>' . '<br>';
                                echo '<b><u>x1=' . $x1 . '</u></b> │ ' . '<b><u>x2=' . $x2 . '</u></b>';
                            }
                        } elseif ($dividendo != 0 && $radicando < 0) { //soluciones imaginarias(raices negativas)
                            $raiz = sqrt($radicando * -1);

                            if ('<b><u>x1=(' . (-1 * $b) . '+(' . $raiz . 'i))/' . $dividendo . '</u></b>' == '<b><u>x2=(' . (-1 * $b) . '-(' . $raiz . 'i))/' . $dividendo . '</u></b><br>' . '<br>')
                                $raiz = sqrt($radicando * -1);
                            echo '(' . $a . 'x²) + (' . $b . 'x) + (' . $c . ')=0' . '<br>' . '<br>';
                            echo 'x1,2=(-(' . $b . ')±√' . $b . '²+(-4·' . $a . '·' . $c . '))/(2·' . $a . ')<br>' . '<br>';
                            echo 'x1,2=(' . (-1 * $b) . '±√' . (pow($b,2)) . '+(' . $cuentainterna . '))/' . $dividendo . '<br>' . '<br>';
                            echo 'x1,2=(' . (-1 * $b) . '±√' . $radicando . ')/' . $dividendo . '<br>' . '<br>';
                            echo 'x1,2=(' . (-1 * $b) . '±' . $raiz . 'i)/' . $dividendo . '<br>' . '<br>';
                            echo '<b><u>x1=(' . (-1 * $b) . '+(' . $raiz . 'i))/' . $dividendo . '</u></b>' . '│' . '<b><u>x2=(' . (-1 * $b) . '-(' . $raiz . 'i))/' . $dividendo . '</u></b>';
                        } else { //division entre 0
                            echo '<b>No es posible dividir entre cero.</b>';
                        }
                    }
                    ?>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>