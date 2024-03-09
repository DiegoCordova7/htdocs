<div class="container is-fluid mb-1">
    <h1 class="title">Teorema de Pitagoras</h1>
    <h2 class="subtitle">Favor De Ingresar Los Datos</h2>
</div>
<div class="container pb-2 pt-2">
    <div class="container is-fluid mb-1">
        <img src="./img/pitagoras.png" width="380" height="40">
    </div>
    <div class="form-rest mb-6 mt-6"></div>
    <table width="100%;" border-spacing="10px;">
        <tbody>
            <tr style="border: hidden">
                <td style="border: hidden">
                    <form action='' method='POST'>
                        <b>a=</b><input type='float' name='a' style="height: 30px; width: 45px;"><br><br>
                        <b>b=</b><input type='float' name='b' style="height: 30px; width: 45px;"><br><br>
                        <b>c=</b>?<br><br>
                        <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
                    </form>
                </td>
                <td style="border: hidden">
                    <div class="form-rest mb-2 mt-8"></div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $a = ($_POST['a']);
                        $b = ($_POST['b']);
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $a2 = ($a ** 2);
                        $b2 = ($b ** 2);
                        $sumab = ($a2 + $b2);
                        $cresul = (sqrt($sumab));
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        echo 'Valores Iniciales:<br>
                                    a=' . $a . '<br>
                                    b=' . $b . '<br>
                                    c=√(' . $a . '²+' . $b . '²)' . '<br>
                                    c=√(' . $a2 . '+' . $b2 . ')' . '<br>
                                    c=√(' . $sumab . ')' . '<br>
                                    El lado a es de:' . $cresul . '.';
                    }
                    ?>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>