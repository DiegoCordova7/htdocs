<?php
//Circulo:
function calcularPerimetroCirculo($radio)
{
    return 2 * M_PI * $radio;
}
function calcularAreaCirculo($radio)
{
    return M_PI * $radio * $radio;
}
//Esfera:
function calcularPerimetroEsfera($radio)
{
    return 2 * M_PI * $radio;
}
function calcularAreaEsfera($radio)
{
    return 4 * M_PI * pow($radio, 2);
}
function calcularVolumenEsfera($radio)
{
    return (4 / 3) * M_PI * pow($radio, 3);
}
//Triangulo:
function calcularPerimetroTriangulo($lado)
{
    return $lado * 3;
}
function calcularAreaTriangulo($lado)
{
    $mitadBase = $lado / 2;
    $altura = sqrt((pow($lado, 2)) - (pow($mitadBase, 2)));
    return $altura * $lado / 2;
}
//Piramide Cuadrangular
function calcularPerimetroPiramideCuadrangular()
{
}
function calcularAreaPiramideCuadrangular()
{
}
function calcularVolumenPiramideCuadrangular()
{
}
//Cuadrado
function calcularPerimetroCuadrado($lado)
{
    return 4 * $lado;
}
function calcularAreaCuadrado($lado)
{
    return $lado ** 2;
}
//Cubo
function calcularPerimetroCubo()
{
    return;
}
function calcularAreaCubo()
{
    return;
}
function calcularVolumenCubo()
{
    return;
}
//Rectangulo
function calcularPerimetroRectangulo()
{
    return;
}
function calcularAreaRectangulo()
{
    return;
}
//Prisma Cuadrangular
function calcularPerimetroPrismaCuadrangular()
{
    return;
}
function calcularAreaPrismaCuadrangular()
{
    return;
}
function calcularVolumenPrismaCuadrangular()
{
    return;
}
?>
<div class="container is-fluid mb-1">
    <h1 class="title">Calculadora De Figuras</h1>
    <h2 class="subtitle">Favor De Ingresar Los Datos</h2>
</div>
<div class="container pb-2 pt-2">
    <div class="form-rest mb-6 mt-6"></div>
    <form method="post" action="">
        <label for="tipoFigura">Selecciona la figura:</label>
        <select name="tipoFigura" id="tipoFigura">
            <option value="circulo">Círculo</option>
            <option value="esfera">Esfera</option>
            <option value="triangulo">Triangulo</option>
            <option value="piramideCuadrangular">Piramide cuadrangular</option>
            <option value="cuadrado">Cuadrado</option>
            <option value="cubo">Cubo</option>
            <option value="rectangulo">Rectangulo</option>
            <option value="prismaCuadrado">Prisma Cuadrangular</option>
        </select>
        <label for="medida">Ingrese la medida:</label>
        <input type="text" name="medida" id="medida" style="width:55px;" required>
        <input type="submit" value="Calcular">
    </form><br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tipoFigura = $_POST["tipoFigura"];
        $medida = floatval($_POST["medida"]);
        echo "<h5 class=subtitle>" . ucfirst($tipoFigura) . ":</h5>";
        switch ($tipoFigura) {
            case "circulo":
                $perimetro = calcularPerimetroCirculo($medida);
                $area = calcularAreaCirculo($medida);
                echo "Radio = $medida <br><b>Perímetro:</b> $perimetro <br><b>Área:</b> $area";
                break;
            case "esfera":
                $perimetro = calcularPerimetroEsfera($medida);
                $area = calcularAreaEsfera($medida);
                $volumen = calcularVolumenEsfera($medida);
                echo "<b>Perímetro:</b> $perimetro <br><b>Área:</b> $area <br><b>Volumen:</b> $volumen";
                break;
            case "triangulo":
                $perimetro = calcularPerimetroTriangulo($medida);
                $area = calcularAreaTriangulo($medida);
                echo "<b>Perímetro:</b><br> $perimetro <br><b>Área:</b><br> $area";
                break;
            case "piramideCuadrangular":
                $perimetro = calcularPerimetroPiramideCuadrangular();
                $area = calcularAreaPiramideCuadrangular();
                $volumen = calcularVolumenPiramideCuadrangular();
                echo "<b>Perímetro:</b> $perimetro <br><b>Área:</b> $area <br><b>Volumen:</b> $volumen";
                break;
            case "cuadrado":
                $perimetro = calcularPerimetroCuadrado($medida);
                $area = calcularAreaCuadrado($medida);
                echo "<b>Perímetro:</b><br> $perimetro <br><b>Área:</b><br> $area";
                break;
            case "cubo":
                $perimetro = calcularPerimetroCubo();
                $area = calcularAreaCubo();
                $volumen = calcularVolumenCubo();
                echo "<b>Perímetro:</b> $perimetro <br><b>Área:</b> $area <br><b>Volumen:</b> $volumen";
                break;
            case "rectangulo":
                $perimetro = calcularPerimetroRectangulo();
                $area = calcularAreaRectangulo();
                echo "<b>Perímetro:</b> $perimetro <br><b>Área:</b> $area";
                break;
            case "prismaCuadrangular":
                $perimetro = calcularPerimetroPrismaCuadrangular();
                $area = calcularAreaPrismaCuadrangular();
                $volumen = calcularVolumenPrismaCuadrangular();
                echo "<b>Perímetro:</b> $perimetro <br><b>Área:</b> $area <br><b>Volumen:</b> $volumen";
                break;
            default:
                echo "Figura no reconocida";
        }
    }
    ?>
</div>
</div>