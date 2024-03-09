<div class="container is-fluid mb-1">
    <h1 class="title">Conversor de Sistemas de Unidades</h1>
</div>
<div class="container pb-2 pt-2">
    <div class="form-rest mb-6 mt-6"></div>
    <table width="100%;" border-spacing="10px;">
        <tbody>
            <tr style="border: hidden">
                <td style="border: hidden">
                    <form method="post" action="">
                        <b>Valor de entrada: </b><input type="text" name="input_value"><br>
                        <b>De:</b>
                        <select name="from_unit">
                            <option value="decimal">Decimal</option>
                            <option value="hexadecimal">Hexadecimal</option>
                            <option value="binario">Binario</option>
                            <option value="octal">Octal</option>
                        </select>
                        <b>A:</b>
                        <select name="to_unit">
                            <option value="decimal">Decimal</option>
                            <option value="hexadecimal">Hexadecimal</option>
                            <option value="binario">Binario</option>
                            <option value="octal">Octal</option>
                        </select>
                        <input type="submit" value="Convertir">
                    </form>
                </td>
                <td style="border: hidden">
                    <div class="form-rest mb-2 mt-8"></div>
                    <?php
                    function convertToDecimal($input_value, $from_unit)
                    {
                        $decimal = 0;
                        $steps = array();
                        if ($from_unit == "hexadecimal") {
                            $hexChars = str_split(strtoupper($input_value));
                            $hexChars = array_reverse($hexChars);
                            for ($i = 0; $i < count($hexChars); $i++) {
                                $char = $hexChars[$i];
                                $value = hexdec($char) * (16 ** $i);
                                $decimal += $value;
                                $steps[] = "$char * 16^$i = $value";
                            }
                        } elseif ($from_unit == "binario") {
                            $binaryDigits = str_split($input_value);
                            $binaryDigits = array_reverse($binaryDigits);
                            for ($i = 0; $i < count($binaryDigits); $i++) {
                                $digit = $binaryDigits[$i];
                                $value = $digit * (2 ** $i);
                                $decimal += $value;
                                $steps[] = "$digit * 2^$i = $value";
                            }
                        } elseif ($from_unit == "octal") {
                            $octalDigits = str_split($input_value);
                            $octalDigits = array_reverse($octalDigits);
                            for ($i = 0; $i < count($octalDigits); $i++) {
                                $digit = $octalDigits[$i];
                                $value = $digit * (8 ** $i);
                                $decimal += $value;
                                $steps[] = "$digit * 8^$i = $value";
                            }
                        } elseif ($from_unit == "decimal") {
                            $decimal = $input_value;
                        }
                        return array("decimal" => $decimal, "steps" => $steps);
                    }
                    function decimalToHexSteps($decimal)
                    {
                        $steps = array();
                        $hexadecimal = '';
                        while ($decimal > 0) {
                            $remainder = $decimal % 16;
                            $decimal = floor($decimal / 16);
                            $steps[] = "$decimal ÷ 16 = $remainder (Residuo)";
                            $hexadecimal = dechex($remainder) . $hexadecimal;
                        }
                        return array_reverse($steps);
                    }
                    function decimalToBinarySteps($decimal)
                    {
                        $steps = array();
                        $binary = '';
                        while ($decimal > 0) {
                            $remainder = $decimal % 2;
                            $decimal = floor($decimal / 2);
                            $steps[] = "$decimal ÷ 2 = $remainder (Residuo)";
                            $binary = $remainder . $binary;
                        }
                        return array_reverse($steps);
                    }
                    function decimalToOctalSteps($decimal)
                    {
                        $steps = array();
                        $octal = '';
                        while ($decimal > 0) {
                            $remainder = $decimal % 8;
                            $decimal = floor($decimal / 8);
                            $steps[] = "$decimal ÷ 8 = $remainder (Residuo)";
                            $octal = $remainder . $octal;
                        }
                        return array_reverse($steps);
                    }
                    function octalToDecimalSteps($octal)
                    {
                        $decimal = octdec($octal);
                        return array("decimal" => $decimal, "steps" => ["Octal a Decimal: $decimal"]);
                    }
                    function hexadecimalToDecimalSteps($hexadecimal)
                    {
                        $decimal = hexdec($hexadecimal);
                        return array("decimal" => $decimal, "steps" => ["Hexadecimal a Decimal: $decimal"]);
                    }
                    function binaryToDecimalSteps($binary)
                    {
                        $decimal = bindec($binary);
                        return array("decimal" => $decimal, "steps" => ["Binario a Decimal: $decimal"]);
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $input_value = $_POST["input_value"];
                        $from_unit = $_POST["from_unit"];
                        $to_unit = $_POST["to_unit"];
                        $result = "";
                        $conversion_steps = array();
                        if ($from_unit == $to_unit) {
                            $result = $input_value;
                        } else {
                            $decimal_info = convertToDecimal($input_value, $from_unit);
                            $decimal = $decimal_info["decimal"];
                            $conversion_steps = $decimal_info["steps"];
                            if ($to_unit == "hexadecimal") {
                                $result = dechex($decimal);
                                $conversion_steps = array_merge($conversion_steps, decimalToHexSteps($decimal));
                            } elseif ($to_unit == "binario") {
                                $result = decbin($decimal);
                                $conversion_steps = array_merge($conversion_steps, decimalToBinarySteps($decimal));
                            } elseif ($to_unit == "octal") {
                                $result = decoct($decimal);
                                $conversion_steps = array_merge($conversion_steps, decimalToOctalSteps($decimal));
                            } elseif ($to_unit == "decimal") {
                                if ($from_unit == "hexadecimal") {
                                    $decimal_info = hexadecimalToDecimalSteps($input_value);
                                } elseif ($from_unit == "binario") {
                                    $decimal_info = binaryToDecimalSteps($input_value);
                                } elseif ($from_unit == "octal") {
                                    $decimal_info = octalToDecimalSteps($input_value);
                                }
                                $result = $decimal_info["decimal"];
                                $conversion_steps = array_merge($conversion_steps, $decimal_info["steps"]);
                            }
                        }
                    }
                    ?>
                    <?php
                    if (isset($result) && isset($conversion_steps)) {
                        echo "<br>Resultado: <b>$result</b><br>";
                        echo "Procedimiento de Conversión:<br>";
                        foreach ($conversion_steps as $step) {
                            echo "$step<br>";
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