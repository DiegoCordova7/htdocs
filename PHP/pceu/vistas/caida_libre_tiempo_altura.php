<div class="container is-fluid mb-1">
    <h1 class="title">Caida Libre (Tiempo) [Altura Y Gravedad]</h1>
    <h2 class="subtitle">Favor De Ingresar Los Datos</h2>
</div>
<div class="container pb-2 pt-2">
    <div class="form-rest mb-6 mt-6"></div>
    <table>
        <tbody>
            <tr style="border: hidden">
                <td style="border: hidden">
                    <div class="container is-fluid mb-1">
                        <form action='' method='POST'>
                            <b>g=</b><input type='float' name='g' style="height: 30px; width: 45px;"><br><br>
                            <b>h=</b><input type='float' name='h' style="height: 30px; width: 45px;"><br><br>
                            <b>t=?</b><br><br>
                            <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
                        </form>
                    </div>
                </td>
                <td style="border: hidden">
                    <div class="container pb-2 pt-2">
                        <div class="form-rest mb-2 mt-8"></div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $g = ($_POST['g']);
                            $h = ($_POST['h']);
                            $t = sqrt(2 * $h / $g);
                            if ($g != 0) {
                                echo 'Valores Iniciales:<br>
                                        Gravedad=' . $g . '<br>
                                        Altura=' . $h . '<br>
                                        t=√(2x' . $h . '/' . $g . ')<br>
                                        t=√(' . (2 * $h) . '/' . $g . ')<br>
                                        t=√(' . (2 * $h) / $g . ')<br>
                                        t=' . $t . '<br>
                                        El tiempo es de ' . $t;
                            } else {
                                echo 'Introduzca un valor diferente a 0 en gravedad';
                            }
                        }
                        ?>
                    </div>
</div>
</td>
</tr>
</tbody>
</table>
</div>