<div class="container is-fluid mb-1">
    <h1 class="title">Caida Libre (Altura)</h1>
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
                            <b>h=?</b><br><br>
                            <b>g=</b><input type='float' name='g' style="height: 30px; width: 45px;"><br><br>
                            <b>t=</b><input type='float' name='t' style="height: 30px; width: 45px;"><br><br>
                            <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
                        </form>
                    </div>
                </td>
                <td style="border: hidden">
                    <div class="container pb-2 pt-2">
                        <div class="form-rest mb-2 mt-8"></div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $gravedad = ($_POST['g']);
                            $tiempo = ($_POST['t']);
                            $h = ($gravedad * ($tiempo ** 2)) / 2;
                            echo 'Valores Iniciales:<br>
                                Gravedad=' . $gravedad . '<br>
                                Tiempo=' . $tiempo . '<br>
                                h= (' . $gravedad . 'x(' . $tiempo . ')²)/2<br>
                                h= (' . $gravedad . 'x' . ($tiempo ** 2) . ')/2<br>
                                h= ' . $gravedad * ($tiempo ** 2) . '/2<br>
                                h= ' . ($gravedad * ($tiempo ** 2)) / 2 . '<br>
                                La altura es de ' . $h;
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>