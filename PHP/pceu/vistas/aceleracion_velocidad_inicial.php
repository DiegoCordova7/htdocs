<div class="container is-fluid mb-1">
    <h1 class="title">Velocidad Inicial</h1>
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
                            <b>vi=?</b><br><br>
                            <b>vf=</b><input type='float' name='vel_final' style="height: 30px; width: 45px;"><br><br>
                            <b>t=</b><input type='float' name='t' style="height: 30px; width: 45px;"><br><br>
                            <b>a=</b><input type='float' name='a' style="height: 30px; width: 45px;"><br><br>
                            <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
                        </form>
                    </div>
                </td>
                <td style="border: hidden">
                    <div class="container pb-2 pt-2">
                        <div class="form-rest mb-2 mt-8"></div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $tiempo = ($_POST['t']);
                            $vel_final = ($_POST['vel_final']);
                            $aceleracion = ($_POST['a']);
                        }
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $at = ($aceleracion * $tiempo);
                            $vel_inicial = $vel_final - $at;
                        }
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            echo 'Valores Iniciales:<br>
                                    Tiempo=' . $tiempo . '<br>
                                    Velocidad Final=' . $vel_final . '<br>
                                    Aceleracion=' . $aceleracion . '<br>
                                    vi=' . $vel_final . '-(' . $aceleracion . 'x' . $tiempo . ')<br>
                                    vi= ' . $vel_final . '-' . $at . '<br>
                                    vi=' . $vel_inicial . '<br>
                                    La velocidad inicial es de ' . $vel_inicial;
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>