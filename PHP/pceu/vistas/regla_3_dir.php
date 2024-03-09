<div class="container is-fluid mb-1">
    <h1 class="title">Regla de 3 Directa</h1>
    <h2 class="subtitle">Favor De Ingresar Los Datos</h2>
</div>
<div class="container pb-2 pt-2">
    <div class="form-rest mb-6 mt-6"></div>
    <table width="100%;" border-spacing="10px;">
        <tbody>
            <tr style="border: hidden">
                <td style="border: hidden">
                    <form action='' method='POST'>
                        <b>Si </b><input type='float' name='a' style="height: 30px; width: 70px;">,
                        <b>es </b><input type='float' name='b' style="height: 30px; width: 70px;">.
                        <b>Entonces </b><input type='float' name='c' style="height: 30px; width: 70px;">
                        <b>es</b><br><br>
                        <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
                    </form>
                </td>
                <td style="border: hidden">
                    <div class="form-rest mb-2 mt-8"></div>
                    <?php
                    function regla_3($a, $b, $c)
                    {
                        if ($b == 0) {
                            return "No puedes dividir entre 0";
                        }

                        $x = ($c * $a) / $b;

                        return $x;
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $valorConocido1 = $_POST['c'];
                        $valorConocido2 = $_POST['a'];
                        $valorDeseado1 = $_POST['b'];
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $resultado = regla_3($valorConocido1, $valorConocido2, $valorDeseado1);
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (is_numeric($resultado)) {
                            echo "x=(" . $valorConocido1 . "x" . $valorDeseado1 . ")/" . $valorConocido2 . "<br>
                                        x=(" . $valorConocido1 * $valorDeseado1 . ")/" . $valorConocido2 . "<br>
                                        x=" . $resultado . "<br>
                                        El valor faltante es de: " . $resultado;
                        } else {
                            echo $resultado;
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