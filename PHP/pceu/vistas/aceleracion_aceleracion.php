<div class="container is-fluid mb-1">
    <h1 class="title">Aceleracion</h1>
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
                            <b>vi=</b><input type='float' name='v_inicial' style="height: 30px; width: 45px;"><br><br>
                            <b>vf=</b><input type='float' name='v_final' style="height: 30px; width: 45px;"><br><br>
                            <b>t=</b><input type='float' name='t' style="height: 30px; width: 45px;"><br><br>
                            <b>a=?</b><br><br>
                            <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
                        </form>
                    </div>
                </td>
                <td style="border: hidden">
                    <div class="container pb-2 pt-2">
                        <div class="form-rest mb-2 mt-8"></div>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $vel_inicial = ($_POST['v_inicial']);
                            $vel_final = ($_POST['v_final']);
                            $tiempo = ($_POST['t']);
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $difvel = ($vel_final - $vel_inicial);
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if ($tiempo != 0) {
                                $aceleracion = $difvel / $tiempo;
                                echo '
                                    a=(' . $vel_final . '-' . $vel_inicial . ')/' . $tiempo . '<br>
                                    a= (' . $difvel . ')/' . $tiempo . '<br>
                                    a=' . $aceleracion . '<br>
                                    La aceleracion es de ' . $aceleracion;
                            } else {
                                echo 'Introduzca un valor diferente a 0 en tiempo';
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>